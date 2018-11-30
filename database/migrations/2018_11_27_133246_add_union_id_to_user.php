<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnionIdToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname')->after('name')->default('');
            $table->string('open_id')->unique()->after('email');
            $table->string('union_id')->after('open_id')->unique();
            $table->string('avatar')->after('union_id')->default('');
            $table->dropIndex('users_email_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nickname', 'open_id', 'union_id', 'avatar']);
        });
    }
}
