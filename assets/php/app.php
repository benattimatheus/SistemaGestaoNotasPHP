<?php

require_once __DIR__ . '/Aluno.php';
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Notas.php';
require_once __DIR__ . '/AlunoModel.php';
require_once __DIR__ . '/NotaModel.php';

$aluno = new Aluno( ra: $_POST['ra'], 
                        nome: $_POST['nome'], 
                        email: $_POST['email']);

$notas = new Notas( notaProva1: $_POST['Prova1'],
                    notaAEP1: $_POST['AEP1'],
                    notaProvaIntegrada1: $_POST['ProvaIntegrada1'],
                    notaProva2: $_POST['Prova2'],
                    notaAEP2: $_POST['AEP2'],
                    notaProvaIntegrada2: $_POST['ProvaIntegrada2']
);

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
$alunoModelo = new AlunoModel($aluno);
$alunoModelo->save();

