<?php

use App\Domain;
use Illuminate\Database\Seeder;

class DomainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Domain::truncate();

        Domain::create([
            'name' => 'phucurl.info',
        ]);

        Domain::create([
            'name' => 'bantrevacuocsong.info',
        ]);

        Domain::create([
            'name' => 'blogtamsuviet.info',
        ]);

        Domain::create([
            'name' => 'contentkeoview.info',
        ]);

        Domain::create([
            'name' => 'fltrends.info',
        ]);

        Domain::create([
            'name' => 'howtohaveagoodhealth.info',
        ]);

        Domain::create([
            'name' => 'indodd.info',
        ]);

        Domain::create([
            'name' => 'minhurl.info',
        ]);

        Domain::create([
            'name' => 'mnltime.info',
        ]);

        Domain::create([
            'name' => 'mtndv.info',
        ]);

        Domain::create([
            'name' => 'mxnews.info',
        ]);

        Domain::create([
            'name' => 'newsph365.info',
        ]);

        Domain::create([
            'name' => 'newstimeph.info',
        ]);

        Domain::create([
            'name' => 'ntmdd.info',
        ]);

        Domain::create([
            'name' => 'nxnews.info',
        ]);

        Domain::create([
            'name' => 'phntm.info',
        ]);

        Domain::create([
            'name' => 'pnnews.info',
        ]);

        Domain::create([
            'name' => 'ptnews.info',
        ]);

        Domain::create([
            'name' => 'sieuthithongtin.info',
        ]);

        Domain::create([
            'name' => 'tintuchoatoc.info',
        ]);

        Domain::create([
            'name' => 'tipstobehealthy.info',
        ]);

        Domain::create([
            'name' => 'trendingtopnews.info',
        ]);

        Domain::create([
            'name' => 'ttdtin.info',
        ]);

        Domain::create([
            'name' => 'tuurl.info',
        ]);

        Domain::create([
            'name' => 'vntime.info',
        ]);

        Domain::create([
            'name' => 'vvtin.info',
        ]);
    }
}
