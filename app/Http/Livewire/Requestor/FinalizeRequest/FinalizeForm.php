<?php

namespace App\Http\Livewire\Requestor\FinalizeRequest;

use Livewire\Component;
use App\Models\RequestDocument;
use App\Models\Request;
use App\Models\Payment;
use App\Models\User;
use WireUi\Traits\Actions;
use App\Notifications\UserNotification;
class FinalizeForm extends Component
{
    use Actions;
    public $request;
    public function render()
    {
        return view('livewire.requestor.finalize-request.finalize-form',[
            'request_documents'=>RequestDocument::where('request_id',$this->request->id)->with('campusDocument')->get(),
        ]);
    }
    public function confirmFinalize()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Are you sure you want to finalize this request?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes',
                'method' => 'submitRequest',
            ],
            'reject' => [
                'label'  => 'No, cancel',
                'method' => 'cancel',
            ],
        ]);
    }
    public function generateCode()
    {
        $code = mt_rand(100000, 999999);
        return  'SKSU-R'.$code;
    }
    public function submitRequest()
    {
        $request_code = $this->generateCode();
    //    check if request_code is already used
        $request = Request::where('request_code',$request_code)->first();
        if($request){
            $this->notification()->notify([
                'type' => 'Error',
                'description' => 'Request Code already used',
                'icon' => 'error',
            ]);
            return;
        }
        $this->request->update([
            'request_code'=>$request_code,
            'status'=>'finalized',
        ]);
        Payment::create([
            'request_id'=>$this->request->id,
            'total_document_amount'=>0,
            'additional_charges'=>0,
            'total_amount_to_pay'=>0,
            'amount_paid'=>0,
            'paid_at'=>null,
            'reference_number'=>null,
            'status'=>'unpaid',
        ]);
        $this->notification()->notify([
            'title'=>'Success',
            'description'=>'Request has been finalized',
            'icon'=>'success',
        ]);
        $campus_registrar = User::where('role','registrar')->where('campus_id',$this->request->campus_id)->first();
        $details=[
            'activity_type'=>'new-request',
            'user_name'=>auth()->user()->information->first_name.' '.auth()->user()->information->last_name,
            'activity'=>auth()->user()->information->first_name.' '.auth()->user()->information->last_name.' sent a new request',
            'request_id'=>$this->request->id,
        ];
        $campus_registrar->notify(new UserNotification($details));
        $this->emitUp('requestFinalized');
    }
}