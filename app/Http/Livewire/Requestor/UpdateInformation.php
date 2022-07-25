<?php

namespace App\Http\Livewire\Requestor;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Program;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
class UpdateInformation extends Component
{
    use Actions, WithFileUploads;
    public $student_id;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $address;
    public $program;
    public $contact_number;
    public $student_status;
    public $valid_id;
    public $sex;


    public $campuses=[];
    public $campus;
    public $programs=[];
    public function getInformationProperty()
    {
        return Information::where('user_id',auth()->user()->id)->first();
    }
    public function updatedCampus()
    {
        $this->programs = Program::where('campus_id',$this->campus)->get();
    }
    public function mount()
    {
        $this->campuses = Campus::all();
        $this->campus = $this->information->program->campus_id;
        $this->programs = Program::where('campus_id',$this->campus)->get();
        $this->student_id = $this->information->student_id;
        $this->first_name = $this->information->first_name;
        $this->middle_name = $this->information->middle_name;
        $this->last_name = $this->information->last_name;
        $this->address = $this->information->address;
        $this->program = $this->information->program_id;
        $this->contact_number = $this->information->contact_number;
        $this->student_status = $this->information->student_status;
        $this->valid_id = $this->information->valid_id;
        $this->sex = $this->information->sex;
    }
    public function render()
    {
        return view('livewire.requestor.update-information')
        ->layout('layouts.requestor');
    }

    public function updateInformation()
    {
        $this->validate([
            'student_id' => 'nullable|unique:information,student_id,'.$this->information->id,
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'address' => 'required',
            'program' => 'required',
            'contact_number' => 'required',
            'student_status' => 'required',
            'sex'=>'required|in:Male,Female'
        ]);

        $this->information->update([
            'student_id'=>$this->student_id,
            'first_name'=>$this->first_name,
            'middle_name'=>$this->middle_name,
            'last_name'=>$this->last_name,
            'address'=>$this->address,
            'program_id'=>$this->program,
            'contact_number'=>$this->contact_number,
            'student_status'=>$this->student_status,
            'sex'=>$this->sex,
            'valid_id'=>$this->valid_id != $this->information->valid_id ? $this->valid_id->store('valid-id','public') : $this->information->valid_id,
        ]);
        
        $this->notification()->notify([
            'title'=>'Information Updated',
            'description'=>'Your information has been updated',
            'icon'=>'success',
        ]);
    }
}