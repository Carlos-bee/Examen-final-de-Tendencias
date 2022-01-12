<?php
require_once "modelos/personas_MO.php";

class personas_CO
{
    function __construct(){}

    function agregar()
    {
        $conexion=new conexion('all');
        
        $personas_MO=new personas_MO($conexion);

        $pais_id_nacionalidad=htmlentities($_POST['pais_id_nacionalidad'],ENT_QUOTES);
        $pais_id_pregrado=htmlentities($_POST['pais_id_pregrado'],ENT_QUOTES);
        $sexo_id=htmlentities($_POST['sexo_id'],ENT_QUOTES);
        $reli_id=htmlentities($_POST['reli_id'],ENT_QUOTES);
        $pers_documento=htmlentities($_POST['pers_documento'],ENT_QUOTES);
        $pers_nombres=htmlentities($_POST['pers_nombres'],ENT_QUOTES);
        $pers_apellidos=htmlentities($_POST['pers_apellidos'],ENT_QUOTES);
        $pers_fecha_nacimiento=htmlentities($_POST['pers_fecha_nacimiento'],ENT_QUOTES);
        $pers_email=htmlentities($_POST['pers_email'],ENT_QUOTES);
        $pers_direccion=htmlentities($_POST['pers_direccion'],ENT_QUOTES);
        $pers_celular=htmlentities($_POST['pers_celular'],ENT_QUOTES);

        if(empty($pais_id_nacionalidad))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: selecciona del pais de nacionalidad ",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
              
        if(empty($pais_id_pregrado))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: selecciona del pais de pregrado",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
              
        if(empty($sexo_id))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: seleccionar el sexo",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        if(empty($reli_id))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: seleccionar la religi&oacute;n",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        if(empty($pers_documento))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe ingresar el n&uacute;mero de documento",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        if(empty($pers_nombres))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo nombres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        
        }    
        if(empty($pers_apellidos))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo apellidos",
        
            ];
                exit(json_encode($arreglo_respuesta));
        
        }
        if(empty($pers_fecha_nacimiento))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe seleccionar la fecha de nacimiento",
        
            ];
                exit(json_encode($arreglo_respuesta));
        
        }
        if(empty($pers_email))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"se debe llenar el campo del correo electr&oacute;nico, si no tiene escriba 'Null'",
        
            ];
                exit(json_encode($arreglo_respuesta));
       
        } 
        else
        {
            
            if($pers_email=='Null')
            {
                $arreglo_respuesta=[
                    "estado"=>"EXITO",
                   
                    "mensaje"=>"Listo",
            
                ];
                    exit(json_encode($arreglo_respuesta));
            }
            else if(!filter_var($pers_email, FILTER_VALIDATE_EMAIL))
            {
                    $arreglo_respuesta=[
                        "estado"=>"ERROR",
                       
                        "mensaje"=>"ERROR: sintaxis equivocada, revisa el correo electr&oacute;nico",
                
                    ];
                        exit(json_encode($arreglo_respuesta));
                
            }
        }
        if(empty($pers_direccion))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo direcci&oacute;n",
        
            ];
                exit(json_encode($arreglo_respuesta));
        
        }
        if(empty($pers_celular))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo celular",
        
            ];
                exit(json_encode($arreglo_respuesta));
        
        }

        if(!is_numeric($pers_documento))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Solo se admiten NUMEROS en el documento",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

       

        if(!is_numeric($pers_celular))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Solo se admiten NUMEROS en el n&uacute;mero de celular",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $size_pers_documento=strlen($pers_documento);
        if($size_pers_documento>15)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres del documento",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        $size_pers_nombres=strlen($pers_nombres);
        if($size_pers_nombres>50)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres en el campo nombres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        $size_pers_apellidos=strlen($pers_apellidos);
        if($size_pers_apellidos>50)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres en el campo apellidos",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        $size_pers_apellidos=strlen($pers_apellidos);
        if($size_pers_apellidos>50)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres en el campo apellidos",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $size_pers_email=strlen($pers_email);
        if($size_pers_email>100)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres en el correo electr&oacute;nico",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        
        $size_pers_direccion=strlen($pers_direccion);
        if($size_pers_direccion>100)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres en el campo direcci&oacute;n",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        $size_pers_celular=strlen($pers_celular);
        if($size_pers_celular>10)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres en el n&acute;mero de celular",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $arreglo_personas=$personas_MO->seleccionarPers($pers_documento);
        if($arreglo_personas)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"El $pers_documento ya esta registrado",
              
            ];
            exit(json_encode($arreglo_respuesta));
        }

        $personas_MO->agregar($pais_id_nacionalidad,$pais_id_pregrado,$sexo_id,$reli_id,$pers_documento,$pers_nombres,$pers_apellidos,$pers_fecha_nacimiento,$pers_email,$pers_direccion,$pers_celular);

        $pers_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
       
            "mensaje"=>"Registro agregado",
            "pers_id"=>$pers_id
        ];
            echo json_encode($arreglo_respuesta);

        
    }
    
    function actualizar()
    {
        $conexion=new conexion('all');
        
        $personas_MO=new personas_MO($conexion);

        $pers_id=htmlentities($_POST['pers_id'], ENT_QUOTES);
        $pais_id_nacionalidad=htmlentities($_POST['pais_id_nacionalidad'],ENT_QUOTES);
        $pais_id_pregrado=htmlentities($_POST['pais_id_pregrado'],ENT_QUOTES);
        $sexo_id=htmlentities($_POST['sexo_id'],ENT_QUOTES);
        $reli_id=htmlentities($_POST['reli_id'],ENT_QUOTES);
        $pers_documento=htmlentities($_POST['pers_documento'],ENT_QUOTES);
        $pers_nombres=htmlentities($_POST['pers_nombres'],ENT_QUOTES);
        $pers_apellidos=htmlentities($_POST['pers_apellidos'],ENT_QUOTES);
        $pers_fecha_nacimiento=htmlentities($_POST['pers_fecha_nacimiento'],ENT_QUOTES);
        $pers_email=htmlentities($_POST['pers_email'],ENT_QUOTES);
        $pers_direccion=htmlentities($_POST['pers_direccion'],ENT_QUOTES);
        $pers_celular=htmlentities($_POST['pers_celular'],ENT_QUOTES);

        if(empty($pais_id_nacionalidad))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: selecciona del pais de nacionalidad ",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
              
        if(empty($pais_id_pregrado))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: selecciona del pais de pregrado",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
              
        if(empty($sexo_id))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: seleccionar el sexo",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        if(empty($reli_id))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: seleccionar la religi&oacute;n",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        if(empty($pers_documento))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe ingresar el n&uacute;mero de documento",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        if(empty($pers_nombres))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo nombres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        
        }    
        if(empty($pers_apellidos))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo apellidos",
        
            ];
                exit(json_encode($arreglo_respuesta));
        
        }
        if(empty($pers_fecha_nacimiento))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe seleccionar la fecha de nacimiento",
        
            ];
                exit(json_encode($arreglo_respuesta));
        
        }
        if(empty($pers_email))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"se debe llenar el campo del correo electr&oacute;nico, si no tiene escriba 'Null'",
        
            ];
                exit(json_encode($arreglo_respuesta));
          
        } 
        else
        {
            
            if($pers_email=='Null')
            {
                $arreglo_respuesta=[
                    "estado"=>"EXITO",
                   
                    "mensaje"=>"Listo",
            
                ];
                    exit(json_encode($arreglo_respuesta));
            }
            else if(!filter_var($pers_email, FILTER_VALIDATE_EMAIL))
            {
                    $arreglo_respuesta=[
                        "estado"=>"ERROR",
                       
                        "mensaje"=>"ERROR: sintaxis equivocada, revisa el correo electr&oacute;nico",
                
                    ];
                        exit(json_encode($arreglo_respuesta));
                
            }
        }
        if(empty($pers_direccion))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo direcci&oacute;n",
        
            ];
                exit(json_encode($arreglo_respuesta));
        
        }
        if(empty($pers_celular))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"ERROR: se debe llenar el campo celular",
        
            ];
                exit(json_encode($arreglo_respuesta));
        
        }

        if(!is_numeric($pers_documento))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Solo se admiten NUMEROS en el documento",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

       

        if(!is_numeric($pers_celular))
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Solo se admiten NUMEROS en el n&uacute;mero de celular",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $size_pers_documento=strlen($pers_documento);
        if($size_pers_documento>15)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres del documento",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        $size_pers_nombres=strlen($pers_nombres);
        if($size_pers_nombres>50)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres en el campo nombres",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        $size_pers_apellidos=strlen($pers_apellidos);
        if($size_pers_apellidos>50)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres en el campo apellidos",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        $size_pers_apellidos=strlen($pers_apellidos);
        if($size_pers_apellidos>50)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres en el campo apellidos",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $size_pers_email=strlen($pers_email);
        if($size_pers_email>100)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres en el correo electr&oacute;nico",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        
        $size_pers_direccion=strlen($pers_direccion);
        if($size_pers_direccion>100)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres en el campo direcci&oacute;n",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }
        $size_pers_celular=strlen($pers_celular);
        if($size_pers_celular>10)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
               
                "mensaje"=>"Se excedi&oacute; en la cantidad de car&aacute;cteres en el n&acute;mero de celular",
        
            ];
                exit(json_encode($arreglo_respuesta));
        }

        $arreglo_personas=$personas_MO->seleccionarPers($pers_documento);
        if($arreglo_personas)
        {
            $arreglo_respuesta=[
                "estado"=>"ERROR",
                "mensaje"=>"El $pers_documento ya esta registrado",
              
            ];
            exit(json_encode($arreglo_respuesta));
        }


        $personas_MO->actualizar($pers_id,$pais_id_nacionalidad,$pais_id_pregrado,$sexo_id,$reli_id,$pers_documento,$pers_nombres,$pers_apellidos,$pers_fecha_nacimiento,$pers_email,$pers_direccion,$pers_celular);

        $pers_id=$conexion->lastInsertId();
    
        $arreglo_respuesta=[
            "estado"=>"EXITO",
            "mensaje"=>"Registro actualizado",
           
        ];
            echo json_encode($arreglo_respuesta);

        
    }
}
?>