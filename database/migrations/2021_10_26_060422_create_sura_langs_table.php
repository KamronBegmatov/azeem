<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuraLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sura_langs', function (Blueprint $table) {
            $table->id();
            $table->integer('sura');
            $table->integer('aya');
            $table->text('text');
            $table->foreignId('language_id')->constrained('languages');
            $table->string('name', 20)->nullable();
            $table->string('location', 10)->nullable();
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
        Schema::dropIfExists('sura_langs');
    }
}
