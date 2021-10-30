<?php
require 'projet1+2.php';
use P\test;
//$p = new P\test\Patron('jack',20,"VW");

$B1=new P\test\Banque("samir");
$B1->SPresenter();
$B1->debiter(200);
$B1->crediter(100);




?>