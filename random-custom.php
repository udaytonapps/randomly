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

$textAreaContents = "";
$hasPreviousData=false;
if(isset($_SESSION['$textareaText'])){
    if(sizeof($_SESSION['$textareaText'])>0){
        $textAreaContents = $_SESSION['$textareaText'];
        $num = rand (0,sizeof($textAreaContents) - 1);
        $name = $textAreaContents[$num];
        $hasPreviousData=true;
    }
    unset($_SESSION['$textareaText']);
}

echo('<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 text-left col-sm-offset-1">
            <h2 class = "groupNumber">Random Picker</h2>
        </div>
    </div>
    <form method="post"  action="actions/getRandomCustom.php">
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-left">
                    <p>Enter all items (names, numbers...) in the field below, each on a separate line:</p>
                    <textarea class="form-control" name="RandomCustomText" id="randomCustomText" rows="8">');
                    if($hasPreviousData) {
                        for ($i = 0; $i < sizeof($textAreaContents); $i++) {
                            echo(ltrim($textAreaContents[$i]));
                            echo("\n");
                        }
                    }
                    echo('</textarea>
                </div>
                <div class="col-sm-2 col-sm-offset-2 text-left submit">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </div>
    </form>
    ');
    if(isset($name)) {
        echo('
        <div class="row ">
            <div class="col-sm-12 text-center">
                <h4 class="groupNumber">Result</h4>
            </div>
            <div class="col-sm-4 col-sm-offset-4 text-center alert-success">
                <h1 class="nameTheme">' . $name . '</h1>
            </div>
        </div>');
    }
echo ('</div>');

$OUTPUT->footerStart();
?>
    <!-- Our main javascript file for tool functions -->
    <script src="scripts/randomly.js" type="text/javascript"></script>
<?php
$OUTPUT->footerEnd();
