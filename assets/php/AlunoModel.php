<?php

class AlunoModel
{
    private Aluno $aluno;

    public function __construct(Aluno $aluno)
    {
        $this->aluno = $aluno;
    }

    public function save()
    {        
        $stmt = Database::getConn()->prepare('INSERT INTO Alunos (ra, nome, email) VALUES (:ra, :nome, :email);');

        $ra = $this->aluno->getRA();
        $nome = $this->aluno->getNome();
        $email = $this->aluno->getEmail();

        $stmt->bindParam(':ra', $ra);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        
        return $stmt->execute();
    }

    public static function getAlunos(){
        $stmt = Database::getConn()->prepare('SELECT * FROM Alunos');
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getTudoAlunos()
    {
        $stmt = Database::getConn()->prepare('
            SELECT A.ra, A.nome, A.email, N.Prova1, N.aep1, N.provaIntegrada1, N.mediabim1, 
                   N.prova2, N.aep2, N.provaIntegrada2, N.mediabim2, N.mediaFinal, N.situacao
            FROM Alunos A
            LEFT JOIN Notas N ON A.ra = N.ra ORDER BY A.ra
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAlunoByRA(int $ra)
    {        
        $stmt = Database::getConn()->prepare('SELECT * FROM Alunos WHERE ra = :ra');
        $stmt->bindParam('ra', $ra);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getNotaByRA(int $ra)
    {        
        $stmt = Database::getConn()->prepare('SELECT * FROM Notas WHERE ra = :ra');
        $stmt->bindParam('ra', $ra);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getUltimoAluno()
    {        
        $stmt = Database::getConn()->prepare('SELECT * FROM Alunos ORDER BY ra DESC;');
        $stmt->execute();
        return $stmt->fetch();
    }




    public static function processarRequisicaoEditarDados() {
        // Verifica se o método de requisição é POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verifica se o parâmetro 'ra' foi enviado
            if (isset($_POST['ra'])) {
                // Obtém o valor do parâmetro 'ra'
                $ra = $_POST['ra'];
                echo "processar requisição if";

                // Chama a função editarDados da classe AlunoModel
                self::editarDados($ra);
            } else {
                echo "RA não fornecido.";
            }
        }
        echo "processar requisição";
    }

    public static function editarDados($ra){
        $aluno = AlunoModel::getAlunoByRA($ra);
        $notas = AlunoModel::getNotaByRA($ra); 
        echo "editar dados";
        $result = array(); // Array para armazenar os dados
        
        if ($aluno) {
            $result['aluno'] = array(
                'Nome' => htmlspecialchars($aluno['Nome']),
                'RA' => htmlspecialchars($aluno['RA']),
                'Email' => htmlspecialchars($aluno['Email'])
            );
        } else {
            $result['error'] = 'Aluno não encontrado!';
        }
        
        if ($notas) {
            $result['notas'] = array(
                'Prova1' => htmlspecialchars($notas['Prova1']),
                'AEP1' => htmlspecialchars($notas['AEP1']),
                'ProvaIntegrada1' => htmlspecialchars($notas['ProvaIntegrada1']),
                'Prova2' => htmlspecialchars($notas['Prova2']),
                'AEP2' => htmlspecialchars($notas['AEP2']),
                'ProvaIntegrada2' => htmlspecialchars($notas['ProvaIntegrada2'])
            );
        } else {
            $result['error'] = 'Notas não encontradas!';
        }
        echo "aaaaaaaa foi";
        return json_encode($result);
    }
    
    // public static function editarDados($ra){
    //     $aluno = AlunoModel::getAlunoByRA($ra);
    //     $notas = AlunoModel::getNotaByRA($ra); 
    
    //     if ($aluno) {
    //         echo "<script>
    //                 document.addEventListener('DOMContentLoaded', function() {
    //                     document.getElementById('input_nomeEditar').value = '". htmlspecialchars($aluno['Nome']) ."';
    //                     document.getElementById('input_raEditar').value = '". htmlspecialchars($aluno['RA']) ."';
    //                     document.getElementById('input_emailEditar').value = '". htmlspecialchars($aluno['Email']) ."';
    //                 });
    //               </script>";
    //     } else {
    //         echo "<script>alert('Aluno não encontrado!');</script>";
    //     }
    
    //     if ($notas) {
    //         echo "<script>
    //                 document.addEventListener('DOMContentLoaded', function() {
    //                     document.getElementById('input_prova_1Editar').value = '". htmlspecialchars($notas['Prova1']) ."';
    //                     document.getElementById('input_aep_1Editar').value = '". htmlspecialchars($notas['AEP1']) ."';
    //                     document.getElementById('input_prova_integrada_1Editar').value = '". htmlspecialchars($notas['ProvaIntegrada1']) ."';
    //                     document.getElementById('input_prova_2Editar').value = '". htmlspecialchars($notas['Prova2']) ."';
    //                     document.getElementById('input_aep_2Editar').value = '". htmlspecialchars($notas['AEP2']) ."';
    //                     document.getElementById('input_prova_integrada_2Editar').value = '". htmlspecialchars($notas['ProvaIntegrada2']) ."';
    //                 });
    //               </script>";
    //     } else {
    //         echo "<script>alert('Notas não encontradas!');</script>";
    //     }
    
    //     echo "<script>
    //             document.addEventListener('DOMContentLoaded', function() {
    //                 ExibirPopupEditarNotas();
    //             });
    //           </script>";
    // }

}
