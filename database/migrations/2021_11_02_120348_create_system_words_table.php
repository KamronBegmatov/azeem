<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_words', function (Blueprint $table) {
            $table->id();
            $table->string('title', 15);
            $table->string('text', 15);
            $table->foreignId('language_id')->constrained('languages');
            $table->unique(array('title', 'language_id'));
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
        Schema::dropIfExists('system_words');
    }
}
