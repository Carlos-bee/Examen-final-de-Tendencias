<?php
require_once "modelos/accesos_fechas_horas_MO.php";

class accesos_fechas_horas_CO
{
    function __construct(){}

    function agregar()
    {
        $conexion=new conexion('all');
        
        $accesos_fechas_horas_MO=new accesos_fechas_horas_MO($conexion);

        $acfe_id=htmlentities($_POST['acfe_id'], ENT_QUOTES);
        $acfh_hora_desde=htmlentities($_POST['acfh_hora_desde'], ENT_QUOTES);
        $acfh_hora_hasta=htmlentities($_POST['acfh_hora_hasta'], ENT_QUOTES);

        if(empty($acfe_id))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe seleccionar la fecha",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
      
        $size_acfe_id=strlen($acfe_id);
        if($size_acfe_id>10)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        if(empty($acfh_hora_desde))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo -> hora desde",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
      
        $size_acfh_hora_desde=strlen($acfh_hora_desde);
        if($size_acfh_hora_desde>5)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        if(empty($acfh_hora_hasta))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo -> hora hasta",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
      
        $size_acfh_hora_hasta=strlen($acfh_hora_hasta);
        if($size_acfh_hora_hasta>5)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        
        $accesos_fechas_horas_MO->agregar( $acfe_id,$acfh_hora_desde,$acfh_hora_hasta);

        $acfh_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro agregado",
            "acfh_id"=>$acfh_id
        ];
            echo json_encode($arreglo_respuesta);

        
    }
    
    function actualizar()
    {
        $conexion=new conexion('all');
        
        $accesos_fechas_horas_MO=new accesos_fechas_horas_MO($conexion);

        $acfh_id=htmlentities($_POST['acfh_id'], ENT_QUOTES);
        $acfe_id=htmlentities($_POST['acfe_id'], ENT_QUOTES);
        $acfh_hora_desde=htmlentities($_POST['acfh_hora_desde'], ENT_QUOTES);
        $acfh_hora_hasta=htmlentities($_POST['acfh_hora_hasta'], ENT_QUOTES);

        if(empty($acfe_id))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe seleccionar la fecha",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
      
        $size_acfe_id=strlen($acfe_id);
        if($size_acfe_id>10)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        if(empty($acfh_hora_desde))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo -> hora desde",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
      
        $size_acfh_hora_desde=strlen($acfh_hora_desde);
        if($size_acfh_hora_desde>5)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        if(empty($acfh_hora_hasta))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo -> hora hasta",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
      
        $size_acfh_hora_hasta=strlen($acfh_hora_hasta);
        if($size_acfh_hora_hasta>5)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        
        $accesos_fechas_horas_MO->actualizar($acfh_id,$acfe_id,$acfh_hora_desde,$acfh_hora_hasta);

        $acfh_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro actualizado",
           
        ];
            echo json_encode($arreglo_respuesta);

        
    }
}
?>