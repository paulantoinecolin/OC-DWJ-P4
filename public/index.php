<?php

session_start();
$_SESSION['role'] = "admin";

require_once('../libraries/autoload.php');
require_once('../libraries/tools.php');

\Application::process();
