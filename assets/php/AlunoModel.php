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

    public static function getUltimoAluno()
    {        
        $stmt = Database::getConn()->prepare('SELECT * FROM Alunos ORDER BY ra DESC;');
        $stmt->execute();
        return $stmt->fetch();
    }

    
    function editarDados($ra){

    $aluno = $this->getAlunoByRA($ra);

    if ($aluno) {
        echo "<script>
                document.getElementById('input_nome').value = '{$aluno['nome']}';
                document.getElementById('input_ra').value = '{$aluno['RA']}';
                document.getElementById('input_email').value = '{$aluno['email']}';
                document.getElementById('input_prova_1').value = '{$aluno['prova1']}';
                document.getElementById('input_aep_1').value = '{$aluno['AEP1']}';
                document.getElementById('input_prova_integrada_1').value = '{$aluno['prova_integrada1']}';
                document.getElementById('input_prova_2').value = '{$aluno['prova2']}';
                document.getElementById('input_aep_2').value = '{$aluno['AEP2']}';
                document.getElementById('input_prova_integrada_2').value = '{$aluno['prova_integrada2']}';
            </script>";
            echo "<script>ExibirPopupEditarNotas();</script>";
    } else {
        echo "<script>alert('Aluno não encontrado!');</script>";
    }
    }

}
