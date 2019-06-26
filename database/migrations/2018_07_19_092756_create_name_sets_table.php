<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNameSetsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('name_sets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->comment('具体名称');

            $table->integer('use_time')->nullable()->default(0)->comment('使用次数');

            $table->enum('type',['姓氏','男生名字','女生名字'])->comment('类型');

            $table->index(['id', 'created_at']);

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
        Schema::drop('name_sets');
    }
}
