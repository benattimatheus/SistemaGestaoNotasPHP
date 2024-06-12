<?php
require_once __DIR__ . '/Select.php';

$select = new Select();

$lista = [];
$listaF = $select->getTudoAlunos();

$listaNotas = [];
$medias = $select->getMediasTotais();

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="/assets/css/imageico.ico" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Gestão de Notas</title>
</head>
<body>
    <div class="site">
        <div class="cabecalho">
            <h1> Gestão De Notas</h1>
        </div>
        <div id="backgroundHavard"></div>
        <dialog id="dialogPopup">
            <div id="popup" class="popup">
                <div class="Cadastro">
                    <h1>Cadastro de Aluno e Notas</h1>
                </div>
                <div class="formulario" id="idFormulario">
                    <form action="/assets/php/app.php" method="POST" onsubmit="return ValidarDados()">
                        <div class="placeholder">
                            <input type="text" id="input_nome" name="nome" required>
                            <span for="nome">Nome:</span>
                        </div>
                        <div class="placeholder">
                            <input type="number" id="input_ra" name="ra" required>
                            <span for="input_ra">RA:</span>
                        </div>
                        <div class="placeholder">
                            <input type="email" id="input_email" name="email" required>
                            <span for="input_email">Email:</span>
                        </div>
                        <div class="notasBimestre">
                            <div>
                                <div>
                                    <span class="spanNotas" for="nome">Prova 1:</span>
                                    <input class="Notas" type="number" id="input_prova_1" name="Prova1" max="10.0"
                                        min="0" step="0.1" disabled>
                                </div>
                                <div>
                                    <span class="spanNotas" for="input_ra">AEP 1:</span>
                                    <input class="Notas" type="number" id="input_aep_1" name="AEP1" max="10.0" min="0"
                                        step="0.1" disabled>
                                </div>
                                <div>
                                    <span class="spanNotas" for="input_email">Prova Integrada 1 :</span>
                                    <input class="Notas" type="number" id="input_prova_integrada_1"
                                        name="ProvaIntegrada1" max="10.0" min="0" step="0.1" disabled>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <span class="spanNotas" for="nome">Prova 2:</span>
                                    <input class="Notas" type="number" id="input_prova_2" name="Prova2" max="10.0"
                                        min="0" step="0.1" disabled>
                                </div>
                                <div>
                                    <span class="spanNotas" for="input_ra">AEP 2:</span>
                                    <input class="Notas" type="number" id="input_aep_2" name="AEP2" max="10.0" min="0"
                                        step="0.1" disabled>
                                </div>
                                <div>
                                    <span class="spanNotas" for="input_email">Prova Integrada 2:</span>
                                    <input class="Notas" type="number" id="input_prova_integrada_2"
                                        name="ProvaIntegrada2" max="10.0" min="0" step="0.1" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="switchBimestre">
                            <label for="switchBimestre" id="primeiroBimestre" class="bimestreLabel" checked>Primeiro
                                Bimestre</label>
                            <label class="switch">
                                <input type="checkbox" id="switchBimestre" class="switch" onchange="alternarBimestre()">
                                <span class="slider round"></span>
                            </label>
                            <label for="switchBimestre" id="segundoBimestre" class="bimestreLabel">Segundo
                                Bimestre</label>
                        </div>
                        <div class="rodape">
                            <div>
                                <button class="botao" type="submit" id="salvarNotas">Adicionar</button>
                            </div>
                            <div>
                                <button class="botao" type="button" id="cancelarPopup" onclick="FecharPopup()">Cancelar</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>
        <!-- popup para edição da tabela -->
        <dialog id="dialogPopupEditarNotas">
            <div id="popupTabela" class="popupTabela">
                <div class="Cadastro">
                    <h1>Edição Da Tabela</h1>
                </div>
                <div class="formulario" id="idFormulario">
                    <form>
                        <div class="placeholder">
                            <input type="text" id="input_nome" name="nome">
                            <span for="nome">Nome:</span>
                        </div>
                        <div class="placeholder">
                            <input type="number" id="input_ra" name="ra">
                            <span for="input_ra">RA:</span>
                        </div>
                        <div class="placeholder">
                            <input type="email" id="input_email" name="email">
                            <span for="input_email">Email:</span>
                        </div>
                        <div class="notasBimestreEditar">
                            <div class="divNotasEditar">
                                <div>
                                    <span class="spanNotasEditar" for="nome">Prova 1:</span>
                                    <input class="NotasEditar" type="number" id="input_prova_1" name="Prova 1 "
                                        max="10.0" min="0" step="0.1">
                                </div>
                                <div>
                                    <span class="spanNotasEditar" for="input_ra">AEP 1:</span>
                                    <input class="NotasEditar" type="number" id="input_aep_1" name="AEP" max="10.0"
                                        min="0" step="0.1">
                                </div>
                                <div>
                                    <span class="spanNotasEditar" for="input_email">Prova Integrada 1 :</span>
                                    <input class="NotasEditar" type="number" id="input_prova_integrada_1"
                                        name="Prova Integrada 1" max="10.0" min="0" step="0.1">
                                </div>
                            </div>
                            <div class="divNotasEditar">
                                <div>
                                    <span class="spanNotasEditar" for="nome">Prova 2:</span>
                                    <input class="NotasEditar" type="number" id="input_prova_2" name="Prova 2 "
                                        max="10.0" min="0" step="0.1">
                                </div>
                                <div>
                                    <span class="spanNotasEditar" for="input_ra">AEP 2:</span>
                                    <input class="NotasEditar" type="number" id="input_aep_2" name="AEP" max="10.0"
                                        min="0" step="0.1">
                                </div>
                                <div>
                                    <span class="spanNotasEditar" for="input_email">Prova Integrada 2:</span>
                                    <input class="NotasEditar" type="number" id="input_prova_integrada_2"
                                        name="Prova Integrada 2" max="10.0" min="0" step="0.1">
                                </div>
                            </div>
                        </div>
                        <div class="rodape">
                            <div>
                                <button class="botao" type="button" id="salvarEditar">Salvar</button>
                            </div>
                            <div>
                                <button class="botao" id="cancelar">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>
        <div class="botoesControle">
            <button id="openPopup" class="botaoSite">Adicionar aluno</button>
            <!-- <button id="openPopupTeste" class="botaoSite">popup editar notas</button> -->
            <!-- para aparecer esse botão quando começar a editar a tabela -->
        </div>
        <div class="fora-wrapper">
            <div class="tabela-wrapper">
                <table id="idTabela" class="tabela">
                    <thead>
                        <tr id="idCabecalhoTabela" class="cabecalho-tabela">
                            <th>
                                <h1>Nome</h1>
                            </th>
                            <th>
                                <h1>RA</h1>
                            </th>
                            <th>
                                <h1>Email</h1>
                            </th>
                            <th>
                                <h1>Prova 1</h1>
                            </th>
                            <th>
                                <h1>AEP 1</h1>
                            </th>
                            <th>
                                <h1>Prova Integrada1</h1>
                            </th>
                            <th>
                                <h1>Média 1º Bimestre</h1>
                            </th>
                            <th>
                                <h1>Prova 2</h1>
                            </th>
                            <th>
                                <h1>AEP 2</h1>
                            </th>
                            <th>
                                <h1>Prova Integrada2</h1>
                            </th>
                            <th>
                                <h1>Média 2º Bimestre</h1>
                            </th>
                            <th>
                                <h1>Média Final</h1>
                            </th>
                            <th>
                                <h1>Situação</h1>
                            </th>
                            <th>
                                <h1 class="acoes">Ações</h1>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listaF as $aluno): ?>
                    <tr>
        <td><?=$aluno['Nome'];?></td>
        <td><?=$aluno['RA'];?></td>
        <td><?=$aluno['Email'];?></td>
        <td><?=$aluno['Prova1'];?></td>
        <td><?=$aluno['AEP1'];?></td>
        <td><?=$aluno['ProvaIntegrada1'];?></td>
        <td><?=$aluno['MediaBim1'];?></td>
        <td><?=$aluno['Prova2'];?></td>
        <td><?=$aluno['AEP2'];?></td>
        <td><?=$aluno['ProvaIntegrada2'];?></td>
        <td><?=$aluno['MediaBim2'];?></td>
        <td><?=$aluno['MediaFinal'];?></td>
        <td><?=$aluno['Situacao'];?></td>
        <td>
            <button class="update"><a href="editar.php?ra=<?=$aluno['RA']; ?>">Editar</a></button>
                        <button class="delete"><a href="excluir.php?ra=<?=$aluno['RA'];?>">Excluir</a></button>
            
        </td>
    </tr>
                            <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr id="idMediasTabela">
                            <th>
                                <h1></h1>
                            </th>
                            <th>
                                <h1></h1>
                            </th>
                            <th>MEDIAS</th>
                            <th id="mediaProva1"><?= $medias['media1']; ?></th>
        <th id="mediaAEP1"><?= $medias['media2']; ?></th>
        <th id="mediaProvaIntegrada1"><?= $medias['media3']; ?></th>
        <th id="media1Bi"><?= $medias['media4']; ?></th>
        <th id="mediaProva2"><?= $medias['media5']; ?></th>
        <th id="mediaAEP2"><?= $medias['media6']; ?></th>
        <th id="mediaProvaIntegrada2"><?= $medias['media7']; ?></th>
        <th id="media2Bi"><?= $medias['media8']; ?></th>
        <th id="mediaGeral"><?= $medias['media9']; ?></th>
                            <th>
                                <h1></h1>
                            </th>
                            <th>
                                <h1></h1>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <script src="/assets/js/app.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                alternarBimestre();
            });
        </script>
</body>
</html>
