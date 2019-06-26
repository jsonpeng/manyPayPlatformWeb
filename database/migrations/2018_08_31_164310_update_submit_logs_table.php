<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateSubmitLogsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submit_logs', function (Blueprint $table) {
            if (!Schema::hasColumn('submit_logs', 'pay_platform')) {
              $table->string('pay_platform')->nullable()->comment('支付平台(支付宝,微信)');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     if (Schema::hasColumn('submit_logs', 'pay_platform')) {
         Schema::table('submit_logs', function (Blueprint $table) {
              $table->dropColumn('pay_platform');
         });
        }
    }
}
