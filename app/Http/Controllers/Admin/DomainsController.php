<?php

namespace App\Http\Controllers\Admin;

use App\Domain;
use App\Http\Controllers\Controller;

class DomainsController extends Controller
{
    public function index()
    {
        $domains = Domain::latest()->get();

        return view('admin.domains.index', compact('domains'));
    }

    public function create()
    {
        return view('admin.domains.create');
    }

    public function store()
    {
        Domain::create(request(['name']));

        return redirect('admin/domains');
    }

    public function destroy(Domain $domain)
    {
        $domain->delete();

        flash('Xoá thành công!', 'success');

        return redirect('/admin/domains');
    }
}
