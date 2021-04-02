<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('permission', 1024)->default('')->comment('权限（路由地址）');
            $table->string('description')->default('')->comment('权限描述');
            $table->integer('create_ts')->default(0)->comment('创建时间');
            $table->integer('update_ts')->default(0)->comment('更新时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission');
    }
}
