<?php

use CommandString\Pdo\Driver;

require_once "./vendor/autoload.php";

$driver = (new Driver())
    ->withUsername("vpsadmin")
    ->withPassword("ib3neiNg!")
    ->withHost("10.8.0.1")
    ->withDatabase("commander_overlord")
    ->connect();

$driver->query("SELECT name FROM selfroles_categories");