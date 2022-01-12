<?php
require_once "modelos/paises_MO.php";

class paises_CO
{
    function __construct(){}

    function agregar()
    {
      
        $conexion=new conexion('all');
        
        $paises_MO=new paises_MO($conexion);

        $pais_nombre=htmlentities($_POST['pais_nombre'], ENT_QUOTES);

        if(empty($pais_nombre))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Error: se debe llevar el campo del nombre",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $size_pais_nombre=strlen($pais_nombre);

        if($size_pais_nombre>100)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $arreglo_paises=$paises_MO->seleccionar($pais_nombre);

        $arreglo_paises=$paises_MO->seleccionar($pais_nombre);
        if($arreglo_paises)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"$pais_nombre ya esta registrado",
              
            ];
            exit(json_encode($arreglo_respuesta));
        }
        
        $paises_MO->agregar($pais_nombre);

        $pais_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro agregado",
            "pais_id"=>$pais_id
        ];
            echo json_encode($arreglo_respuesta);

        
    }
    function actualizar()
    {
       
        $conexion=new conexion('all');
        
        $paises_MO=new paises_MO($conexion);

        $pais_id=htmlentities($_POST['pais_id'], ENT_QUOTES);
        $pais_nombre=htmlentities($_POST['pais_nombre'], ENT_QUOTES);
     
        if(empty($pais_nombre))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Error: se debe llevar el campo del nombre",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $size_pais_nombre=strlen($pais_nombre);

        if($size_pais_nombre>100)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        
        $arreglo_paises=$paises_MO->seleccionar($pais_nombre);
        if($arreglo_paises)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"$pais_nombre ya esta registrado",
              
            ];
            exit(json_encode($arreglo_respuesta));
        }

       
        $paises_MO->actualizar($pais_id,$pais_nombre);

        $pais_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro actualizado",
           
        ];
            echo json_encode($arreglo_respuesta);

        
    }
}
?>