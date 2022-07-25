<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
class RequestController extends Controller
{
    public function index()
    {
        return view('pages.requests.main');
    }

    public function view($id)
    {
        $request = RequestModel::where('id',$id)->with(['user'=>function($query){
            $query->select('id','name','email');
        },'user.information.program.campus'])->first();
        if ($request->requestor_current_status=="graduated") {
            $allowed_to_manage = auth()->user()->campus_id == 1 ? true : false;
        }else{
            $allowed_to_manage = true;
        }
        return view('pages.view-request.main',[
            'request'=>$request,
        ]);
        
    }
}