<?php

class Notas
{

    private float $notaProva1;
    private float $notaAEP1;
    private float $notaProvaIntegrada1;
    private float $notaProva2;
    private float $notaAEP2;
    private float $notaProvaIntegrada2;
    private float $mediaBim1;
    private float $mediaBim2;
    private string $situacao;
    private float $mediaFinal;
    private Aluno $aluno;

    private int $ra;

    public function __construct(
        Aluno $aluno,
        float $notaProva1 = 0.0,
        float $notaAEP1 = 0.0,
        float $notaProvaIntegrada1 = 0.0,
        float $notaProva2 = 0.0,
        float $notaAEP2 = 0.0,
        float $notaProvaIntegrada2 = 0.0,
        string $situacao
    ) {
        $this->ra = $aluno->getRA();
        $this->notaProva1 = $notaProva1;
        $this->notaAEP1 = $notaAEP1;
        $this->notaProvaIntegrada1 = $notaProvaIntegrada1;
        $this->mediaBim1 = $this->notaProva1 + $this->notaAEP1 + $this->notaProvaIntegrada1;
        $this->notaProva2 = $notaProva2;    
        $this->notaAEP2 = $notaAEP2;
        $this->notaProvaIntegrada2 = $notaProvaIntegrada2;
        $this->mediaBim2 = $this->notaProva2 + $this->notaAEP2 + $this->notaProvaIntegrada2;
        $this->situacao = $situacao;
    }

    
    public function calcularMediaBim1()
    {
        $this->mediaBim1 = (($this->notaProva1 * 0.8) + ($this->notaAEP1 * 0.1) + ($this->notaProvaIntegrada1 * 0.1));
    }


    public function calcularMediaBim2()
    {
        $this->mediaBim2 = (($this->notaProva2 * 0.8) + ($this->notaAEP2 * 0.1) + ($this->notaProvaIntegrada2 * 0.1));
    }

    public function calcularMediaFinal()
    {
        $this->mediaFinal = ($this->getMediaBim1() + $this->getMediaBim2()) / 2;
    }

    public function getSituacao()
    {
        if ($this->mediaFinal >= 6.0) {
            return $this->situacao = 'Aprovado';
        } elseif ($this->mediaFinal <= 3.0) {
            return $this->situacao = 'Reprovado';
        } else {
            return $this->situacao = 'Recuperacao';
        }
    }
    public function getNotaProva1(): float
    {
        return $this->notaProva1;
    }
    public function getNotaAEP1(): float
    {
        return $this->notaAEP1;
    }
    public function getNotaProvaIntegrada1(): float
    {
        return $this->notaProvaIntegrada1;
    }
    public function getMediaBim1(): float
    {
        return $this->mediaBim1;
    }
    public function getNotaProva2(): float
    {
        return $this->notaProva2;
    }
    public function getNotaAEP2(): float
    {
        return $this->notaAEP2;
    }
    public function getNotaProvaIntegrada2(): float
    {
        return $this->notaProvaIntegrada2;
    }
    public function getMediaBim2(): float
    {
        return $this->mediaBim2;
    }
    public function getMediaFinal(): float
    {
        return $this->mediaFinal;
    }
    public function getRA(): int
    {
        return $this->ra;
    }
}
