<?php

require 'system/autoloader.php';

define('ROOTDIR', basename(__DIR__), FALSE);

startup_files();

$App = new Resources\Page();

$App->Route();