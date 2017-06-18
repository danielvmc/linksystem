<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Quote;

class QuotesController extends Controller
{
    public function index()
    {
        $quotes = Quote::latest()->paginate(20);

        return view('admin.quotes.index', compact('quotes'));
    }

    public function create()
    {
        return view('admin.quotes.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'sentence' => 'required',
        ]);

        Quote::create([
            'sentence' => request('sentence'),
            'author' => request('author'),
        ]);

        flash('Tạo quote thành công', 'success');

        return back();
    }
}
