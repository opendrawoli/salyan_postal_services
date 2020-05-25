<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinglePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_pages', function (Blueprint $table) {
            $table->id();
            $table->string('meta_key');
            $table->string('title_nepali');
            $table->string('title_english')->nullable();
            $table->text('description_nepali')->nullable();
            $table->text('description_english')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('single_pages');
    }
}
