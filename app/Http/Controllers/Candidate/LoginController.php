<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Candidate;
use Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $candidate = Candidate::where('email', $request->email)->first();
        if ($candidate) {
            $password = decrypt($candidate->password);
            if ($password == $request->password) {
                Auth::guard('candidate')->login($candidate);
                return dd(
                    Auth::guard('candidate')->user()

                );
                return redirect()->intended('/candidato/visualizar');
            }
        }
    }
}
