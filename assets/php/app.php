<?php

require_once __DIR__ . '/Aluno.php';
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Notas.php';
require_once __DIR__ . '/AlunoModel.php';

$aluno = new Aluno( ra: $_POST['ra'], 
                        nome: $_POST['nome'], 
                        email: $_POST['email']);

// salvar um aluno no bd
$alunoModelo = new AlunoModel($aluno);
$alunoModelo->save();

// $aluno['ra'] = 1;
// $aluno['nome'] = 'Matheus';
// $aluno['email'] = 'email@email.com';
// $aluno['prova1'] = 8.0;
// $aluno['aep1'] = 1.0;
// $aluno['prova_integrada1'] = 1.0;
// $aluno['prova2'] = 4.0;
// $aluno['aep2'] = 0.5;
// $aluno['prova_integrada2'] = 0.5;
// $aluno['media1'] = 0.0;
// $aluno['media2'] = 0.0;
// $aluno['mediaFinal'] = 0.0;
// $aluno['situacao'] = '';

function calcularMedia1($aluno){
    $prova1 = $aluno['prova1'];
    $aep1 = $aluno['aep1'];
    $prova_integrada1 = $aluno['prova_integrada1'];
    $media = $prova1 + $aep1 + $prova_integrada1;
    return $media;
}
$aluno['media1'] = calcularMedia1($aluno);

function calcularMedia2($aluno){
  $prova2 = $aluno['prova2'];
  $aep2 = $aluno['aep2'];
  $prova_integrada2 = $aluno['prova_integrada2'];
  $media = $prova2 + $aep2 + $prova_integrada2;
  return $media;
}
$aluno['media2'] = calcularMedia2($aluno);

function calcularMediaFinal($aluno){
  $media1 = $aluno['media1'];
  $media2 = $aluno['media2'];
  $mediaFinal = ($media1 + $media2) / 2;
  return $mediaFinal;
}
$aluno['mediaFinal'] = calcularMediaFinal($aluno);
$mediaFinal = calcularMediaFinal($aluno);

INSERT INTO Notas (media) VALUES ($mediaFinal) where RA = 1;

function definirSituacao($aluno){
  $situacao = '';
  $media = $aluno['mediaFinal'];
  if($media >= 6.0){
    $situacao = 'Aprovado';
  }else if($media <= 3.0){
    $situacao = 'Reprovado';
  }else{
    $situacao = 'Recuperacao';
  }
  return $situacao;
}
$aluno['situacao'] = definirSituacao($aluno);

// print_r($aluno);
// print_r(calcularMedia1($aluno));
// print_r(PHP_EOL);
// print_r(calcularMedia2($aluno));
// print_r(PHP_EOL);
// print_r(calcularMediaFinal($aluno));
// print_r(PHP_EOL);
// print_r(definirSituacao($aluno));
