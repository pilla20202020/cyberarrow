<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 250)->unique();
            $table->string('title');
            $table->string('position')->nullable();
            $table->text('content')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->integer('order')->nullable();
            $table->string('rank')->nullable();
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_published')->default(0);
            $table->boolean('is_primary')->default(false);
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
        Schema::dropIfExists('teams');
    }
}
