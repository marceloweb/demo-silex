<?php

ini_set('display_errors', 1);

require_once '/opt/silex/vendor/autoload.php';

$app = require __DIR__.'/../src/app.php';
require __DIR__.'/../config/prod.php';
require __DIR__.'/../src/controllers.php';

$app->run();
