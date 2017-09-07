<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FakeDomain;

class FakeDomainsController extends Controller
{
    public function index()
    {
        $domains = FakeDomain::latest()->get();

        return view('admin.fakedomains.index', compact('domains'));
    }

    public function create()
    {
        return view('admin.fakedomains.create');
    }

    public function store()
    {
        FakeDomain::create(request(['name']));

        return redirect('admin/fake-domains');
    }

    public function destroy(FakeDomain $domain)
    {
        $domain->delete();

        flash('Xoá thành công!', 'success');

        return redirect('/admin/fake-domains');
    }
}
