<?php

use Dotenv\Dotenv;

// Charger le fichier .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

return [
    'migrations_paths' => [
        'DoctrineMigrations' => __DIR__ . '/../models/Migrations',
    ],
    'dbname' => getenv('DB_NAME'),
    'user' => getenv('DB_USER'),
    'password' => getenv('DB_PASSWORD'),
    'host' => getenv('SERVER_NAME'),
    'driver' => 'pdo_pgsql',
];