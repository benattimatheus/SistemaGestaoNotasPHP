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
        $stmt = Database::getConn()->prepare('INSERT INTO Notas ( RA, Prova1, AEP1, ProvaIntegrada1, MediaBim1, 
        Prova2, AEP2, ProvaIntegrada2, MediaBim2, MediaFinal, Situacao) 
        VALUES (:RA ,:Prova1, :AEP1, :ProvaIntegrada1, :MediaBim1, :Prova2, :AEP2, :ProvaIntegrada2, :MediaBim2, :MediaFinal, :Situacao);');
        
        $ra = $this->notas->getRA();
        $prova1 = $this->notas->getNotaProva1();
        $aep1 = $this->notas->getNotaAEP1();
        $provaIntegrada1 = $this->notas->getNotaProvaIntegrada1();
        $mediaBim1 = $this->notas->getMediaBim1();
        $prova2 = $this->notas->getNotaProva2();
        $aep2 = $this->notas->getNotaAEP2();
        $provaIntegrada2 = $this->notas->getNotaProvaIntegrada2();
        $mediaBim2 = $this->notas->getMediaBim2();
        $mediaFinal = $this->notas->getMediaFinal();
        $situacao = $this->notas->getSituacao();

        $stmt->bindParam(':RA', $ra);
        $stmt->bindParam(':Prova1', $prova1);
        $stmt->bindParam(':AEP1', $aep1);
        $stmt->bindParam(':ProvaIntegrada1', $provaIntegrada1);
        $stmt->bindParam(':MediaBim1', $mediaBim1);
        $stmt->bindParam(':Prova2', $prova2);
        $stmt->bindParam(':AEP2', $aep2);
        $stmt->bindParam(':ProvaIntegrada2', $provaIntegrada2);
        $stmt->bindParam(':MediaBim2', $mediaBim2);
        $stmt->bindParam(':MediaFinal', $mediaFinal);
        $stmt->bindParam(':Situacao', $situacao);

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
        $stmt = Database::getConn()->prepare('SELECT ROUND(AVG(Prova1), 2) AS media1 FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media1'];
    }

    public static function getMediaAEP1Total()
    {
        $stmt = Database::getConn()->prepare('SELECT ROUND(AVG(AEP1), 2) AS media2 FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media2'];
    }

    public static function getMediaProvaIntegrada1Total()
    {
        $stmt = Database::getConn()->prepare('SELECT ROUND(AVG(ProvaIntegrada1), 2) AS media3 FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media3'];
    }

    public static function getMediaBim1Total()
    {
        $stmt = Database::getConn()->prepare('SELECT ROUND(AVG(MediaBim1), 2) AS media4 FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media4'];
    }

    public static function getMediaProva2Total()
    {
        $stmt = Database::getConn()->prepare('SELECT ROUND(AVG(Prova2), 2) AS media5 FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media5'];
    }

    public static function getMediaAEP2Total()
    {
        $stmt = Database::getConn()->prepare('SELECT ROUND(AVG(AEP2), 2) AS media6 FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media6'];
    }

    public static function getMediaProvaIntegrada2Total()
    {
        $stmt = Database::getConn()->prepare('SELECT ROUND(AVG(ProvaIntegrada2), 2) AS media7 FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media7'];
    }

    public static function getMediaBim2Total()
    {
        $stmt = Database::getConn()->prepare('SELECT ROUND(AVG(MediaBim2), 2) AS media8 FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media8'];
    }

    public static function getMediaFinalTotal()
    {
        $stmt = Database::getConn()->prepare('SELECT ROUND(AVG(MediaFinal), 2) AS media9 FROM Notas');
        $stmt->execute();
        return $stmt->fetch()['media9'];
    }
}
