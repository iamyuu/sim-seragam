<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as Input;

class AuthController extends Controller
{
    public function changed()
    {
		$user = User::findOrFail(Auth::id());

		if (Hash::check(Input::get('old'), $user['password']) && Input::get('new') == Input::get('confirm')) {
            $user->password = Hash::make(Input::get('new'));
            $user->update();
        } else {
            return redirect()->back()->withErrors('Password gagal diubah');
        }

        return redirect()->back()->withStatus('Password berhasil diubah');
    }
}
