<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictos', function (Blueprint $table) {
            $table->increments( 'id' );
            $table->string( 'title' );
            $table->string( 'full' );
            $table->string( 'thumb' );
            $table->string( 'library' );
            $table->integer( 'user_id' )->nullable();
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
        Schema::drop('pictos');
    }
}
