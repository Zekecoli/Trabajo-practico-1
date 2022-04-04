<?php
include "viajes.php";
$arrayPasajeros = [];
$arrayPasajeros[0] = ["nombre"=>"JUAN", "apellido" => "ZAPATA" , "DNI"=> 45987237];
$arrayPasajeros[1] = ["nombre"=>"PABLO", "apellido" => "GONZALES" , "DNI"=> 22428491];
$arrayPasajeros[2] = ["nombre"=>"MARTIN", "apellido" => "RODRIGUEZ" , "DNI"=> 32739264];
$arrayPasajeros[3] = ["nombre"=>"FACUNDO", "apellido" => "FERNANDEZ" , "DNI"=> 35284967];

$p = new viajes("san martin",6,4431,$arrayPasajeros);

$p->setDestino("SAN MARTIN");
$p->setCantidadMaxima(6);
$p->setCodigo(4431);
$p->setListaPasajeros($arrayPasajeros);

do {
    $limite = count($p->getListaPasajeros());
    //El echo va a imorimir en pantalla los datos del viaje como el codigo, destino y el total de los pasajeros
    echo $p;
    echo "\n__MENU__ \nIngrese la opcion quiera realizar: \n 1 _ Registrar un nuevo pasajero\n 2 _ Modificar\n 3 _ Ver los datos de los pasajeros\n 4 _ Salir\nOPCION: ";
    $operando = trim(fgets(STDIN));

    switch ($operando) {
        case 1:

            if (count($p->getListaPasajeros()) ==  $p->getCantidadMax()) {
                echo "\nLimite de pasajeros alcanzados.";
            }
            else{
                echo "Ingrese el nombre del pasajero: ";
                $nombre = strtoupper(trim(fgets(STDIN)));
                echo "Ingrese el apellido del pasajero: ";
                $apellido = strtoupper(trim(fgets(STDIN)));
                echo "Ingrese el DNI: ";
                $dni = trim(fgets(STDIN));
                $nuevoPasajeros = ["nombre" => $nombre, "apellido" => $apellido, "DNI" => $dni];
                array_push($arrayPasajeros,$nuevoPasajeros);
                $p->setListaPasajeros($arrayPasajeros);
                //var_dump($p->getListaPasajeros());
            }
            
        break;

        case 2:
            do {
                echo "\nElija la opcion que quiera modificar: \n 1 _ Codigo\n 2 _ Cantidad maxima de pasajeros \n 3 _ Destino \nOPCION: ";
                $opcion = trim(fgets(STDIN));
                switch ($opcion) {
                    case 1:
                        echo "Ingrese el nuevo codigo(solo numeros): ";
                        $newCodigo = trim(fgets(STDIN));
                        $p->setCodigo($newCodigo);
                    break;
                    
                    case 2:
                        echo "Ingrese la nueva cantidad maxima de pasajeros: ";
                        $newCantidadMax = trim(fgets(STDIN));
                        $p->setCantidadMaxima($newCantidadMax);
                    break;

                    case 3:
                        echo "Ingrese el nuevo destino: ";
                        $newDestino = strtoupper(trim(fgets(STDIN)));
                        $p->setDestino($newDestino);
                    break;
                }
                echo "\n¿Desea realizar otra operacion?(S/N): ";
                $a = strtoupper(trim(fgets(STDIN)));
            } while ($a == "S");
        break;

        case 3:
            do {
                echo "\nElija el numero del pasajero(". $limite."/".$p->getCantidadMax()."): ";
            $numero = trim(fgets(STDIN));
            if ($numero > $limite) {
                echo "Aun no se ha registrado el numero de ese pasajero";
            }
            else{
                $numero = $numero - 1;
                echo "Datos del pasajero: \nNombre: ".$p->getListaPasajeros()[$numero]["nombre"]."\nApellido: ". $p->getListaPasajeros()[$numero]["apellido"]. "\nDNI: ". $p->getListaPasajeros()[$numero]["DNI"];
            }

                echo "\n¿Desea ver los datos de otro pasajero?(S/N): ";
                $e = strtoupper(trim(fgets(STDIN)));
            } while ($e == "S");
        break;

        case 4:
            echo "Fin del programa";
        break;
    
    }
} while ($operando != 4 );

?>