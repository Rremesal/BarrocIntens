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
                    ],
                    "link" => [
                        [ "href" => '/producten', "text" => "Dit gaat naar producten"],
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
