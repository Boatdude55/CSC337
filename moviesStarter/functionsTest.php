<?php
// This file is a unit test for the functions you discover
// you will need. Partitioning the system into functions will
// make it much easier to echo the correct HTML code back to the browser
include 'functions.php';

$assets = getDir( 'princessbride' );
echo "Files: "; print_r($assets); echo "<br><br>";

$info = setInfo( 'princessbride' , $assets["info"] );
echo "Info: "; print_r($info); echo "<br><br>";

$overview = setOverview( 'princessbride' , $assets["overview"] );
echo "Overview: "; print_r($overview); echo "<br><br>";

$reviews = setReviews( 'princessbride' , $assets["reviews"] );
echo "Reviews: "; print_r($reviews); echo "<br><br>";

$arrayLength = count($reviews);
$midElem = $arrayLength%2 == 0 ? $arrayLength/2 : intval($arrayLength/2);
echo "length: {$arrayLength} and mid: {$midElem}";
?>