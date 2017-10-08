<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username', 50)->unique();
            $table->string('profile_picture');
            $table->string('company')->nullable();
            $table->string('position')->nullable();;
            $table->string('office_phone')->nullable();
            $table->string('mobile_phone')->nullable();;
            $table->string('fax')->nullable();
            $table->string('email', 50)->unique();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('password');
            $table->string('user_type');
            $table->string('bio')->nullable();
            $table->smallInteger('suspended')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
