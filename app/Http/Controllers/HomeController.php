<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\User;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = Auth::user();
        // dd($users->id);
        return view('home');
    }

    public function users(){
        $users =  User::get();
        
        return view('users.index', get_defined_vars());
    }

    public function active($id){
        $user = User::find($id);
        if($user->active == 1){
            $user->active = 0;
            $user->save();
        }else{
            $user->active = 1;
            $user->save();
        }

        return redirect('users');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();

        return redirect('users');
    }
}
