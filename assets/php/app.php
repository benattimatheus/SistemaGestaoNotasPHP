<?php

require_once __DIR__ . '/Aluno.php';
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Notas.php';
require_once __DIR__ . '/AlunoModel.php';
require_once __DIR__ . '/NotaModel.php';

$aluno = new Aluno( ra: $_POST['ra'], 
                        nome: $_POST['nome'], 
                        email: $_POST['email']);

$notas = new Notas( $prova1 = isset($_POST['Prova1']) ? (float)($_POST['Prova1'] ?? 0.0) : 0.0,
$aep1 = isset($_POST['AEP1']) ? (float)($_POST['AEP1'] ?? 0.0) : 0.0,
$provaIntegrada1 = isset($_POST['ProvaIntegrada1']) ? (float)($_POST['ProvaIntegrada1'] ?? 0.0) : 0.0,
$prova2 = isset($_POST['Prova2']) ? (float)($_POST['Prova2'] ?? 0.0) : 0.0,
$aep2 = isset($_POST['AEP2']) ? (float)($_POST['AEP2'] ?? 0.0) : 0.0,
$provaIntegrada2 = isset($_POST['ProvaIntegrada2']) ? (float)($_POST['ProvaIntegrada2'] ?? 0.0) : 0.0,
);

$template = file_get_contents(__DIR__ . '\template\tabela.html');

$notas->calcularMediaFinal();
$notas->calcularMediaBim1();
$notas->calcularMediaBim2();

// Definir situação do aluno
$notas->definirSituacao();

// Salvar aluno no banco de dados
$alunoModelo = new AlunoModel($aluno);
$alunoModelo->save();

// Salvar notas e situação no banco de dados
$notaModelo = new NotaModel($notas);
$notaModelo->save();
// salvar um aluno no bd

echo $template;
