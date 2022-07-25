<?php

namespace App\Http\Livewire\Requestor;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Program;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
class SetUpInformation extends Component
{
    use WithFileUploads, Actions;
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

    protected $validationAttributes = [
        'program'=>'course'
    ];
    public function mount()
    {
        if (auth()->user()->role!='requestor') {
            abort(404);
        }
        $this->campuses = Campus::all();

    }
    public function updatedCampus()
    {
        $this->programs = Program::where('campus_id',$this->campus)->get();
    }
    public function render()
    {
        return view('livewire.requestor.set-up-information')
        ->layout('layouts.setup');
    }

    public function addInformation()
    {
        $this->validate([
            'student_id'=>'nullable|unique:information,student_id|regex:/^[0-9]{5}$/',
            'first_name'=>'required|regex:/^[a-zA-Z\s]*$/',
            'middle_name'=>'nullable|regex:/^[a-zA-Z\s]*$/',
            'last_name'=>'required|regex:/^[a-zA-Z\s]*$/',
            'address'=>'required',
            'program'=>'required',
            'contact_number'=>'required|regex:/^[0-9]{11}$/',
            'student_status'=>'required',
            'valid_id'=>'required',
            'sex'=>'required|in:Male,Female'
        ]);

        Information::create([
            'user_id'=>auth()->user()->id,
            'student_id'=>$this->student_id,
            'first_name'=>$this->first_name,
            'middle_name'=>$this->middle_name,
            'last_name'=>$this->last_name,
            'address'=>$this->address,
            'program_id'=>$this->program,
            'contact_number'=>$this->contact_number,
            'student_status'=>$this->student_status,
            'valid_id'=>$this->valid_id->store('valid-id','public'),
            'sex'=>$this->sex,
        ]);
        auth()->user()->update([
            'campus_id'=>$this->campus,
            'hasInformation'=>1,
        ]);
        return redirect()->route('dashboard');
    }
}