<?php
require_once "modelos/dar_accesos_MO.php";

class dar_accesos_CO
{
    function __construct(){}

    function agregar()
    {
        $conexion=new conexion('all');
        
        $dar_accesos_MO=new dar_accesos_MO($conexion);

        $pers_id=htmlentities($_POST['pers_id'], ENT_QUOTES);
        $acce_usuario=htmlentities($_POST['acce_usuario'], ENT_QUOTES);
        $acce_clave=htmlentities($_POST['acce_clave'], ENT_QUOTES);


        if(empty($pers_id))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe seleccionar la persona",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
      
        $size_pers_id=strlen($pers_id);
        if($size_pers_id>10)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        
        if(empty($acce_usuario))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo usuario",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
      
        $size_acce_usuario=strlen($acce_usuario);
        if($size_acce_usuario>45)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        if(empty($acce_clave))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo clave",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
      
        $size_acce_clave=strlen($acce_clave);
        if($size_acce_clave>255)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $arreglo_usuarios=$dar_accesos_MO->seleccionar($acce_usuario);
        
        if($arreglo_usuarios)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"El usuario -> $acce_usuario ya esta registrado",
              
            ];
            exit(json_encode($arreglo_respuesta));
        }

        $dar_accesos_MO->agregar($pers_id,$acce_usuario,$acce_clave);

        $acce_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro agregado",
            "acce_id"=>$acce_id
        ];
            echo json_encode($arreglo_respuesta);

        
    }
    function actualizar()
    {
        $conexion=new conexion('all');
        
        $dar_accesos_MO=new dar_accesos_MO($conexion);

        $acce_id=htmlentities($_POST['acce_id'], ENT_QUOTES);
        $pers_id=htmlentities($_POST['pers_id'], ENT_QUOTES);
        $acce_usuario=htmlentities($_POST['acce_usuario'], ENT_QUOTES);
        $acce_clave=htmlentities($_POST['acce_clave'], ENT_QUOTES);


        if(empty($pers_id))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe seleccionar la persona",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
      
        $size_pers_id=strlen($pers_id);
        if($size_pers_id>10)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        
        if(empty($acce_usuario))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo usuario",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
      
        $size_acce_usuario=strlen($acce_usuario);
        if($size_acce_usuario>45)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        if(empty($acce_clave))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo clave",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
      
        $size_acce_clave=strlen($acce_clave);
        if($size_acce_clave>255)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        $arreglo_usuarios=$dar_accesos_MO->seleccionar($acce_usuario);
        
        if($arreglo_usuarios)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"El usuario -> $acce_usuario ya esta registrado",
              
            ];
            exit(json_encode($arreglo_respuesta));
        }
        
        $dar_accesos_MO->actualizar($acce_id,$pers_id,$acce_usuario,$acce_clave);

        $acce_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro actualizado",
           
        ];
            echo json_encode($arreglo_respuesta);

        
    }
}
?>