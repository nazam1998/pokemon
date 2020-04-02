<?php

namespace App\Http\Controllers;

use App\Pokeball;
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
        return view('profile.index',compact('user'));
    }
    public function buy($id){
        $user=User::find(Auth::id());
        $pokeball=Pokeball::find($id);
        $user->credits-=$pokeball->prix;
        $user->pokeballs()->attach($id);
        $pokeball->save();
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
