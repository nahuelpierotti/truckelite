<?php


class ProformaModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function traerDatosProforma($idViajeModel){
        return $this->database->query("SELECT V.fecha,V.origen,V.destino,V.etd,V.eta,
                                       V.km_recorrido_previsto,V.combustible_consumido_previsto,
                                       V.km_recorrido,V.combustible_consumido,V.etd_real,V.eta_real,
                                       C.denominacion,C.cuit,C.direccion,C.telefono,C.email,C.contacto1,
                                       C.contacto2,P.id,P.viaticos,P.peajes,P.extras,P.fee,P.total,
                                       U.nombre,Tc.descripcion,Car.peso,Car.hazard,Car.reefer
                                       FROM usuario U JOIN viaje V ON U.id_usuario=V.id_chofer JOIN 
	                                   cliente C ON V.id_viaje=C.id_viaje JOIN
                                       proforma P ON C.id_viaje=P.id_viaje JOIN
                                       carga Car ON P.id_viaje=Car.id_viaje JOIN
                                       tipo_carga Tc ON Car.tipo_carga=Tc.id
                                       WHERE V.id_viaje=$idViajeModel");
    }
}