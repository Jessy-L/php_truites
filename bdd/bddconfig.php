<?php

$bddserver = "localhost";
$bddname = "bddtruites";
$bddlogin = "bts";
$bddpass = "snir";

$objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8",$bddlogin, $bddpass);
