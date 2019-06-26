<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNameCharactersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('name_characters', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('name_id')->unsigned();
            $table->foreign('name_id')->references('id')->on('name_sets');

            $table->string('character')->comment('性格名称');

            $table->index(['id', 'created_at']);
            $table->index('name_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('name_characters');
    }
}
