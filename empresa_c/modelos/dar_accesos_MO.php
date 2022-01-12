<?php
class dar_accesos_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function seleccionar($acce_usuario=''){

        if($acce_usuario)
        {
            $sql="SELECT * FROM accesos WHERE acce_usuario='$acce_usuario'";
        }
        else
        {
            $sql="SELECT * FROM accesos";
        }

       
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }

    function agregar($pers_id,$acce_usuario,$acce_clave){

        $sql="INSERT INTO accesos (pers_id, acce_usuario, acce_clave) VALUES (' $pers_id','$acce_usuario','$acce_clave')";


        $this->conexion->consultar($sql);


    }
    function actualizar($acce_id,$pers_id,$acce_usuario,$acce_clave)
    {
        $sql="UPDATE accesos SET pers_id='$pers_id',acce_usuario='$acce_usuario' ,acce_clave='$acce_clave'  WHERE acce_id='$acce_id' ";
        $this->conexion->consultar($sql);
    }
}
?>