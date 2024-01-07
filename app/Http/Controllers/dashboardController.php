<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Str;

class dashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $role =  strtolower($user->role->role_name);

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
                break;
            case "sales":
                break;
            case "finance":
                break;
            case "maintenance":
                break;
            case "customer":
                break;
        }


        return view('dashboardpage', ['config' => $config]);
    }
}
