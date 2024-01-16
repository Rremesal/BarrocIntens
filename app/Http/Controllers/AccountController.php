<?php

namespace App\Http\Controllers;

use App\Models\PendingAccountRequest;
use App\Models\User;
use App\Utility\Mail;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    private $rules = [
        "name" => ["required", "min:2"],
        "email" => ["required", "email", "unique:".User::class]
    ];

    public function create() {
        $name = request()->input('name');
        $email = request()->input('email');
        return view("gebruiker.create", ['email' => $email, "name" => $name]);
    }

    public function store() {
        $data = request()->validate($this->rules);

        $password = Str::random(18);

        $mergedData = array_merge($data, array('role_id' => 3, 'password' => Hash::make($password)));

        $user = User::create($mergedData);
        if($user) {
            $mail = new Mail($mergedData["email"]);
            $mail->addRecipient("rremesal.dev@gmail.com", "Raul");

            $mail->setSubject("Je account is aangemaakt");
            $mail->setBody("Beste klant, <br><br> Bij deze willen we u op de hoogte stellen dat uw account nu actief is.");
            $mail->sendMail();

            $pendingRequest = PendingAccountRequest::where("email", $mergedData["email"])->get()[0];
            $pendingRequest->isHandled = 1;
            $pendingRequest->user_id = Auth::user()->id;
            $pendingRequest->save();

            return redirect()->route("user.create")->with("message", "Het account is succesvol aangemaakt");
        }
    }
}
