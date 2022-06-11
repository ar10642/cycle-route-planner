<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOriginalTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycle_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('author');
            $table->boolean('public');
            $table->decimal('stored_length', 5, 2);
            $table->timestamps();
        });
        Schema::create('segments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cycle_route_id');
            $table->integer('segment_index');
            $table->timestamps();
        });
        Schema::create('waypoints', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('segment_id');
            $table->decimal("latitude", 8, 6);
            $table->decimal("longitude", 8, 6);
            $table->float('elevation');
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
        Schema::dropIfExists('cycle_routes');
        Schema::dropIfExists('segments');
        Schema::dropIfExists('waypoints');

    }
}
