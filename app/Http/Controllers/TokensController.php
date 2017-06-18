<?php

namespace App\Http\Controllers;

class TokensController extends Controller
{
    public function create()
    {
        return view('tokens.create');
    }
}
