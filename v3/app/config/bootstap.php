<?php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "../../vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/../models'],
    isDevMode: true,
);

$connection = DriverManager::getConnection(require_once __DIR__ . '/database.php', $config);
$entityManager = new EntityManager($connection, $config);
