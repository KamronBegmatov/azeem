<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQazosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qazos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('madhab');
            $table->boolean('gender');
            $table->date('birth_date');
            $table->tinyInteger('adolescence_age');
            $table->tinyInteger('age_started_namaz');
            $table->tinyInteger('number_of_children')->nullable();
            $table->tinyInteger('regular_nifos_days')->nullable();
            $table->tinyInteger('regular_hayz_days')->nullable();
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
        Schema::dropIfExists('qazos');
    }
}
