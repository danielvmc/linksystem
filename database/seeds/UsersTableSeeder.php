<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => '@kocopass1',
            'admin' => true,
        ]);

        User::create([
            'name' => 'Nga',
            'username' => 'nguyennga',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Tuyết',
            'username' => 'anhtuyet',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Tâm',
            'username' => 'huynhuyen',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Thanh',
            'username' => 'nguyenthanh',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Duyên',
            'username' => 'myduyen',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Phúc',
            'username' => 'nguyenlinh',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Chi',
            'username' => 'trucchi',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Vương',
            'username' => 'vuong',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Lý Hải',
            'username' => 'lyhai',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Phương',
            'username' => 'hoangphuong',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Nàng Kiều',
            'username' => 'nangkieu',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Lê Bình',
            'username' => 'levbinh',
            'password' => '123456',
        ]);
    }
}
