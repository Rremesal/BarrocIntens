<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    function index(){
        return view('machines.index');
    }

    function create(){
        return view('machines.create');
    }
}
