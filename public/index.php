<?php

require '../app/manager/QcmManager.php';

$qcmM = new QcmManager();
$qcmM =$qcmM->getAll();
var_dump($qcmM);