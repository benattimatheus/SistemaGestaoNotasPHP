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
$situacao = 'Reprovado'
);


$notas->calcularMediaFinal();
$notas->calcularMediaBim1();
$notas->calcularMediaBim2();

// Definir situação do aluno
$notas->getSituacao();

// Salvar aluno no banco de dados
$alunoModelo = new AlunoModel($aluno);
$alunoModelo->save();

// Salvar notas e situação no banco de dados
$notaModelo = new NotaModel($notas);
$notaModelo->save();
// salvar um aluno no bd

$lista = [];
$listaF = $alunoModelo->getTudoAlunos();

$template = file_get_contents(__DIR__ . '/template.html');

function gerarLinhaAluno($aluno) {
    return '
    <tr>
        <td>' . htmlspecialchars($aluno['Nome'] ?? '-') . '</td>
        <td>' . htmlspecialchars($aluno['RA'] ?? '-') . '</td>
        <td>' . htmlspecialchars($aluno['Email'] ?? '-') . '</td>
        <td>' . htmlspecialchars($aluno['Prova1'] ?? '-') . '</td>
        <td>' . htmlspecialchars($aluno['AEP1'] ?? '-') . '</td>
        <td>' . htmlspecialchars($aluno['ProvaIntegrada1'] ?? '-') . '</td>
        <td>' . htmlspecialchars($aluno['Media1B'] ?? '-') . '</td>
        <td>' . htmlspecialchars($aluno['Prova2'] ?? '-') . '</td>
        <td>' . htmlspecialchars($aluno['AEP2'] ?? '-') . '</td>
        <td>' . htmlspecialchars($aluno['ProvaIntegrada2'] ?? '-') . '</td>
        <td>' . htmlspecialchars($aluno['Media2B'] ?? '-') . '</td>
        <td>' . htmlspecialchars($aluno['MediaFinal'] ?? '-') . '</td>
        <td>' . htmlspecialchars($aluno['Situacao'] ?? '-') . '</td>
        <td class="actions">
            <button class="add" onclick="editarNotas(this)">Adicionar Notas</button>
            <button class="update" onclick="editarDados(this)">Editar</button>
            <button class="delete" onclick="excluirLinha(\'' . htmlspecialchars($aluno['RA'] ?? '-') . '\')">Excluir</button>
        </td>
    </tr>';
}

// Gerar todas as linhas dos alunos
$rows = '';
foreach ($listaF as $aluno) {
    $rows .= gerarLinhaAluno($aluno);
}

$template = str_replace(
    [
        '{{LINHAS}}'
    ],
    [
        $rows
    ],
    $template);
// Substituir o placeholder {{ROWS}} no template


echo $template;