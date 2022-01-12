<?php
class accesos_fechas_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function seleccionar()
    {
        $sql="SELECT * FROM accesos_fechas";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }

    function agregar($acce_id,$acfe_fecha_desde,$acfe_fecha_hasta)
    {
        $sql="INSERT INTO accesos_fechas (acce_id,acfe_fecha_desde,acfe_fecha_hasta) VALUES ('$acce_id','$acfe_fecha_desde','$acfe_fecha_hasta')";
        $this->conexion->consultar($sql);
    }

    function actualizar($acfe_id,$acce_id,$acfe_fecha_desde,$acfe_fecha_hasta)
    {
        $sql="UPDATE accesos_fechas SET acce_id='$acce_id', acfe_fecha_desde='$acfe_fecha_desde',acfe_fecha_hasta='$acfe_fecha_hasta'  WHERE acfe_id='$acfe_id' ";
        $this->conexion->consultar($sql);
    }
}
?>
