<?php

namespace App\Http\Controllers;

use App\Pokemon;
use App\User;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('money')->only('buy');
    }
    public function index(){
        $user=User::find(Auth::id());
        if($user->id_role==1){
            $pokemon=Pokemon::where('id_user',$user->id)->first();
            $type=Type::where('id',$pokemon->id_type)->first();
            return view('profile.index',compact('user','pokemon','type'));

        }
        return view('profile.index',compact('user'));
    }
    public function buy(){
        $user=User::find(Auth::id());
        
        $user->credits-=100;
        $user->pokeball+=1;
        $user->save();
        return redirect()->back();
    }
    public function recharge(){
        $user=User::find(Auth::id());
        $user->credits+=100;
        $user->save();
        return redirect()->back();
    }

}
