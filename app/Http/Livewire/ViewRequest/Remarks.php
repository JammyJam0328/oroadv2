<?php

namespace App\Http\Livewire\ViewRequest;

use Livewire\Component;
use App\Models\Remark;
class Remarks extends Component
{
    public $request_id;
    public $intersected = false;
    public $remark;
    public function render()
    {
        return view('livewire.view-request.remarks',[
            'remarks' => $this->intersected ? Remark::where('request_id',$this->request_id)->get() : [],
        ]);
    }

    public function setReady()
    {
        $this->intersected = true;
    }

    public function addremarks()
    {
        $this->validate([
            'remark' => 'required|min:3',
        ]);
        Remark::create([
            'request_id' => $this->request_id,
            'message' => $this->remark,
        ]);
        $this->remark = '';
        $this->intersected = true;
    }
}