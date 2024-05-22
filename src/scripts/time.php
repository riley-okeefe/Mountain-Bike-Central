<?php
session_start();
$date = date("l, F jS");
$time = date('g:ia');
echo "It's $date.<br> The time is $time.";
?>