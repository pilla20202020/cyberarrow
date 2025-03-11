<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectControlsTable extends Migration
{
    public function up()
    {
        Schema::create('project_controls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');

            $table->string('primary_id');
            $table->string('id_seperator')->nullable();
            $table->string('sub_id');

            $table->boolean('applicable')->default(true);
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('status');
            $table->dateTime('deadline')->nullable();
            $table->string('frequency')->nullable();

            $table->unsignedBigInteger('responsible_id')->nullable();
            $table->unsignedBigInteger('approver_id')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('responsible_id')->references('id')->on('admins')->onDelete('set null');
            $table->foreign('approver_id')->references('id')->on('admins')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_controls');
    }
}
