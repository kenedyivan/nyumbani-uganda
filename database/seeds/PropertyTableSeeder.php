<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = 1;
      $a = 5;
      for($i = 0; $i<4;$i++){
          for($j = $n; $j<=$a; $j++){
              DB::table('properties')->insert([
                  'agent_id' =>($i+1),
                  'property_type_id' => '1',
                  'package_id' => '1',
                  'title' => 'messiah apartments'.($j),
                  'image' => 'h'.($j).'.jpeg',
                  'for_sale' =>($j%2!=0?1:0),
                  'for_rent' => ($j%2==0?1:0),
                  'status' => 1,
                  'of_value' => ($j>16?1:0),
                  'description' => 'Lorem Ipsum is simply dummy text of the printing and
      typesetting industry. Lorem Ipsum has been the industry\'s standard
      dummy text ever since the 1500s, when an unknown printer took a galley',
                  'propertyID' => 'prop456'.$j.'p',
                  'area_size' => 237,
                  'size_prefix' => 237,
                  'price' => 150000,
                  'currency' => 'ugx',
                  'bedrooms' => 3,
                  'bathrooms' => 1,
                  'garage' => 2,
                  'year_built' => '2001-02-02',
                  'last_remodel_year' => '2009-03-03',
                  'address' => '27, goliath street',
                  'district' => 'mbale',
                  'town' => 'mbale',
                  'region' => 'eastern',
                  'country' => 'Uganda',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
              ]);

          }

              $n = $j;
              $a = $a+5;

      }

  }
}
