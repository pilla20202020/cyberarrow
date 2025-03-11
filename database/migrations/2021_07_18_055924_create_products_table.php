<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->longText('description')->nullable();
            $table->decimal('price')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(0);
            // $table->boolean('is_popular')->default(0);
            $table->boolean('status')->default(1);
            $table->boolean('signature')->default(0);
            $table->boolean('chef')->default(0);
            $table->boolean('award')->default(0);
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
        Schema::dropIfExists('products');
    }
}
