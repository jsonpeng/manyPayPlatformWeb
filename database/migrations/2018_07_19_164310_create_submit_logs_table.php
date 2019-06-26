<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubmitLogsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit_logs', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name')->comment('提交姓名');
            $table->string('email')->comment('提交邮箱');
            $table->string('submit_sex')->comment('提交性别');
            $table->string('submit_data')->comment('提交性格选项');
            $table->string('pay_status')->nullalbe()->default('未支付')->comment('支付状态 未支付/已支付/已超时');
            $table->float('price')->comment('支付金额');
            $table->string('rec_name')->nullable()->comment('系统推荐姓名');

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
        Schema::drop('submit_logs');
    }
}
