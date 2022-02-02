<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllahNameLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allah_name_langs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('allah_name_id')->constrained('allah_names');
            $table->string('name');
            $table->foreignId('language_id')->constrained('languages');
            $table->unique(array('allah_name_id', 'language_id'));
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
        Schema::dropIfExists('allah_name_langs');
    }
}
