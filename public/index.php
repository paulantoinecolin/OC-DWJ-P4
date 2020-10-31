<?php

session_start();


$_SESSION['isAdmin'] = $_SESSION['isAdmin'] ?? false;
// = // $_SESSION[‘isAdmin’] = isset($_SESSION[‘isAdmin’]) ?  $_SESSION[‘isAdmin’] : false;



require_once('../libraries/autoload.php');
require_once('../libraries/tools.php');

\Application::process();
