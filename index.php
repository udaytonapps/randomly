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
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 text-left col-sm-offset-1">
            <h2 class = "groupNumber">Randomly</h2>
        </div>
    <div class="col-sm-10 col-sm-offset-1 text-left">
        <h4>This tool allows faculty to randomly pick a student, order students into a list, or create groups.</h4>
    </div>
        <div class="col-sm-6 col-sm-offset-3 mainCardsSizer">
            <div class="row mainCardStyle">
                <div class="col-sm-4 text-center">
                    <span class="fa fa-4x fa-user mainCardIconSpacing"></span>
                </div>
                <div class="col-sm-8 mainCardSubBackground">
                    <h3 class="mainCardTitle">
                        <a href="random-student.php">
                            Random Student
                        </a>
                    </h3>
                    <span>Randomly picks a student</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-sm-offset-3 mainCardsSizer">
            <div class="row mainCardStyle">
                <div class="col-sm-4 text-center">
                    <span class="fa fa-4x fa fa-list-ol mainCardIconSpacing"></span>
                </div>
                <div class="col-sm-8 mainCardSubBackground">
                    <h3 class="mainCardTitle">
                        <a href="random-order.php">
                            Random Order
                        </a>
                    </h3>
                    <span>Randomly orders students into a list</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-sm-offset-3 mainCardsSizer">
            <div class="row mainCardStyle">
                <div class="col-sm-4 text-center">
                    <span class="fa fa-4x fa-users mainCardIconSpacing"></span>
                </div>
                <div class="col-sm-8 mainCardSubBackground">
                    <h3 class="mainCardTitle">
                        <a href="random-groups.php">
                            Random Groups
                        </a>
                    </h3>
                    <span>Randomly groups students into a set number of groups or into groups of a set size</span>
                </div>
            </div>
        </div>
    </div>
</div>
            ');

$OUTPUT->footerStart();
?>
    <!-- Our main javascript file for tool functions -->
    <script src="scripts/randomly.js" type="text/javascript"></script>
<?php
$OUTPUT->footerEnd();
