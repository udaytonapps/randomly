<?php

require_once "../../config.php";

use \Tsugi\Core\LTIX;

// Retrieve the launch data if present
$LAUNCH = LTIX::requireData();
$text = trim($_POST['RandomCustomText']);
$textAr = explode("\n", $text);
$textAr = array_filter($textAr, 'trim');
$_SESSION['$textareaText']=$textAr;
header('Location: ' . addSession('../random-custom.php'));
