<?php

class Notas
{
    // public float $notaProva1;
    // public float $notaAEP1;
    // public float $notaProvaIntegrada1;
    // public float $mediaBim1;
    // public float $notaProva2;
    // public float $notaAEP2;
    // public float $notaProvaIntegrada2;
    // public float $mediaBim2;
    // public float $mediaFinal;
    // public string $situacao;

    // public function __construct(
    //     float $notaProva1,
    //     float $notaAEP1,
    //     float $notaProvaIntegrada1,
    //     float $notaProva2,
    //     float $notaAEP2,
    //     float $notaProvaIntegrada2
    // ) {
    //     $this->notaProva1 = $notaProva1 ?? 0;
    //     $this->notaAEP1 = $notaAEP1 ?? 0;
    //     $this->notaProvaIntegrada1 = $notaProvaIntegrada1 ?? 0;
    //     $this->mediaBim1 = $this->notaProva1 + $this->notaAEP1 + $this->notaProvaIntegrada1;

    //     $this->notaProva2 = $notaProva2 ?? 0;
    //     $this->notaAEP2 = $notaAEP2 ?? 0;
    //     $this->notaProvaIntegrada2 = $notaProvaIntegrada2 ?? 0;
    //     $this->mediaBim2 = $this->notaProva2 + $this->notaAEP2 + $this->notaProvaIntegrada2;
    // }

    private float $notaProva1;
    private float $notaAEP1;
    private float $notaProvaIntegrada1;
    private float $notaProva2;
    private float $notaAEP2;
    private float $notaProvaIntegrada2;
    private float $mediaBim1;
    private float $mediaBim2;
    private string $situacao;
    private string $mediaFinal;

    public function __construct(
        float $notaProva1 = 0.0,
        float $notaAEP1 = 0.0,
        float $notaProvaIntegrada1 = 0.0,
        float $notaProva2 = 0.0,
        float $notaAEP2 = 0.0,
        float $notaProvaIntegrada2 = 0.0
    ) {
        $this->notaProva1 = $notaProva1;
        $this->notaAEP1 = $notaAEP1;
        $this->notaProvaIntegrada1 = $notaProvaIntegrada1;
        $this->mediaBim1 = $this->notaProva1 + $this->notaAEP1 + $this->notaProvaIntegrada1;
        $this->notaProva2 = $notaProva2;
        $this->notaAEP2 = $notaAEP2;
        $this->notaProvaIntegrada2 = $notaProvaIntegrada2;
        $this->mediaBim2 = $this->notaProva2 + $this->notaAEP2 + $this->notaProvaIntegrada2;
    }

    
    public function calcularMediaBim1()
    {
        $this->mediaBim1 = $this->notaProva1 + $this->notaAEP1 + $this->notaProvaIntegrada1;
    }

    public function calcularMediaBim2()
    {
        $this->mediaBim2 = $this->notaProva2 + $this->notaAEP2 + $this->notaProvaIntegrada2;
    }

    public function calcularMediaFinal()
    {
        $this->mediaFinal = ($this->mediaBim1 + $this->mediaBim2) / 2;
    }

    public function definirSituacao()
    {
        if ($this->mediaFinal >= 6.0) {
            $this->situacao = 'Aprovado';
        } elseif ($this->mediaFinal <= 3.0) {
            $this->situacao = 'Reprovado';
        } else {
            $this->situacao = 'Recuperacao';
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
}
