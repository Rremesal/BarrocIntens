<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Str;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $role =  strtolower($user->role->role_name);
        $config = [];

        switch ($role) {
            case "inkoop":
                $config = [

                    "image" => [
                        asset("Image/NavbarlogoBig.png"),
                        asset("Image/NavbarlogoBig.png"),
                    ],
                    "link" => [
                        [ "href" => '/product', "text" => "Producten"],
                        [ "href" => '/product/create', "text" => "Product aanmaken"],
                    ],
                ];
                break;
            case "inkoop_supervisor":
                $config = [

                    "image" => [
                        asset("Image/NavbarlogoBig.png"),
                        asset("Image/NavbarlogoBig.png"),
                        asset("Image/NavbarlogoBig.png"),
                    ],
                    "link" => [
                        [ "href" => '/product', "text" => "Producten"],
                        [ "href" => '/product/create', "text" => "Product aanmaken"],
                        [ "href" => '/stockchange', "text" => "Voorraadaanvragen"],
                    ],
                ];
                case "maintenance":
                    $config = [
    
                        "image" => [
                            asset("Image/NavbarlogoBig.png"),
                            asset("Image/NavbarlogoBig.png"),
                        ],
                        "link" => [
                            [ "href" => '/fullcalendar', "text" => "Calendar"],
                            [ "href" => '/fullcalendar/create', "text" => "Appointment aanmaken"],
                        ],
                    ];
                break;
            case "sales":
                $config = [

                    "image" => [
                        asset("Image/NavbarlogoBig.png"),
                    ],
                    "link" => [
                        [ "href" => '/user/create', "text" => "Gebruiker aanmaken"],

                    ],
                ];
                break;
            case "finance":
                break;
            case "maintenance":
                break;
            case "klant":
                return redirect('/');
                break;
        }


        return view('dashboardpage', ['config' => $config]);
    }
}
