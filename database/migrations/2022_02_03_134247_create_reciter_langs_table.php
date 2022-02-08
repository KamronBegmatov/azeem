<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReciterLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reciter_langs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('info');
            $table->foreignId('reciter_id')->constrained('reciters');
            $table->foreignId('style_id')->constrained('styles');
            $table->foreignId('language_id')->constrained('languages');
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
        Schema::dropIfExists('reciter_langs');
    }
}
