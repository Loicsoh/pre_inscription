<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AcceuilController extends Controller
{
    public function index(): View{
        return view('acceuil.index');
    }

    public function home(): View{
        return view('acceuil.home');
    }
}
