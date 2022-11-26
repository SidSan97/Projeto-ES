<?php
require_once ("filetypes.php");
require_once ("checador.php");

$checagem = new checador();


$test = new txtfile("assignment 1", "paul.txt");
$checagem->checar($test);


