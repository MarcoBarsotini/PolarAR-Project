<?php

namespace App\Helpers;

class ConnectDB {

    public static function setConnection($db) {
        \DB::purge('myconnection');

        $options = [
            'driver' => 'mysql',
            'host' => '',
            'database' => '',
            'username' => '',
            'password' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
        ];

        switch ($db) {
            case 'local':
                $options = array_merge($options, [
                    "host" => env('DB_HOST'),
                    "database" => env('DB_DATABASE'),
                    "username" => env('DB_USERNAME'),
                    "password" => env('DB_PASSWORD')
                ]);
            break;
        }

        \Config::set("database.connections.myconnection", $options);

        \DB::reconnect('myconnection');
        \DB::setDefaultConnection('myconnection');

        return $options;
    }
}
