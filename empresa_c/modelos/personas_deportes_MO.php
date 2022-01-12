<?php
class personas_deportes_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function seleccionar($depo_id='', $pers_id='')
    {
        if($depo_id && $pers_id )
        {
            $sql="SELECT * FROM personas_deportes WHERE depo_id='$depo_id' && pers_id='$pers_id' ";
        }
        
        else
        {
           
            $sql="SELECT * FROM personas_deportes";
        }
       
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }

    function agregar($depo_id,$pers_id)
    {
        $sql="INSERT INTO personas_deportes (depo_id, pers_id) VALUES ('$depo_id','$pers_id')";
        $this->conexion->consultar($sql);
    }

    function actualizar($pede_id,$depo_id, $pers_id)
    {
        $sql="UPDATE personas_deportes SET depo_id='$depo_id', pers_id='$pers_id' WHERE pede_id='$pede_id' ";
        $this->conexion->consultar($sql);
    }
}
?>
