<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_headers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->text('description');
            $table->foreignId('user_id')->constrained();
            $table->string('type_name');
            $table->foreign('type_name')->references('name')->on('types')->cascadeOnUpdate();
            $table->string('city_name');
            $table->foreign('city_name')->references('name')->on('cities');
            $table->longText('picture');
            $table->string('mime');
            $table->longText('asset')->nullable();
            $table->string('type')->nullable();
            $table->date('work');
            $table->unsignedInteger('budget');
            $table->softDeletes();
            $table->timestamp('finished_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_headers');
    }
}
