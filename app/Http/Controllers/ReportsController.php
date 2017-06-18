<?php

namespace App\Http\Controllers;

use App\Site;

class ReportsController extends Controller
{
    public function index()
    {
        $sites = Site::latest()->get();

        return view('reports.index', compact('sites'));
    }

    public function store()
    {
        $this->validate(request(), [
            'site_name' => 'required',
        ]);

        Site::create([
            'site_name' => request('site_name'),
            'username' => auth()->user()->name,
        ]);

        flash('Thanks!', 'success');

        return back();
    }
}
