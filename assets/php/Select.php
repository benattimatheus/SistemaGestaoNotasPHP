<?php
require_once __DIR__ . '/Database.php';
class Select
{
    
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

    public static function getTudoAlunoRA($ra)
{
    $stmt = Database::getConn()->prepare('
        SELECT A.ra, A.nome, A.email, N.Prova1, N.aep1, N.provaIntegrada1, N.mediabim1, 
               N.prova2, N.aep2, N.provaIntegrada2, N.mediabim2, N.mediaFinal, N.situacao
        FROM Alunos A
        LEFT JOIN Notas N ON A.ra = N.ra
        WHERE A.ra = :ra
        ORDER BY A.ra
    ');
    $stmt->bindParam(':ra', $ra, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public static function updateAlunoRA($ra, $nome, $email)
{
    $stmt = Database::getConn()->prepare('
        UPDATE Alunos
        SET nome = :nome, email = :email
        WHERE ra = :ra
    ');
    $stmt->bindParam(':ra', $ra, PDO::PARAM_STR);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
}

public static function updateNotaAluno($ra, $prova1, $aep1, $provaIntegrada1, $prova2, $aep2, $provaIntegrada2, $mediab1, $mediab2, $mediaF, $situacao)
{
    $stmt = Database::getConn()->prepare('
        UPDATE Notas
        SET Prova1 = :prova1, 
            AEP1 = :aep1, 
            ProvaIntegrada1 = :provaIntegrada1, 
            Prova2 = :prova2, 
            AEP2 = :aep2,
            ProvaIntegrada2 = :provaIntegrada2,
            MediaBim1 = :mediab1,
            MediaBim2 = :mediab2,
            MediaFinal = :mediaF,
            Situacao = :situacao
        WHERE RA = :ra
    ');
    $stmt->bindParam(':ra', $ra, PDO::PARAM_STR);
    $stmt->bindParam(':prova1', $prova1, PDO::PARAM_INT);
    $stmt->bindParam(':aep1', $aep1, PDO::PARAM_INT);
    $stmt->bindParam(':provaIntegrada1', $provaIntegrada1, PDO::PARAM_INT);
    $stmt->bindParam(':prova2', $prova2, PDO::PARAM_INT);
    $stmt->bindParam(':aep2', $aep2, PDO::PARAM_INT);
    $stmt->bindParam(':provaIntegrada2', $provaIntegrada2, PDO::PARAM_INT);
    $stmt->bindParam(':mediab1', $mediab1, PDO::PARAM_INT);
    $stmt->bindParam(':mediab2', $mediab2, PDO::PARAM_INT);
    $stmt->bindParam(':mediaF', $mediaF, PDO::PARAM_INT);
    $stmt->bindParam(':situacao', $situacao, PDO::PARAM_STR);
    $stmt->execute();
}


public static function deleteAlunoRa($RA)
{
    $stmt = Database::getConn()->prepare('DELETE From Alunos WHERE RA = :RA');
    $stmt->bindParam(':RA', $RA, PDO::PARAM_STR);
    $stmt->execute();
}

public static function deleteNotaRa($RA)
{
    $stmt = Database::getConn()->prepare('DELETE From Notas WHERE RA = :RA');
    $stmt->bindParam(':RA', $RA, PDO::PARAM_STR);
    $stmt->execute();
}


    public static function getMediasTotais()
{
    $stmt = Database::getConn()->prepare('
        SELECT
            ROUND(AVG(Prova1), 2) AS media1,
            ROUND(AVG(AEP1), 2) AS media2,
            ROUND(AVG(ProvaIntegrada1), 2) AS media3,
            ROUND(AVG(MediaBim1), 2) AS media4,
            ROUND(AVG(Prova2), 2) AS media5,
            ROUND(AVG(AEP2), 2) AS media6,
            ROUND(AVG(ProvaIntegrada2), 2) AS media7,
            ROUND(AVG(MediaBim2), 2) AS media8,
            ROUND(AVG(MediaFinal), 2) AS media9
        FROM Notas
    ');
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna um array associativo com as médias
}
}