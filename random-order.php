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

$hasRosters = LTIX::populateRoster(false);
$x = 0;
if ($hasRosters) {
    $rosterData = $GLOBALS['ROSTER']->data;
    foreach ($rosterData as $roster){
        if($roster["roles"] != "Learner"){
            unset($rosterData[$x]);
        }
        $x++;
    }
    shuffle($rosterData);
echo('
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 text-left col-sm-offset-1">
            <a href="random-order.php" class="btn btn-primary"  data-toggle="modal"><span aria-hidden="true" class="fa fa-lg fa-refresh"></span> Go again</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-left col-sm-offset-1">
            <h2 class = "groupNumber">Random Order</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <h4 class="groupNumber">The randomly chosen order:</h4>
        </div>
    </div>
    <div class="row " >
        <div class="col-sm-4 col-sm-offset-4 text-left alert-success">
        <ol class="listOrderTop">
    ');
    foreach($rosterData as $student) {echo('
            <li class="listOrder">'.$student["person_name_full"].'</li>
    ');}
    echo('</ol></div></div>
    
</div>
');
} else {
    echo ("No roster found");
}
$OUTPUT->footerStart();
?>
    <!-- Our main javascript file for tool functions -->
    <script src="scripts/randomly.js" type="text/javascript"></script>
<?php
$OUTPUT->footerEnd();
