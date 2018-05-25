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

$names = array("David", "Ryan", "James", "Julianne", "Leah", "Stephanie", "Aidan", "Paul", "RyMan");

$num = rand (0,sizeof($names) - 1);
$name = $names[$num];
/*$hasRosters = LTIX::populateRoster(false);
if ($hasRosters) {
    $rosterData = $GLOBALS['ROSTER']->data;
    $num = rand (0,sizeof($rosterData));
    $name = $rosterData[$num];
} else {
    $name = "No roster found";
}*/

echo('<div class="container-fluid borderDashed">
     <div class="row">
        <div class="col-sm-12 text-center">
            <h2 class = "groupNumber">Result</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <h4 class="groupNumber">The randomly chosen Student:</h4>
        </div>
    </div><div class="row">
    <p>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 text-center">
            <h1 class="nameTheme">'.$name.'</h1>
        </div>
    </div>
    <p>_____________________________________________________________________________________________________________________</p>
    <a href="random-student.php" class="btn btn-primary"  data-toggle="modal">Pick again</a>
</div>
');


$OUTPUT->footerStart();
?>
    <!-- Our main javascript file for tool functions -->
    <script src="scripts/randomly.js" type="text/javascript"></script>
<?php
$OUTPUT->footerEnd();
