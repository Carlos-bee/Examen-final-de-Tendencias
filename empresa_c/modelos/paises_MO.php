<?php
class paises_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function seleccionar($pais_nombre='')
    {
        if($pais_nombre)
        {
            $sql="SELECT * FROM paises WHERE pais_nombre='$pais_nombre'";
        }
        else
        {
            $sql="SELECT * FROM paises";
        }
      
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }

    function agregar($pais_nombre)
    {
        $sql="INSERT INTO paises (pais_nombre) VALUES ('$pais_nombre')";
        $this->conexion->consultar($sql);
    }

    function actualizar($pais_id,$pais_nombre)
    {
        $sql="UPDATE paises SET pais_nombre='$pais_nombre' WHERE pais_id='$pais_id' ";
        $this->conexion->consultar($sql);
    }
}
?>