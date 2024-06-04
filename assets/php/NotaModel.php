<?php

class NotaModel
{
    private Notas $notas;

    public function __construct(Notas $notas)
    {
        $this->notas = $notas;
    }

    public function save()
    {        
        $stmt = Database::getConn()->prepare('INSERT INTO Notas (Prova1, AEP1, ProvaIntegrada1, MediaBim1, 
        Prova2, AEP2, ProvaIntegrada2, MediaBim2, MediaFinal) 
        VALUES (:Prova1, :AEP1, :ProvaIntegrada1, :MediaBim1, :Prova2, :AEP2, :ProvaIntegrada2, :MediaBim2, :MediaFinal);');
        
        $stmt->bindParam('Prova1', $this->notas->getRA());
        $stmt->bindParam('nome', $this->aluno->getNome());
        $stmt->bindParam('email', $this->aluno->getEmail());
        
        return $stmt->execute();
    }

    public static function getNotasByRA(int $ra)
    {        
        $stmt = Database::getConn()->prepare('SELECT * FROM Notas WHERE ra = :ra');
        $stmt->bindParam('ra', $ra);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getMediaProva1Total(){
        $stmt = Database::getConn()->prepare('SELECT AVG(Prova1) FROM Notas');
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getMediaAEP1Total(){
        $stmt = Database::getConn()->prepare('SELECT AVG(AEP1) FROM Notas');
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getMediaProvaIntegrada1Total(){
        $stmt = Database::getConn()->prepare('SELECT AVG(ProvaIntegrada1) FROM Notas');
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getMediaBim1Total(){
        $stmt = Database::getConn()->prepare('SELECT AVG(MediaBim1) FROM Notas');
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getMediaProva2Total(){
        $stmt = Database::getConn()->prepare('SELECT AVG(Prova2) FROM Notas');
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getMediaAEP2Total(){
        $stmt = Database::getConn()->prepare('SELECT AVG(AEP2) FROM Notas');
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getMediaProvaIntegrada2Total(){
        $stmt = Database::getConn()->prepare('SELECT AVG(ProvaIntegrada2) FROM Notas');
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getMediaBim2Total(){
        $stmt = Database::getConn()->prepare('SELECT AVG(MediaBim2) FROM Notas');
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getMediaFinalTotal(){
        $stmt = Database::getConn()->prepare('SELECT AVG(MediaFinal) FROM Notas');
        $stmt->execute();
        return $stmt->fetch();
    }
}