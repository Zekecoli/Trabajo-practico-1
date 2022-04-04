<?php
    class viajes{
        private $destino;
        private $cantidadMax;
        private $codigo;
        private $listaPasajeros;

        public function __construct($destino,$cantidadMax,$codigo,$listaPasajeros){
            $this->destino = $destino;
            $this->cantidadMax = $cantidadMax;
            $this->codigo = $codigo;
            $this->listaPasajeros = $listaPasajeros;
        }

        //Metodos getter
        //obteneter el valor de los atributos

        public function getDestino(){
            return $this->destino;
        }

        public function getCantidadMax(){
            return $this->cantidadMax;
        }

        public function getCodigo(){
            return $this->codigo;
        }

        public function getListaPasajeros(){
            return $this->listaPasajeros;
        }

        //Metodos setter
        //settear/colocar/cambiar el valor de los atributos

        public function setDestino($destino){
            return $this->destino = $destino;
        }

        public function setCantidadMaxima($maxima){
            return $this->cantidadMax = $maxima;
        }

        public function setCodigo($codigo){
            return $this->codigo = $codigo;
        }

        public function setListaPasajeros($lista){
            return $this->listaPasajeros = $lista;
        }

        //Metodo restante
        public function __toString()
        {
            return "\n\nCodigo del viaje: ". $this->getCodigo(). "\nDestino: ". $this->getDestino(). "\nNumero de pasajeros: ". count($this->getListaPasajeros())."/". $this->getCantidadMax()."\n";
        }
    }

?>