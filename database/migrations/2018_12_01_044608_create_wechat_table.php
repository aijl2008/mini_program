<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWechatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wechat', function (Blueprint $table) {
            $table->increments('id');
            $table->char('open_id', 47)->unique();
            $table->char('union_id', 45)->unique()->nullable();
            $table->string('nickname', 45)->default('');
            $table->string('avatar', 300)->default('');
            $table->tinyInteger('sex', 45)->default(0);
            $table->string('country', 45)->default('');
            $table->string('province', 45)->default('');
            $table->string('city', 45)->default('');
            $table->char('mobile', 11)->default('');
            $table->string('email', 300)->default('');
            $table->string('qq', 45)->default('');
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
        Schema::dropIfExists('wechat');
    }
}
