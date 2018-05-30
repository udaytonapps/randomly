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

$names = array("David", "Ryan", "James", "Julianne", "Leah", "Stephanie", "Aidan", "Paul", "RyMan" , "!!!!", "@@@", ")))))");

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
<div class="container-fluid">
    <div class="row">
        <!-- Edit Wrap Up Question Text Modal -->
        <div class="modal fade" id="randomGroupsModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">How would you like your groups created?</h4>
                    </div>
                    <form method="post"  action="actions/makeGroups.php">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-10 text-left">
                                    <input type="hidden" name="xGroups_Used" value="xGroups_Used"/>
                                    I would like <input type="text" name="xGroups" value=""> groups.
                                </div>
                                <div class="col-sm-2 text-left">
                                    <input type="submit" class="btn btn-success" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-11 text-center">
                            <h4>OR</h4>
                        </div>
                    </div>
                    <form method="post"  action="actions/makeGroups.php">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-10 text-left">
                                    <input type="hidden" name="xPerGroup_Used" value="xPerGroup_Used"/>
                                    I would like <input type="text" name="xPerGroup" value=""> students in each group
                                </div>
                                <div class="col-sm-2 text-left">
                                    <input type="submit" class="btn btn-success" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
');

if($_SESSION['groupType'] > 0){
    echo('
    <div class="row">
        <div class="col-sm-12 text-left col-sm-offset-1">
            <h2 class = "groupNumber">Random Groups</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <h4 class="groupNumber">The randomly chosen groups are:</h4>
        </div>
    </div><div class="row">
    ');

    if($_SESSION['groups'] > sizeof($names)){
        $_SESSION['groups'] = sizeof($names);
    }
    if($_SESSION['groups'] < 1){
        $_SESSION['groups'] = 1;
    }
    $remain = sizeof($names) % $_SESSION['groups'];
    $i = 0;
}
$newRow = true;
if($_SESSION['groupType'] == 1) {
    $inGroup = floor(sizeof($names) / $_SESSION['groups']);
    for($x = 0; $x < $_SESSION['groups']; $x++){
        $groupNum = $x + 1;
        if($newRow) {
            echo('
                <div class="row">
                <div class="col-sm-4 col-sm-offset-1 text-center alert-success">
            ');
        } else {
            echo('
                <div class="col-sm-4 col-sm-offset-2 text-center alert-success">
            ');
        }
        echo('
                <h1 class="groupNumber">Group '.$groupNum.'</h1>
                <ol class="listOrderTop">
            ');
        for ($y = 0; $y < $inGroup; $y++) {
            echo('
                <li class="listOrder">' . $names[$i] . '</li>
            ');
            $i++;
        }
        if ($remain > 0) {
            echo('
                <li class="listOrder">' . $names[$i] . '</li>
            ');
            $i++;
            $remain--;
        }
        if($newRow) {
            $newRow = false;
            echo('
                </ol>
                </div>
            ');
        } else {
            $newRow = true;
            if($groupNum != $_SESSION['groups']){
                echo('
                </ol>
                </div></div>
                <div class="col-sm-12 text-center">
                </div>
            ');
            }

        }
    }
} else if($_SESSION['groupType'] == 2) {
    $groups = floor(sizeof($names) / $_SESSION['groups']);
    for ($x = 0; $x < $groups; $x++) {
        $groupNum = $x + 1;

        if($newRow) {
            echo('
                <div class="row">
                <div class="col-sm-4 col-sm-offset-1 text-center alert-success">
            ');
        } else {
            echo('
                <div class="col-sm-4 col-sm-offset-2 text-center alert-success">
            ');
        }

        echo('
                <h1 class="groupNumber">Group '.$groupNum.'</h1>
                <ol class="listOrderTop">
            ');
        for ($y = 0; $y < $_SESSION['groups']; $y++) {
            echo('
                <li class="listOrder">' . $names[$i] . '</li>
            ');
            $i++;
        }
        if($newRow) {
            $newRow = false;
            echo('
                </ol>
                </div>
            ');
        } else {
            $newRow = true;
            if(($groupNum != $groups) || ($remain > 0)){
                echo('
                </ol>
                </div></div>
                <div class="col-sm-12 text-center">
                </div>
                ');
            }
        }
    }
    if ($remain > 0) {
        if(!$newRow){
            echo('
                <div class="col-sm-4 col-sm-offset-1 text-center alert-success">
            ');
        }else{
            echo('
                <div class="row">
                <div class="col-sm-4 col-sm-offset-4 text-center alert-success">
            ');
        }

        echo('
             <h1 class="groupNumber">Extras</h1><h3></h3>
             <ol class="listOrderTop">
            ');
        for ($x = 0; $x < $remain; $x++) {
            echo('
                <li class="listOrder">' . $names[$i] . '</li>
            ');
            $i++;
        }
    }
    echo ('
        </ol>
    ');
}
echo('</div>
    <div class="row ">
        <div class="col-sm-12 text-left col-sm-offset-1 listOrderTop">
            <a href="#randomGroupsModal" class="btn btn-primary" data-toggle="modal">
                <span aria-hidden="true"  title="Choose Groups"></span><span>Pick Again</span>
            </a>
        </div>
    </div></div>');


$OUTPUT->footerStart();
?>
    <script src="scripts/randomly.js" type="text/javascript"></script>
<?php
if($_SESSION['groupType'] == 0 ){
    ?>
    <script type="text/javascript">
       $(document).ready(function () {
            $("#randomGroupsModal").modal("show");
        });
    </script>
    <?php
}
$_SESSION['groups'] = 0;
$_SESSION['groupType'] = 0;
?>
    <!-- Our main javascript file for tool functions -->
<?php
$OUTPUT->footerEnd();
