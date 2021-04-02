<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 64)->default('')->comment('角色名称');
            $table->string('description')->default('')->comment('角色描述');
            $table->integer('create_ts')->default(0)->comment('创建时间');
            $table->integer('update_ts')->default(0)->comment('更新时间');
        });

        DB::statement("ALTER TABLE `role` COMMENT '角色表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role');
    }
}
