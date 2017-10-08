<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = [
            ['title'=>'Home Appraisals: 5 Things Buyers Should Watch Out For',
            'slug'=>'Home Appraisals: 5 Things Buyers Should Watch Out For',
            'body'=>'If the house appraisal comes in less than the agreed-on price, you could be left to make up the difference out of pocket, since lenders approve loans based',
            'image'=>'b1.jpeg'],
            ['title'=>'Home Appraisals: 5 Things Buyers Should Watch Out For',
            'slug'=>'Home Appraisals: 5 Things Buyers Should Watch Out For',
            'body'=>'If the house appraisal comes in less than the agreed-on price, you could be left to make up the difference out of pocket, since lenders approve loans based',
            'image'=>'b2.jpeg'],
            ['title'=>'Home Appraisals: 5 Things Buyers Should Watch Out For',
            'slug'=>'Home Appraisals: 5 Things Buyers Should Watch Out For',
            'body'=>'If the house appraisal comes in less than the agreed-on price, you could be left to make up the difference out of pocket, since lenders approve loans based',
            'image'=>'b3.jpeg'],
            ['title'=>'Home Appraisals: 5 Things Buyers Should Watch Out For',
            'slug'=>'Home Appraisals: 5 Things Buyers Should Watch Out For',
            'body'=>'If the house appraisal comes in less than the agreed-on price, you could be left to make up the difference out of pocket, since lenders approve loans based',
            'image'=>'b4.jpeg'],
        ];

        for($i=0;$i<4;$i++){
            DB::table('posts')->insert([
                'admin_id' => 1,
                'title' => $post[$i]['title'],
                'slug' => $post[$i]['slug'],
                'body' => $post[$i]['body'],
                'image' => $post[$i]['image'],
                'active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
