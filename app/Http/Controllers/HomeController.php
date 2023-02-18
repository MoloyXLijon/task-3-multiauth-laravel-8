<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        if (Auth::check()) {
            if (Auth::user()->role == 'user') {
                return view('home.pending');
            }
        }
        $users = User::where('status', 1)->get();
        return view('home',compact('users'));
    }
    public function changeStatus($id){
        $user = User::find($id);
        if($user->status == 0){
            $user->status = 1;
        }else{
            $user->status = 0;
        }
        $user->save();
        return redirect()->back();
    }
}
