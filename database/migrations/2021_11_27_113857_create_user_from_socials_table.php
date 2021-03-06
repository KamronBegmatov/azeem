<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFromSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_from_socials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('google_id')->nullable(); // for google
            $table->string('facebook_id')->nullable(); // for facebook
            $table->integer('twitter_id'); // for twitter
            $table->string('provider_user_id'); // for twitter
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->string('avatar_original')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('user_from_socials');
    }
}
