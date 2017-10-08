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
        $this->call(AgentTableSeeder::class);
        $this->call(PropertyTypeTableSeeder::class);
        $this->call(PackageTableSeeder::class);
        $this->call(PropertyTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(FeaturesTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(RPartnerTableSeeder::class);

    }
}
