<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
    public function profil() {
		return view('profil');  
    }
	
	public function changepass(Request $request) {
		$stara = $request->all()['oldpassword'];
		$nova = $request->all()['password'];
		$novaponovno = $request->all()['password_confirmation'];
		if ( Hash::check($stara, auth()->user()->password) ) {
			if ($nova == $novaponovno) {
				$user = User::find( Auth::id() );
				$user->password = Hash::make($nova);
				$user->save();
				return redirect()->back() ->with('alert', 'Lozinka je uspješno promijenjena!');
			}
			return redirect()->back() ->with('alert', 'Nova lozinka nije jednaka novoj potvrđenoj!');
		}	
        return redirect()->back() ->with('alert', 'Stara lozinka nije ispravna!');	
	}
}