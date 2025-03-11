<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug', 250)->unique();
            $table->string('title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('event_date')->nullable();
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_published')->default(0);
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
        Schema::dropIfExists('events');
    }
}
