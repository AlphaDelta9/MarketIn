<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('project_header_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->softDeletes();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->longText('upload')->nullable();
            $table->string('mime')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->unsignedInteger('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_details');
    }
}
