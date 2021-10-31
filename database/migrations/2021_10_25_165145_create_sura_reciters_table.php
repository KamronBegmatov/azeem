<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuraRecitersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sura_reciters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reciter_id')->constrained('reciters');
            $table->foreignId('sura_id')->constrained('suras');
            $table->string('audio', 30);
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
        Schema::dropIfExists('surahs');
    }
}
