<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agent_id');
            $table->integer('property_type_id');
            $table->integer('package_id');
            $table->string('title');
            $table->string('image');
            $table->integer('for_sale');
            $table->integer('for_rent');
            $table->integer('status');
            $table->integer('of_value');
            $table->string('description',10000);
            $table->string('propertyID');
            $table->float('area_size');
            $table->string('size_prefix');
            $table->double('price');
            $table->enum('currency', ['ugx', 'usd']);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('garage');
            $table->date('year_built');
            $table->date('last_remodel_year');
            $table->string('address');
            $table->string('district');
            $table->string('town');
            $table->string('region');
            $table->string('country');
            $table->float('longitude');
            $table->float('latitude');
            $table->integer('recommended')->default(0);
            $table->integer('views')->default(0);
            $table->integer('rating')->default(0);
            $table->integer('suspended')->default(0);
            $table->smallInteger('banner')->default(0);
            $table->smallInteger('active')->default(0);
            $table->dateTime('last_activated_date')->nullable();
            $table->dateTime('expiry_date')->nullable();
            $table->smallInteger('expired')->default(0);
            $table->dateTime('last_expiry_date')->nullable();
            $table->integer('initialize_count')->default(0);
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
        Schema::dropIfExists('properties');
    }
}
