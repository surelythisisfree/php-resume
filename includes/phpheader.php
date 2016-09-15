<?php
//Autoload classes
function __autoload($class_name) {
    include 'classes/' . $class_name . '.php';
}

//Load database connection
require_once("Connections/db.php");

//Load resume content
$resume = resumeItems::getResume();

//load a list of resume sections and their settings
$sectionInfo = resumeItems::getSectionInfo($resume);
?>