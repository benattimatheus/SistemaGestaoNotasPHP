<?php

require_once __DIR__ . '/Aluno.php';
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Notas.php';
require_once __DIR__ . '/AlunoModel.php';
require_once __DIR__ . '/NotaModel.php';

$aluno = new Aluno( ra: $_POST['ra'], 
                    nome: $_POST['nome'], 
                    email: $_POST['email']);

$notas = new Notas( $aluno, $prova1 = isset($_POST['Prova1']) ? (float)($_POST['Prova1'] ?? 0.0) : 0.0,
$aep1 = isset($_POST['AEP1']) ? (float)($_POST['AEP1'] ?? 0.0) : 0.0,
$provaIntegrada1 = isset($_POST['ProvaIntegrada1']) ? (float)($_POST['ProvaIntegrada1'] ?? 0.0) : 0.0,
$prova2 = isset($_POST['Prova2']) ? (float)($_POST['Prova2'] ?? 0.0) : 0.0,
$aep2 = isset($_POST['AEP2']) ? (float)($_POST['AEP2'] ?? 0.0) : 0.0,
$provaIntegrada2 = isset($_POST['ProvaIntegrada2']) ? (float)($_POST['ProvaIntegrada2'] ?? 0.0) : 0.0,
$situacao = ''
);

$notas->calcularMediaBim1();
$notas->calcularMediaBim2();
$notas->calcularMediaFinal();
$notas->getSituacao();

$alunoModelo = new AlunoModel($aluno);
$alunoModelo->save();

$notaModelo = new NotaModel($notas);
$notaModelo->save();

header("Location: template.php");