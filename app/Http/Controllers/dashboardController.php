<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();



        switch ($user->role->role_name) {
            case "Inkoop":
                $config = [

                    "image" => [
                        asset("Image/NavbarlogoBig.png"),
                        asset("Image/NavbarlogoSmall.png")
                    ],
                    "link" => [
                        [ "href" => "/home", "text" => "Dit gaat naar Home"],
                        ["href" => "/dash", "text"  => "Dit gaat naar dashboard"]
                    ],
                ];
                break;
            case "Sales":
                break;
            case "Finance":
                break;
            case "Maintenance":
                break;
            case "Customer":
                break;
        }


        return view('dashboardpage', ['config' => $config]);
    }
}
