<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<5;$i++){
            DB::table('agents')->insert([
                'first_name' => 'agent'.$i.'fname',
                'last_name' => 'agent'.$i.'lname',
                'username' => 'agent'.$i.'uname',
                'profile_picture' => 'a'.$i.'.jpg',
                'company' => 'evervest housing',
                'position' => 'sales personnel',
                'office_phone' => '080056789'.$i,
                'mobile_phone' => '070451614'.$i,
                'fax' => '040089765'.$i,
                'email' => 'agent'.$i.'@evervest.ug',
                'facebook_link' => 'https://www.facebook.com/evervestug',
                'twitter_link' => 'https://www.twitter.com/evervestug',
                'linkedin_link' => 'https://www.linkedin.com/evervestug',
                'password' => bcrypt('12345'.$i),
                'user_type' => '1',
                'bio' => 'Lorem Ipsum is simply dummy text of the printing and
      typesetting industry. Lorem Ipsum has been the industry\'s standard
      dummy text ever since the 1500s, when an unknown printer took a galley',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

    }
}
