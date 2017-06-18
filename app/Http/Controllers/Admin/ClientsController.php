<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(20);

        return view('admin.clients.index', compact('clients'));
    }
}
