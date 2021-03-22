<?php

namespace App\Console\Commands\Migrations;

use Illuminate\Console\Command;

class GenerateMigration extends Command
{
    protected $signature = 'generate:migration {mysql_connection : 数据库链接}';

    protected $description = '根据数据库表生成Migration文件';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $connectionName = $this->argument('mysql_connection');
        if (!config("database.connections.{$connectionName}")) {
            $this->error("{$connectionName}数据库连接配置异常");
            return false;
        }

        $this->call('migrate:generate', [
            '-c' => $connectionName,
            '-p' => sprintf('%s/migrations', database_path())
        ]);

        $this->info('Migrate Success');

        return true;
    }
}
