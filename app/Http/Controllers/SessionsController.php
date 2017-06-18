<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
    public function create()
    {
        // return view('maintenance');
        return view('sessions.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (!auth()->attempt(request(['username', 'password']))) {
            flash('Bạn đã nhập sai tên hoặc mật khẩu', 'danger');

            return back();
        }

        flash('Đăng nhập thành công!', 'success');

        return redirect()->home();
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }
}
