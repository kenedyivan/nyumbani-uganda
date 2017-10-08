<?php

use Illuminate\Database\Seeder;

class RPartnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partner = [
            ['name'=>'lamudi',
                'logo'=>'p1.jpeg'],
            ['name'=>'airbnb',
                'logo'=>'p2.jpeg'],
            ['name'=>'etsy',
                'logo'=>'p3.jpeg'],
            ['name'=>'blue bico',
                'logo'=>'p4.jpeg'],
        ];

        for($i=0;$i<4;$i++){
            DB::table('r_partners')->insert([
                'name' => $partner[$i]['name'],
                'logo' => $partner[$i]['logo'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
