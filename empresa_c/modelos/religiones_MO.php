<?php
class religiones_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function seleccionar($reli_nombre='')
    {
        if($reli_nombre)
        {
            $sql="SELECT * FROM religiones WHERE reli_nombre='$reli_nombre'";
        }
        else
        {
            $sql="SELECT * FROM religiones";
        }
       
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }

    function agregar($reli_nombre)
    {
        $sql="INSERT INTO religiones (reli_nombre) VALUES ('$reli_nombre')";
        $this->conexion->consultar($sql);
    }

    function actualizar($reli_id,$reli_nombre)
    {
        $sql="UPDATE religiones SET reli_nombre='$reli_nombre' WHERE reli_id='$reli_id' ";
        $this->conexion->consultar($sql);
    }
}
?>