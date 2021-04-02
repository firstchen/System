<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('department_id')->default(0)->comment('部门ID');
            $table->integer('position_id')->default(0)->comment('职位ID');
            $table->string('user_name', 64)->default('')->comment('用户名称');
            $table->string('account', 64)->default('')->index('account')->comment('账户');
            $table->string('password', 64)->default('')->comment('密码');
            $table->string('cellphone', 64)->default('')->index('cellphone')->comment('手机号码');
            $table->string('email', 64)->default('')->index('email')->comment('邮箱');
            $table->integer('login_ts')->default(0)->comment('最近一次登录时间');
            $table->integer('register_ts')->default(0)->comment('注册时间');
            $table->integer('create_ts')->default(0)->comment('创建时间');
            $table->integer('update_ts')->default(0)->comment('更新时间');
        });

        DB::statement("ALTER TABLE `user` COMMENT '用户表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
