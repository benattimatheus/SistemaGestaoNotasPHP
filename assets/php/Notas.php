<?php

class Notas{
    public float $notaProva1;
    public float $notaAEP1;
    public float $notaProvaIntegrada1;
    public float $mediaBim1;
    public float $notaProva2;
    public float $notaAEP2;
    public float $notaProvaIntegrada2;
    public float $mediaBim2;
    public float $mediaFinal;

    public function __construct(float $notaProva, float $notaAEP, float $notaProvaIntegrada)
    {  
        if($notaProva1) === null{
            $notaProva1 = 0;
        } else{
            $this->notaProva1 = $notaProva1;
        }
        if($notaAEP1) === null{
            $notaAEP1 = 0;
        } else{
            $this->notaAEP1 = $notaAEP1;
        }
        if($notaProvaIntegrada1) === null{
            $notaProvaIntegrada1 = 0;
        } else{
            $this->notaProvaIntegrada1 = $notaProvaIntegrada1;
        }
        $this->mediaBim1 = $notaProva1 + $notaAEP1 + $notaProvaIntegrada1;

        if($notaProva2) === null{
            $notaProva2 = 0;
        } else{
            $this->notaProva2 = $notaProva2;
        }
        if($notaAEP2) === null{
            $notaAEP2 = 0;
        } else{
            $this->notaAEP2 = $notaAEP2;
        }
        if($notaProvaIntegrada2) === null{
            $notaProvaIntegrada2 = 0;
        } else{
            $this->notaProvaIntegrada2 = $notaProvaIntegrada2;
        }   
        $this->mediaBim2 = $notaProva2 + $notaAEP2 + $notaProvaIntegrada2;
    }

    public function mediaFinal(){
        $this->mediaFinal = ($this->mediaBim1 + $this->mediaBim2) / 2;
    }
}
