<?php
require_once __DIR__ . '/Select.php';

$select = new Select();
$RA = filter_input(INPUT_GET, 'ra');

if($RA){
    $select->deleteNotaRa($RA);
    $select->deleteAlunoRa($RA);
    header("Location: template.php");
    exit(); 
} else {
    echo "RA não fornecido.";
}

