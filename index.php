<?php

declare(strict_types=1);

namespace App;

require_once('autoload.php');
include_once("src/Utils/debug.php");
$configuration = require_once("config.php");

use App\Routing;
use App\Controllers\Controller;

Controller::initConfiguration($configuration['db']);
Routing::execute();