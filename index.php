<?php

require_once "../config.php";

use \Tsugi\Core\LTIX;

// Retrieve the launch data if present
$LTI = LTIX::requireData();

$p = $CFG->dbprefix;

// Start of the output
$OUTPUT->header();
?>
    <!-- Our main css file that overrides default Tsugi styling -->
    <link rel="stylesheet" type="text/css" href="styles/main.css">
<?php
$OUTPUT->bodyStart();

include("menu.php");
$_SESSION['groups'] = 0;//Data for making groups
$_SESSION['groupType'] = 0;

echo('
<h4>This simple tool is to designed to help faculty in engage students during classroom sessions. (PLACEHOLDERTEXT)</h4>
<a href="random-student.php" class="btn btn-primary"  data-toggle="modal">Randomly pick a student</a>
<p>Randomly picks a student</p>
<a href="random-order.php" class="btn btn-primary"  data-toggle="modal">Randomly order my students</a>
<p>Randomly orders students into a list</p>
<a href="random-groups.php" class="btn btn-primary"  data-toggle="modal">Randomly assign groups</a>
<p>Randomly groups students into a set number of groups or into groups of a set size</p>
');

$OUTPUT->footerStart();
?>
    <!-- Our main javascript file for tool functions -->
    <script src="scripts/randomly.js" type="text/javascript"></script>
<?php
$OUTPUT->footerEnd();
