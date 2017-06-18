<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(QuotesTableSeeder::class);
        $this->call(DomainsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
