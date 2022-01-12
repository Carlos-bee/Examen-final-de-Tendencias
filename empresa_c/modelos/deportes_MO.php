<?php
class deportes_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function seleccionar($depo_nombre='')
    {
        if($depo_nombre)
        {
            $sql="SELECT * FROM deportes WHERE depo_nombre='$depo_nombre'";
        }
        else
        {
            $sql="SELECT * FROM deportes";
        }
      
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }

    function agregar($depo_nombre)
    {
        $sql="INSERT INTO deportes (depo_nombre) VALUES ('$depo_nombre')";
        $this->conexion->consultar($sql);
    }

    function actualizar($depo_id,$depo_nombre)
    {
        $sql="UPDATE deportes SET depo_nombre='$depo_nombre' WHERE depo_id='$depo_id' ";
        $this->conexion->consultar($sql);
    }
}
?>