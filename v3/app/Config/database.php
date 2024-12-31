<?php

use App\Config\Bootstrap;

require_once __DIR__ . '/Bootstrap.php';

return (new Bootstrap())::getEntityManager();