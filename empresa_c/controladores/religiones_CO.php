<?php
require_once "modelos/religiones_MO.php";

class religiones_CO
{
    function __construct(){}

    function agregar()
    {
       

        $conexion=new conexion('all');
        
        $religiones_MO=new religiones_MO($conexion);
        
        $reli_nombre=htmlentities($_POST['reli_nombre'], ENT_QUOTES);
        
        if(empty($reli_nombre))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"ERROR: se debe llevar el campo del nombre",
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $size_reli_nombre=strlen($reli_nombre);
        if($size_reli_nombre>100)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
            ];
                exit(json_encode($arreglo_respuesta));
        }

       
        $arreglo_religiones=$religiones_MO->seleccionar($reli_nombre);
        
        $arreglo_religiones=$religiones_MO->seleccionar($reli_nombre);
        if($arreglo_religiones)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"$reli_nombre ya esta registrado",
              
            ];
            exit(json_encode($arreglo_respuesta));
        }

        
        $religiones_MO->agregar($reli_nombre);

        $reli_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro agregado",
            "reli_id"=>$reli_id
        ];
        echo json_encode($arreglo_respuesta);

        
    }
    function actualizar()
    {
       
        $conexion=new conexion('all');
        
        $religiones_MO=new religiones_MO($conexion);

        $reli_id=htmlentities($_POST['reli_id'], ENT_QUOTES);
        $reli_nombre=htmlentities($_POST['reli_nombre'], ENT_QUOTES);
    
        
        if(empty($reli_nombre))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"Error: se debe llevar el campo del nombre",
            ];
            exit(json_encode($arreglo_respuesta));
        }

        $size_reli_nombre=strlen($reli_nombre);
        if($size_reli_nombre>100)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $arreglo_religiones=$religiones_MO->seleccionar($reli_nombre);
        if($arreglo_religiones)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"$reli_nombre ya esta registrado",
              
            ];
            exit(json_encode($arreglo_respuesta));
        }
       
        $religiones_MO->actualizar($reli_id,$reli_nombre);

        $reli_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro actualizado",
           
        ];
            echo json_encode($arreglo_respuesta);

        
    }
}
?>