<?php
require_once "modelos/sexos_MO.php";

class sexos_CO
{
 
    function __construct(){}

    function agregar()
    {
        $conexion=new conexion('all');
        
        $sexos_MO=new sexos_MO($conexion);

        $sexo_nombre=htmlentities($_POST['sexo_nombre'], ENT_QUOTES);

        if(empty($sexo_nombre))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Error se debe llenar el campo nombre",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
      
        $size_sexo_nombre=strlen($sexo_nombre);
        if($size_sexo_nombre>50)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $arreglo_sexos=$sexos_MO->seleccionar($sexo_nombre);
        
        if($arreglo_sexos)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"El $sexo_nombre esta duplicado",
              
            ];
            exit(json_encode($arreglo_respuesta));
        }

        $sexos_MO->agregar($sexo_nombre);

        $sexo_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro agregado",
            "sexo_id"=>$sexo_id
        ];
            echo json_encode($arreglo_respuesta);

        
    }
    function actualizar()
    {
      
        $conexion=new conexion('all');
        
        $sexos_MO=new sexos_MO($conexion);

        $sexo_id=htmlentities($_POST['sexo_id'], ENT_QUOTES);
        $sexo_nombre=htmlentities($_POST['sexo_nombre'], ENT_QUOTES);
       
        if(empty($sexo_nombre))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Error se debe llenar el campo nombre",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        
        $size_sexo_nombre=strlen($sexo_nombre);
        if($size_sexo_nombre>50)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $arreglo_sexos=$sexos_MO->seleccionar($sexo_nombre);
        
        if($arreglo_sexos)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"El $sexo_nombre esta duplicado",
              
            ];
            exit(json_encode($arreglo_respuesta));
        }

        
        
        $sexos_MO->actualizar($sexo_id,$sexo_nombre);

        $sexo_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro actualizado",
           
        ];
            echo json_encode($arreglo_respuesta);

        
    }
}
?>