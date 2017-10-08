<?php

use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{

        public function run()
    {
        $features = ['air conditioning','barbeque','dryer','gym','laundry',
            'lawn','microwave','outdoor shower','refrigerator','sauna',
            'swimming pool','tv cable','washer','wifi','window covering'];

        for($i=0;$i<count($features);$i++){
            DB::table('features')->insert([
                'name' => $features[$i],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
