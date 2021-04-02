<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permission', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('role_id')->default(0)->comment('角色ID');
            $table->integer('permission_id')->default(0)->index('pid')->comment('权限ID');
            $table->integer('create_ts')->default(0)->comment('创建时间');
            $table->integer('update_ts')->default(0)->comment('更新时间');
            $table->index(['role_id', 'permission_id'], 'rid_pid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_permission');
    }
}
