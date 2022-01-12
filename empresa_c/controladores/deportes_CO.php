<?php
require_once "modelos/deportes_MO.php";


class deportes_CO
{
    function __construct(){}

    function agregar()
    {
        $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
        $conexion=new conexion('all');
        
        $deportes_MO=new deportes_MO($conexion);
       

        $depo_nombre=htmlentities($_POST['depo_nombre'], ENT_QUOTES);
      
        if(empty($depo_nombre))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Error: se debe llevar el campo del nombre",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $size_depo_nombre=strlen($depo_nombre);

        if($size_depo_nombre>100)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $arreglo_deportes=$deportes_MO->seleccionar($depo_nombre);
        
        if($arreglo_deportes)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"El $depo_nombre ya esta registrado",
              
            ];
            exit(json_encode($arreglo_respuesta));
        }

        if(!preg_match($patron_texto,$depo_nombre))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Solo se admiten LETRAS",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        
        $deportes_MO->agregar($depo_nombre);

        $depo_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro agregado",
            "depo_id"=>$depo_id
        ];
            echo json_encode($arreglo_respuesta);

        
    }
    function actualizar()
    {
        $conexion=new conexion('all');
        
        $deportes_MO=new deportes_MO($conexion);

        $depo_id=htmlentities($_POST['depo_id'], ENT_QUOTES);
        $depo_nombre=htmlentities($_POST['depo_nombre'], ENT_QUOTES);

        if(empty($depo_nombre))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"Error: se debe llevar el campo del nombre",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $size_depo_nombre=strlen($depo_nombre);

        if($size_depo_nombre>100)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $arreglo_deportes=$deportes_MO->seleccionar($depo_nombre);
        
        if($arreglo_deportes)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"El $depo_nombre ya esta registrado",
            ];
            exit(json_encode($arreglo_respuesta));
        }
        
        $deportes_MO->actualizar($depo_id,$depo_nombre);

        $depo_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro actualizado",
           
        ];
            echo json_encode($arreglo_respuesta);

        
    }
}
?>