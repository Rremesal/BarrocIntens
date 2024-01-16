<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\sendPassword;
use App\Models\PendingAccountRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Utility\Mail as UtilityMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Utility\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', "unique:".PendingAccountRequest::class],
        ]);

        $mail = new Mail("rremesal.dev@gmail.com");
        $mail->setSubject("Je account is aangevraagd");
        $mail->setBody("http://barrocintens.test/user/create?".http_build_query(["name" => $request->name,"email"=> $request->email]));

        $mail->sendMail();

        PendingAccountRequest::create($data);

        return redirect()->route('register')->with('message', "je accountaanvraag was succesvol");

    }
}
