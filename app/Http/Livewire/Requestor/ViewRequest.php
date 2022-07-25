<?php

namespace App\Http\Livewire\Requestor;

use Livewire\Component;
use App\Models\User;
use App\Models\Request;
use App\Models\Proof;

use Livewire\WithPagination;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use App\Notifications\UserNotification;
class ViewRequest extends Component
{
    use WithFileUploads, Actions;
    public $request;
    public $reference_number;
    public $proof_of_payment=[];
    public function mount($id)
    {
        $this->request = Request::where('id',$id)
                        ->with(['payment','requestDocuments.campusDocument.document','remarks'])
                        ->first();
        abort_if(!$this->request,404);
    }
    public function render()
    {
        return view('livewire.requestor.view-request')
            ->layout('layouts.requestor');
    }
    public function submitPayment()
    {
        $this->validate([
            'reference_number'=>'required',
            'proof_of_payment'=>'required|max:12288',
        ]);

        foreach($this->proof_of_payment as $file){
            Proof::create([
                'payment_id'=>$this->request->payment->id,
                'file_id'=>$file->store('proofs','public'),
            ]);
        }
        $this->request->update([
            'status'=>'payment-to-review',
        ]);
        $this->request->payment()->update([
            'status'=>'paid',
            'reference_number'=>$this->reference_number,
        ]);
           $campus_registrar = User::where('role','registrar')->where('campus_id',$this->request->campus_id)->first();
          $details=[
            'activity_type'=>'payment-submitted',
            'user_name'=>auth()->user()->information->first_name.' '.auth()->user()->information->last_name,
            'activity'=>auth()->user()->information->first_name.' '.auth()->user()->information->last_name.' submitted a payment',
            'request_id'=>$this->request->id,
        ];
            $campus_registrar->notify(new UserNotification($details));
        $this->notification()->notify([
            'title' => 'Success',
            'description' => 'Payment has been submitted',
            'icon' => 'success',
        ]);
        $this->reset([
            'reference_number',
            'proof_of_payment',
        ]);
    }
}