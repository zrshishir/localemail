<?php

namespace App\Http\Controllers\LocalMail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\LocalMail\LocalMail;
use App\User;
use Validator, Auth;


class LocalMailController extends Controller
{
    public function index(){
        $documents = LocalMail::with(['from'])->where('to', Auth::user()->id)->get();
        return view('localemail.index', get_defined_vars());
    }

    public function create(){
        $users =  User::pluck('id', 'email');
        return view('localemail.form', $users);
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'mail_body' => 'required',
            'to' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('mails/form')
                        ->withErrors($validator)
                        ->withInput();
        }

        $input = LocalMail::create([
            'user_id' => Auth::user()->id,
            'mail_body'=> $request->mail_body,
            'to' => $request->to,
            'status' => 0
        ]);

        if(! $input){
            return redirect('mails/form')
                        ->withErrors($input)
                        ->withInput();
        }
        $documents =  LocalMail::get();
        return redirect('mails');
    }

    public function view($id){
        $changeStatus = LocalMail::find($id);
        if($changeStatus->status == 1){
            $changeStatus->status = 0;
        }else{
            $changeStatus->status = 1;
        }
        $changeStatus->save();
        
        $changeStatus = LocalMail::with(['from'])->find($id);
        return view('localemail.view', get_defined_vars());
    }

    public function sent(){
        $documents = LocalMail::with(['toUser'])->where('From', Auth::user()->id)->get();
        return view('localemail.sent', get_defined_vars());
    }

    public function delete($id){
        $user = LocalMail::find($id);
        $user->delete();

        return redirect('mails');
    }
}
