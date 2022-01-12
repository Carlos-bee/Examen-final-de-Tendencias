<?php
class personas_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function seleccionar($pers_id)
    {
        $sql="select pers_nombres from personas where pers_id='$pers_id'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }

    function seleccionarPers($pers_documento='')
    {
        if($pers_documento)
        {
            $sql="SELECT * FROM personas WHERE pers_documento='$pers_documento'";
        }
        else
        {
            $sql="SELECT * FROM personas";
        }
       
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }

    function agregar($pais_id_nacionalidad,$pais_id_pregrado,$sexo_id,$reli_id,$pers_documento,$pers_nombres,$pers_apellidos,$pers_fecha_nacimiento,$pers_email,$pers_direccion,$pers_celular)
    {
        $sql="INSERT INTO `personas`(`pais_id_nacionalidad`, `pais_id_pregrado`, `sexo_id`, `reli_id`, `pers_documento`, `pers_nombres`, `pers_apellidos`, 
        `pers_fecha_nacimiento`, `pers_email`, `pers_direccion`, `pers_celular`) 
        VALUES ('$pais_id_nacionalidad',
        ' $pais_id_pregrado','$sexo_id','$reli_id',
         '$pers_documento','$pers_nombres','$pers_apellidos','$pers_fecha_nacimiento','$pers_email',
         '$pers_direccion','$pers_celular')";
        $this->conexion->consultar($sql);
    }

    function actualizar($pers_id,$pais_id_nacionalidad,$pais_id_pregrado,$sexo_id,$reli_id,$pers_documento,$pers_nombres,$pers_apellidos,$pers_fecha_nacimiento,$pers_email,$pers_direccion,$pers_celular)
    {
        $sql="UPDATE `personas` SET pais_id_nacionalidad='$pais_id_nacionalidad',pais_id_pregrado='$pais_id_pregrado',
        sexo_id='$sexo_id',reli_id='$reli_id',pers_documento='$pers_documento',pers_nombres='$pers_nombres',pers_apellidos='$pers_apellidos',
        pers_fecha_nacimiento='$pers_fecha_nacimiento',pers_email='$pers_email',pers_direccion='$pers_direccion',pers_celular='$pers_celular'
         WHERE pers_id='$pers_id'";
        $this->conexion->consultar($sql);
    }
}
?>