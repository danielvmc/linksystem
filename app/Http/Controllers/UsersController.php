<?php

namespace App\Http\Controllers;

use Hash;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function update()
    {
        $this->validate(request(), [
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        $user = auth()->user();

        if (!Hash::check(request('old_password'), $user->password)) {
            flash('Không đúng mật khẩu cũ', 'danger');

            return back();
        }

        $user->password = request('new_password');
        $user->save();

        flash('Đổi mật khẩu thành công', 'success');

        return back();
    }
}
