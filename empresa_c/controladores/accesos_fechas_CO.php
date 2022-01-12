<?php
require_once "modelos/accesos_fechas_MO.php";

class accesos_fechas_CO
{
    function __construct(){}

    function agregar()
    {
        $conexion=new conexion('all');
        
        $accesos_fechas_MO=new accesos_fechas_MO($conexion);

        $acce_id=htmlentities($_POST['acce_id'], ENT_QUOTES);
        $acfe_fecha_desde=htmlentities($_POST['acfe_fecha_desde'], ENT_QUOTES);
        $acfe_fecha_hasta=htmlentities($_POST['acfe_fecha_hasta'], ENT_QUOTES);

        if(empty($acce_id))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe seleccionar el acceso",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $size_acce_id=strlen($acce_id);
        if($size_acce_id>10)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        if(empty($acfe_fecha_desde))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo -> fecha desde",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }


        if(empty($acfe_fecha_hasta))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo -> fecha hasta",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
      
      
        $accesos_fechas_MO->agregar( $acce_id,$acfe_fecha_desde,$acfe_fecha_hasta);

        $acfe_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
       
            "mensaje"=>"Registro agregado",
            "acfe_id"=>$acfe_id
        ];
            echo json_encode($arreglo_respuesta);

        
    }
    
    function actualizar()
    {
        $conexion=new conexion('all');
        
        $accesos_fechas_MO=new accesos_fechas_MO($conexion);

        $acfe_id=htmlentities($_POST['acfe_id'], ENT_QUOTES);
        $acce_id=htmlentities($_POST['acce_id'], ENT_QUOTES);
        $acfe_fecha_desde=htmlentities($_POST['acfe_fecha_desde'], ENT_QUOTES);
        $acfe_fecha_hasta=htmlentities($_POST['acfe_fecha_hasta'], ENT_QUOTES);

        
        if(empty($acce_id))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe seleccionar el acceso",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $size_acce_id=strlen($acce_id);
        if($size_acce_id>10)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        if(empty($acfe_fecha_desde))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo -> fecha desde",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }


        if(empty($acfe_fecha_hasta))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo -> fecha hasta",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        
        $accesos_fechas_MO->actualizar($acfe_id,$acce_id,$acfe_fecha_desde,$acfe_fecha_hasta);

        $acfe_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro actualizado",
           
        ];
            echo json_encode($arreglo_respuesta);

        
    }
}
?>