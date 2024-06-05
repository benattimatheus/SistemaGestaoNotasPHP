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
        
        $stmt->bindParam('ra', $this->aluno->getRA());
        $stmt->bindParam('nome', $this->aluno->getNome());
        $stmt->bindParam('email', $this->aluno->getEmail());
        
        return $stmt->execute();
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