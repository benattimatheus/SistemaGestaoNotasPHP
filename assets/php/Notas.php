<?php

class Notas{
    public float $notaProva;
    public float $notaAEP;
    public float $notaProvaIntegrada;
    public float $mediaBim;
    public float $mediaFinal;

    public function __construct(float $notaProva, float $notaAEP, float $notaProvaIntegrada)
    {
        $this->notaProva = $notaProva;
        $this->notaAEP = $notaAEP;
        $this->notaProvaIntegrada = $notaProvaIntegrada;
        $this->mediaBim = $notaProva + $notaAEP + $notaProvaIntegrada;
    }

    public function mediaFinal(){

    }
}
