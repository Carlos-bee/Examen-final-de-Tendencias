<?php
require_once "modelos/personas_deportes_MO.php";

class personas_deportes_CO
{
    function __construct(){}

    function agregar()
    {
        $conexion=new conexion('all');
        
        $personas_deportes_MO=new personas_deportes_MO($conexion);

        $depo_id=htmlentities($_POST['depo_id'], ENT_QUOTES);
        $pers_id=htmlentities($_POST['pers_id'], ENT_QUOTES);
        
        if(empty($depo_id))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"Error se debe seleccionar el deporte",
            ];
                exit(json_encode($arreglo_respuesta));
        }

        if(empty($pers_id))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"Error se debe seleccionar la persona",
            ];
                exit(json_encode($arreglo_respuesta));
        }
        
        $arreglo_personas_deportes_MO=$personas_deportes_MO->seleccionar($depo_id,$pers_id);
        
        if($arreglo_personas_deportes_MO)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"Estas ingresando datos que ya estan registrados, COMPRUEBA LA INFORMACION",
            ];
            exit(json_encode($arreglo_respuesta));
        }

        $personas_deportes_MO->agregar($depo_id, $pers_id);

        $pede_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro agregado",
            "pede_id"=>$pede_id
        ];
            echo json_encode($arreglo_respuesta);

    }
    
    function actualizar()
    {
        $conexion=new conexion('all');
        
        $personas_deportes_MO=new personas_deportes_MO($conexion);

        $pede_id=htmlentities($_POST['pede_id'], ENT_QUOTES);
        $depo_id=htmlentities($_POST['depo_id'], ENT_QUOTES);
        $pers_id=htmlentities($_POST['pers_id'], ENT_QUOTES);
        
        if(empty($depo_id))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"Error se debe seleccionar el deporte",
            ];
                exit(json_encode($arreglo_respuesta));
        }

        if(empty($pers_id))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"Error se debe seleccionar la persona",
            ];
                exit(json_encode($arreglo_respuesta));
        }
        
        $arreglo_personas_deportes_MO=$personas_deportes_MO->seleccionar($depo_id,$pers_id);
        
        if($arreglo_personas_deportes_MO)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"Estas ingresando datos que ya estan registrados, COMPRUEBA LA INFORMACION",
            ];
            exit(json_encode($arreglo_respuesta));
        }
        
        $personas_deportes_MO->actualizar($pede_id,$depo_id,$pers_id);

        $pede_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro actualizado",
           
        ];
            echo json_encode($arreglo_respuesta);

        
    }
}
?>