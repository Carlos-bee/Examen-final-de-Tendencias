<?php
class accesos_fechas_horas_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function seleccionar()
    {
        
        $sql="SELECT * FROM accesos_fechas_horas";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }

    function agregar($acfe_id,$acfh_hora_desde,$acfh_hora_hasta)
    {
        $sql="INSERT INTO accesos_fechas_horas (acfe_id,acfh_hora_desde,acfh_hora_hasta) VALUES ('$acfe_id','$acfh_hora_desde','$acfh_hora_hasta')";
        $this->conexion->consultar($sql);
    }

    function actualizar($acfh_id,$acfe_id,$acfh_hora_desde,$acfh_hora_hasta)
    {
        $sql="UPDATE accesos_fechas_horas SET acfe_id='$acfe_id', acfh_hora_desde='$acfh_hora_desde',acfh_hora_hasta='$acfh_hora_hasta'  WHERE acfh_id='$acfh_id' ";
        $this->conexion->consultar($sql);
    }
}
?>
