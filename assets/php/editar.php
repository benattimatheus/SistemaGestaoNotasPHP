<?php 
require_once __DIR__ . '/Aluno.php';
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Notas.php';
require_once __DIR__ . '/AlunoModel.php';
require_once __DIR__ . '/NotaModel.php';
// require_once __DIR__ . '/app.php';
require_once __DIR__ . '/Select.php';

$select = New Select();
$RA = filter_input(INPUT_GET, 'ra');

$aluno = [];

if($RA){
    $aluno = $select->getTudoAlunoRA($RA);
} else {
    echo "RA não fornecido.";
}
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
        <!-- <div class="cabecalho">
            <h1> Gestão De Notas</h1>
        </div> -->
        <div id="backgroundHavard"></div>
        <!-- popup para edição da tabela -->
        <div id="dialogPopupEditarNotas">
            <div id="popupTabela2" class="popupTabela2">
                <div class="Cadastro">
                    <h1>Edição Da Tabela</h1>
                </div>
                
                <div class="formulario" id="idFormulario">
                <form action="/assets/php/editar_action.php" method="POST">
                        <div class="placeholder">
                            <input type="text" id="input_nome" name="nome" value="<?=$aluno['Nome'];?>"/>
                            <span for="nome">Nome:</span>
                        </div>
                        <div class="placeholder">
                            <input type="number" id="input_ra" name="RA" value="<?=$aluno['RA'];?>"/>
                            <span for="input_ra">RA:</span>
                        </div>
                        <div class="placeholder">
                            <input type="email" id="input_email" name="email" value="<?=$aluno['Email'];?>"/>
                            <span for="input_email">Email:</span>
                        </div>
                        <div class="notasBimestreEditar">
                            <div class="divNotasEditar">
                                <div>
                                    <span class="spanNotasEditar" for="nome">Prova 1:</span>
                                    <input class="NotasEditar" type="number" id="input_prova_1" name="Prova1"
                                        max="10.0" min="0" step="0.1" value="<?=$aluno['Prova1'];?>"/>
                                </div>
                                <div>
                                    <span class="spanNotasEditar" for="input_ra">AEP 1:</span>
                                    <input class="NotasEditar" type="number" id="input_aep_1" name="AEP1" max="10.0"
                                        min="0" step="0.1" value="<?=$aluno['AEP1'];?>"/>
                                </div>
                                <div>
                                    <span class="spanNotasEditar" for="input_email">Prova Integrada 1 :</span>
                                    <input class="NotasEditar" type="number" id="input_prova_integrada_1"
                                        name="ProvaIntegrada1" max="10.0" min="0" step="0.1" value="<?=$aluno['ProvaIntegrada1'];?>"/>
                                </div>
                            </div>
                            <div class="divNotasEditar">
                                <div>
                                    <span class="spanNotasEditar" for="nome">Prova 2:</span>
                                    <input class="NotasEditar" type="number" id="input_prova_2" name="Prova2"
                                        max="10.0" min="0" step="0.1" value="<?=$aluno['Prova2'];?>"/>
                                </div>
                                <div>
                                    <span class="spanNotasEditar" for="input_ra">AEP 2:</span>
                                    <input class="NotasEditar" type="number" id="input_aep_2" name="AEP2" max="10.0"
                                        min="0" step="0.1" value="<?=$aluno['AEP2'];?>"/>
                                </div>
                                <div>
                                    <span class="spanNotasEditar" for="input_email">Prova Integrada 2:</span>
                                    <input class="NotasEditar" type="number" id="input_prova_integrada_2"
                                        name="ProvaIntegrada2" max="10.0" min="0" step="0.1" value="<?=$aluno['ProvaIntegrada2'];?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="rodape">
                            <div>
                                <button class="botao" type="submit" id="salvarEditar">Salvar</button>
                            </div>

                        </div>
                    </form>
                </div>
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

