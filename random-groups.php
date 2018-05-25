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


shuffle($names);
/*$hasRosters = LTIX::populateRoster(false);
if ($hasRosters) {
    $rosterData = $GLOBALS['ROSTER']->data;
    $num = rand (0,sizeof($rosterData));
    $name = $rosterData[$num];
} else {
    $name = "No roster found";
}*/


echo('
<div class="container-fluid borderDashed">
    <div class="row">
        <div class="col-sm-3 text-right question-actions">
            <a href="#Edit_Wrap_Up_Text" class="btn btn-warning" data-toggle="modal">
                <span aria-hidden="true" title="Choose Groups"></span><span>Choose Groups</span>
            </a>
        </div>
        <!-- Edit Wrap Up Question Text Modal -->
        <div class="modal fade" id="Edit_Wrap_Up_Text" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">How would you like your groups created?</h4>
                    </div>
                    <form method="post"  action="actions/makeGroups.php">
                        <div class="modal-body">
                            <input type="hidden" name="xGroups_Used" value="xGroups_Used"/>
                                I would like<input type="text" name="xGroups" value="">groups.
                                                    <input type="submit" class="btn btn-success" value="Submit">
                        </div>
                    </form>
                        <h4>OR</h4>
                        <form method="post"  action="actions/makeGroups.php">
                            <div class="modal-body">
                                <input type="hidden" name="xPerGroup_Used" value="xPerGroup_Used"/>
                                    I would like<input type="text" name="xPerGroup" value="">students in each group
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>

                </div>
            </div>
    </div>
</div>');

if($_SESSION['groupType'] > 0){

    echo('<h2>Result</h2>
    <div class="row">
        <div class="col-sm-11 col-sm-offset-1 text-left">
            <h4>The randomly chosen groups are:</h4>
        </div>
    </div><div class="row">
    ');
    echo ("----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");


    if($_SESSION['groups'] > sizeof($names)){
        $_SESSION['groups'] = sizeof($names);
    }
    if($_SESSION['groups'] < 1){
        $_SESSION['groups'] = 1;
    }
    $remain = sizeof($names) % $_SESSION['groups'];
    $i = 0;
}

if($_SESSION['groupType'] == 1) {
    $inGroup = floor(sizeof($names) / $_SESSION['groups']);
    for($x = 0; $x < $_SESSION['groups']; $x++){
        for($y = 0; $y < $inGroup; $y++) {
            echo('
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 text-center nameTheme">
                        <h1>' . $names[$i] . '</h1>
                    </div>
                </div>
            ');
            $i++;
        }
        if($remain > 0){
            echo('
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 text-center nameTheme">
                        <h1>' . $names[$i] . '</h1>
                    </div>
                </div>
            ');
            $i++;
            $remain--;
        }
        echo ("----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");
    }
} else if($_SESSION['groupType'] == 2) {
    $groups = floor(sizeof($names) / $_SESSION['groups']);
    for ($x = 0; $x < $groups; $x++) {
        for ($y = 0; $y < $_SESSION['groups']; $y++) {
            echo('
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 text-center nameTheme">
                        <h1>' . $names[$i] . '</h1>
                    </div>
                </div>
            ');
            $i++;
        }
        echo ("----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");
    }
    if ($remain > 0) {
        echo ('<h3>Leftover</h3>');
        for ($x = 0; $x < $remain; $x++) {
            echo('
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 text-center nameTheme">
                        <h1>' . $names[$i] . '</h1>
                    </div>
                </div>
            ');
            $i++;
        }
        echo("----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");
    }
}
echo('</div></div>');
$_SESSION['groups'] = 0;
$_SESSION['groupType'] = 0;

$OUTPUT->footerStart();
?>
    <!-- Our main javascript file for tool functions -->
    <script src="scripts/randomly.js" type="text/javascript"></script>
<?php
$OUTPUT->footerEnd();
