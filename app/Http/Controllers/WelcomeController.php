<?php

namespace App\Http\Controllers;


class WelcomeController extends Controller
{
    public function home()
    {
        return view('guest.homepage');
    }

}
