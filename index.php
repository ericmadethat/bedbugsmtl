<?php

// Base path
define( 'ETITE', dirname(__FILE__) );

// Config, prices, etc
require 'definitions.php';

// Initiate
require 'i'. DIRECTORY_SEPARATOR .'app.php';
require 'i'. DIRECTORY_SEPARATOR .'lang.class.php';
App::init();

// Display page
echo App::load('i'. DIRECTORY_SEPARATOR .'page.php');
