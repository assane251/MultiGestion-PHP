<?php
namespace App\Config;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__ . "/../../vendor/autoload.php";

class Bootstrap
{

    public static function getEntityManager(): EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/../Models'], true);
        $connection = DriverManager::getConnection([
            'driver'   => 'pdo_pgsql',
            'dbname'   => 'db_php_v3',
            'host'     => 'localhost',
            'user'     => 'postgres',
            'password' => 'Assane45678',
        ]);

        return new EntityManager($connection, $config);
    }
}