<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->default(0)->comment('用户ID');
            $table->integer('role_id')->default(0)->index('rid')->comment('角色ID');
            $table->integer('create_ts')->default(0)->comment('创建时间');
            $table->integer('update_ts')->default(0)->comment('更新时间');
            $table->index(['user_id', 'role_id'], 'uid_rid');
        });

        DB::statement("ALTER TABLE `user_role` COMMENT '角色权限关系表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_role');
    }
}
