<?php

require_once "../../config.php";

use \Tsugi\Core\LTIX;

// Retrieve the launch data if present
$LAUNCH = LTIX::requireData();

if (isset($_POST['xGroups_Used'])) {
    $_SESSION['groups'] = $_POST['xGroups'];
    $_SESSION['groupType'] = 1;
    header('Location: ' . addSession('../random-groups.php'));
} else if (isset($_POST['xPerGroup_Used'])) {
    $_SESSION['groups'] = $_POST['xPerGroup'];
    $_SESSION['groupType'] = 2;
    header('Location: ' . addSession('../random-groups.php'));
}else{
    $_SESSION['groups'] = 0;
    $_SESSION['groupType'] = -1;
    header('Location: ' . addSession('../random-groups.php'));
}

