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
}