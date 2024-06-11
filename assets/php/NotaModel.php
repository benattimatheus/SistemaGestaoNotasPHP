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
        $stmt = Database::getConn()->prepare('INSERT INTO Notas ( RA, Prova_1, AEP_1, Prova_integrada_1, Media_Bim_1, 
        Prova_2, AEP_2, Prova_integrada_2, Media_Bim_2, Media_Final) 
        VALUES (:RA ,:Prova1, :AEP1, :ProvaIntegrada1, :MediaBim1, :Prova2, :AEP2, :ProvaIntegrada2, :MediaBim2, :MediaFinal);');
        
        $stmt->bindParam(':RA',$this->notas->getRA());
        $stmt->bindParam(':Prova1', $this->notas->getNotaProva1());
        $stmt->bindParam(':AEP1', $this->notas->getNotaAEP1());
        $stmt->bindParam(':ProvaIntegrada1', $this->notas->getNotaProvaIntegrada1());
        $stmt->bindParam(':MediaBim1', $this->notas->getMediaBim1());
        $stmt->bindParam(':Prova2', $this->notas->getNotaProva2());
        $stmt->bindParam(':AEP2', $this->notas->getNotaAEP2());
        $stmt->bindParam(':ProvaIntegrada2', $this->notas->getNotaProvaIntegrada2());
        $stmt->bindParam(':MediaBim2', $this->notas->getMediaBim2());
        $stmt->bindParam(':MediaFinal', $this->notas->getMediaFinal());

        return $stmt->execute();
    }

    public static function getNotasByRA(int $ra)
    {        
        $stmt = Database::getConn()->prepare('SELECT * FROM Notas WHERE ra = :ra');
        $stmt->bindParam(':ra', $ra);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getNotas(){
        $stmt = Database::getConn()->prepare('SELECT * FROM Notas');
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getMediaProva1Total()
    {
        $stmt = Database::getConn()->prepare('SELECT AVG(Prova1) AS media FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media'];
    }

    public static function getMediaAEP1Total()
    {
        $stmt = Database::getConn()->prepare('SELECT AVG(AEP1) AS media FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media'];
    }

    public static function getMediaProvaIntegrada1Total()
    {
        $stmt = Database::getConn()->prepare('SELECT AVG(ProvaIntegrada1) AS media FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media'];
    }

    public static function getMediaBim1Total()
    {
        $stmt = Database::getConn()->prepare('SELECT AVG(MediaBim1) AS media FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media'];
    }

    public static function getMediaProva2Total()
    {
        $stmt = Database::getConn()->prepare('SELECT AVG(Prova2) AS media FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media'];
    }

    public static function getMediaAEP2Total()
    {
        $stmt = Database::getConn()->prepare('SELECT AVG(AEP2) AS media FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media'];
    }

    public static function getMediaProvaIntegrada2Total()
    {
        $stmt = Database::getConn()->prepare('SELECT AVG(ProvaIntegrada2) AS media FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media'];
    }

    public static function getMediaBim2Total()
    {
        $stmt = Database::getConn()->prepare('SELECT AVG(MediaBim2) AS media FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media'];
    }

    public static function getMediaFinalTotal()
    {
        $stmt = Database::getConn()->prepare('SELECT AVG(MediaFinal) AS media FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media'];
    }
}
