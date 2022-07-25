<?php

namespace App\Http\Livewire\Requestor\Home;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Document;
use App\Models\CampusDocument;
use App\Models\RequestDocument;
use App\Models\Request;
use WireUi\Traits\Actions;

class RequestForm extends Component
{
    use Actions;
    public $selected_documents=[];
    public $purposes = [
       'For Licensure examination','For Transfer/evaluation','For Enrollment','For Employment','Promotion','Scholarship','Others'
    ];

    public $receiver_name;
    public $purpose;
    public $other_purpose;
    public function render()
    {
        return view('livewire.requestor.home.request-form',[
            'campus_documents'=>CampusDocument::where('campus_id',auth()->user()->campus_id)->with('document')->get(),
        ]);
    }

    public function selectedDocument($id)
    {
       if (in_array($id, $this->selected_documents)) {
            array_splice($this->selected_documents, array_search($id, $this->selected_documents), 1);
       }else{
           $this->selected_documents[] = $id;
       }
    }

    public function submit()
    {
        if (empty($this->selected_documents)) {
            $this->notification()->notify([
                'title' => 'Fail',
                'description' => 'Please select at least one document',
                'icon' => 'error',
            ]);
            return;
        }
        $this->validate([
            'receiver_name'=>'required',
            'purpose'=>'required',
            'other_purpose'=>'required_if:purpose,Others',
        ]);

        // request information
        $request = Request::create([
            'user_id'=>auth()->user()->id,
            'purpose'=>$this->purpose,
            'other_purpose'=>$this->other_purpose,
            'receiver_name'=>$this->receiver_name,
            'campus_id'=>auth()->user()->campus_id,
            'request_code'=>'SKSU-'.auth()->user()->id.'-'.rand(100,999).time(),
            'requestor_current_status'=>auth()->user()->information->student_status,
        ]);

        // all request documents
        foreach ($this->selected_documents as $document_id) {
            RequestDocument::create([
                'request_id'=>$request->id,
                'campus_document_id'=>$document_id,
            ]);
        }

        // redirecting to finalize request page
        return redirect()->route('requestor.finalize-request',['id'=>$request->id,]);
    }
}