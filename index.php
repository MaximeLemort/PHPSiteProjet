<?php

//chargement config
require_once(__DIR__.'/config/config.php');

//chargement autoloader pour autochargement des classes
require_once(__DIR__.'/config/Autoload.php');
Autoload::charger();

session_destroy();
session_start();

$frontcont = new FrontController();


