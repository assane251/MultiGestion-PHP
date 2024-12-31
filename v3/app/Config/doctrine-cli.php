<?php

use App\Config\Bootstrap;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

require_once __DIR__ . '/Bootstrap.php';

ConsoleRunner::run(
    new SingleManagerProvider((new Bootstrap())::getEntityManager())
);