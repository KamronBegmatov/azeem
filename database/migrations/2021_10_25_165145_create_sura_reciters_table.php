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
            $table->foreignId('sura')->constrained('suras', 'sura');
            $table->integer('ayah')->nullable();
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
