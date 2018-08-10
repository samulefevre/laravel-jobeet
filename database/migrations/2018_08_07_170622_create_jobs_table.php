<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();            
            $table->integer('category_id')->unsigned()->index();
            $table->string('type');
            $table->string('company');
            $table->string('logo');
            $table->string('url');
            $table->string('position');
            $table->string('location');
            $table->text('description');
            $table->text('how_to_apply');
            $table->string('token');
            $table->boolean('is_public');
            $table->boolean('is_activated');
            $table->string('email');
            $table->timestamp('expires_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
