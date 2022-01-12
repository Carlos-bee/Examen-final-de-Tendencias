<?php
class sexos_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function seleccionar($sexo_nombre='')
    {
        if($sexo_nombre)
        {
            $sql="SELECT * FROM sexos WHERE sexo_nombre='$sexo_nombre'";
        }
        else
        {
            $sql="SELECT * FROM sexos";
        }
       
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }

    function agregar($sexo_nombre)
    {
        $sql="INSERT INTO sexos (sexo_nombre) VALUES ('$sexo_nombre')";
        $this->conexion->consultar($sql);
    }

    function actualizar($sexo_id,$sexo_nombre)
    {
        $sql="UPDATE sexos SET sexo_nombre='$sexo_nombre' WHERE sexo_id='$sexo_id' ";
        $this->conexion->consultar($sql);
    }
}
?>