<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule_users', function (Blueprint $table) {
            $table->integer('rule_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
        });
        Schema::table('rule_users', function (Blueprint $table) {
            $table->foreign('rule_id')->references('id')->on('rules')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rule_users');
    }
}
