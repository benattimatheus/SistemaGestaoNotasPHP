<?php 
require_once __DIR__ . '/Aluno.php';
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Notas.php';
require_once __DIR__ . '/AlunoModel.php';
require_once __DIR__ . '/NotaModel.php';
// require_once __DIR__ . '/app.php';
require_once __DIR__ . '/Select.php';

$select = New Select();
$RA = filter_input(INPUT_POST, 'RA');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');

$prova1 = filter_input(INPUT_POST, 'Prova1');
$aep1 = filter_input(INPUT_POST, 'AEP1');
$provaIntegrada1 = filter_input(INPUT_POST, 'ProvaIntegrada1');
$prova2 = filter_input(INPUT_POST, 'Prova2');
$aep2 = filter_input(INPUT_POST, 'AEP2');
$provaIntegrada2 = filter_input(INPUT_POST, 'ProvaIntegrada2');

$aluno = new Aluno( ra: $RA, 
                    nome: $nome, 
                    email: $email);

$notas = new Notas($aluno, $prova1,
$aep1,
$provaIntegrada1,
$prova2,
$aep2,
$provaIntegrada2,
$situacao = ''
);

$media1 = $notas->calcularMediaBim1();
$media2 = $notas->calcularMediaBim2();
$mediaF = $notas->calcularMediaFinal();
$situacao = $notas->getSituacao();

$select->updateAlunoRA($RA, $nome, $email);
$select->updateNotaAluno($RA, $prova1, $aep1, $provaIntegrada1, $prova2, $aep1, $provaIntegrada2, $media1, $media2, $mediaF, $situacao);

header("Location: template.php");