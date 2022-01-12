<?php
class personas_VI
{
    function __construct(){}

    function agregar()
    {
        require_once "modelos/personas_MO.php";
        require_once "modelos/paises_MO.php";
        require_once "modelos/sexos_MO.php";
        require_once "modelos/religiones_MO.php";

        $conexion=new conexion('sel');

        $personas_MO=new personas_MO($conexion);
        $paises_MO=new paises_MO($conexion);
        $sexos_MO=new sexos_MO($conexion);
        $religiones_MO=new religiones_MO ($conexion);

        $arreglo_personas=$personas_MO->seleccionarPers();
        $arreglo_paises=$paises_MO->seleccionar();
        $arreglo_sexos=$sexos_MO->seleccionar();
        $arreglo_religiones=$religiones_MO->seleccionar();


        ?>
        <div class="card">
        <div class="card-header">
            Agregar personas
        </div>
        <div class="card-body ">
            <form id="formulario_agregar_personas">
            <div class="form-group ">
            <div class="form-row">

                    <div class="col-md-3 col-sm-6 mb-3">
                        <label for="pais_id_nacionalidad">Pa&iacute;s de nacionalidad</label>
                        <select class="form-control" id="pais_id_nacionalidad" name="pais_id_nacionalidad">
                            <option value="" >Seleccionar el pa&iacute;s de nacionalidad</option>
                            <?php
                            
                            if($arreglo_paises)
                            {
                                foreach($arreglo_paises as $objeto_paises)
                                {
                                    $pais_id=$objeto_paises->pais_id;
                                    $pais_nombre =$objeto_paises->pais_nombre;
                                    ?>
                                    
                                    <option value="<?php echo $pais_id;?>"><?php echo $pais_nombre;?></option>

                                    <?php
                                }
                            }

                            ?>
                        
                        
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <label for="pais_id_pregrado">Pa&iacute;s de pregrado</label>
                        <select class="form-control" id="pais_id_pregrado" name="pais_id_pregrado">
                            <option value="">Seleccionar el pa&iacute;s de pregrado</option>
                            <?php
                            
                            if($arreglo_paises)
                            {
                                foreach($arreglo_paises as $objeto_paises)
                                {
                                    $pais_id=$objeto_paises->pais_id;
                                    $pais_nombre =$objeto_paises->pais_nombre;
                                    ?>
                                    
                                    <option value="<?php echo $pais_id;?>"><?php echo $pais_nombre;?></option>

                                    <?php
                                }
                            }

                            ?>
                            
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <label for="sexo_id">Sexo</label>
                        <select class="form-control" id="sexo_id" name="sexo_id">
                            <option value="">Seleccionar el sexo</option>

                            <?php
                            
                            if($arreglo_sexos)
                            {
                                foreach($arreglo_sexos as $objeto_sexos)
                                {
                                    $sexo_id=$objeto_sexos->sexo_id;
                                    $sexo_nombre =$objeto_sexos->sexo_nombre;
                                    ?>
                                    
                                    <option value="<?php echo $sexo_id;?>"><?php echo $sexo_nombre;?></option>

                                    <?php
                                }
                            }

                            ?>
                        
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <label for="reli_id">Religi&oacute;n</label>
                        <select class="form-control" id="reli_id" name="reli_id">
                            <option value="">Seleccionar religi&oacute;n</option>
                            <?php
                            
                            if($arreglo_religiones)
                            {
                                foreach($arreglo_religiones as $objeto_religiones)
                                {
                                    $reli_id=$objeto_religiones->reli_id;
                                    $reli_nombre =$objeto_religiones->reli_nombre;
                                    ?>
                                    
                                    <option value="<?php echo $reli_id;?>"><?php echo $reli_nombre;?></option>

                                    <?php
                                }
                            }

                            ?>
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3" >

                        <label for="pers_documento">N&uacute;mero de documento: </label>
                        <input type="text" class="form-control" id="pers_documento" name="pers_documento"  maxlength="15">
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <label for="pers_nombres">Nombres: </label>
                        <input type="text" class="form-control" id="pers_nombres" name="pers_nombres" maxlength="50" onkeypress="return sololetras(event)">
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <label for="pers_apellidos">Apellidos: </label>
                        <input type="text" class="form-control" id="pers_apellidos" name="pers_apellidos"  maxlength="50" onkeypress="return sololetras(event)">
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">

                        <label for="pers_fecha_nacimiento">Fecha de nacimiento: </label>
                        <input type="date" class="form-control" id="pers_fecha_nacimiento" name="pers_fecha_nacimiento"  required>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <label for="pers_email">Correo electr&oacute;nico: </label>
                        <input type="email" class="form-control" id="pers_email" name="pers_email" maxlength="100">
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <label for="pers_direccion">Direcci&oacute;n: </label>
                        <input type="text" class="form-control" id="pers_direccion" name="pers_direccion" maxlength="100">
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <label for="pers_celular">N&uacute;mero de celular: </label>
                        <input type="text" class="form-control" id="pers_celular" name="pers_celular" maxlength="10">
                    </div>
               
            </div>
            </div>
            <button type="button" onclick="agregarPersonas();" class="btn btn-primary float-right">Agregar</button>
            </form>
        
    </div>
    </div>
       
        <div class="card">
        <div class="card-header">
            Listar Personas
        </div>
        <div class="card-body">
        <div class="table-responsive">

            <table class="table table-success table-bordered">
            <thead>
                <tr>
                <th scope="col">Nacionalidad</th>
                <th scope="col">Pais pregrado</th>
                <th scope="col">Sexo</th>
                <th scope="col">Religi&oacute;n</th>
                <th scope="col">Documento</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Correo electronico</th> 
                <th scope="col">Dirrecci&oacute;n</th>
                <th scope="col">Celular</th>

                <th scope="col" style="text-align:center;">Acci&oacute;n</th>
                </tr>
            </thead>
            <tbody id="lista_personas">
                <?php
              
                foreach($arreglo_personas as $objeto_personas)
                {
                    $pers_id=$objeto_personas->pers_id;
                    $pais_id_nacionalidad=$objeto_personas->pais_id_nacionalidad;
                    $pais_id_pregrado=$objeto_personas->pais_id_pregrado;
                    $sexo_id=$objeto_personas->sexo_id;
                    $reli_id=$objeto_personas->reli_id;
                    $pers_documento=$objeto_personas->pers_documento;
                    $pers_nombres=$objeto_personas->pers_nombres;
                    $pers_apellidos=$objeto_personas->pers_apellidos;
                    $pers_fecha_nacimiento=$objeto_personas->pers_fecha_nacimiento;
                    $pers_email=$objeto_personas->pers_email;
                    $pers_direccion=$objeto_personas->pers_direccion;
                    $pers_celular=$objeto_personas->pers_celular;
                   
                    ?>
                    <tr>
                    <td id="pais_id_nacionalidad_td_<?php echo $pers_id;?>"><?php echo $pais_id_nacionalidad;?></td>

                    <td id="pais_id_pregrado_td_<?php echo $pers_id;?>"><?php echo $pais_id_pregrado;?></td>

                    <td id="sexo_id_td_<?php echo $pers_id;?>"><?php echo $sexo_id;?></td>

                    <td id="reli_id_td_<?php echo $pers_id;?>"><?php echo $reli_id;?></td>

                    <td id="pers_documento_td_<?php echo $pers_id;?>"><?php echo $pers_documento;?></td>

                    <td id="pers_nombres_td_<?php echo $pers_id;?>"><?php echo $pers_nombres;?></td>

                    <td id="pers_apellidos_td_<?php echo $pers_id;?>"><?php echo $pers_apellidos;?></td>

                    <td id="pers_fecha_nacimiento_td_<?php echo $pers_id;?>"><?php echo $pers_fecha_nacimiento;?></td>

                    <td id="pers_email_td_<?php echo $pers_id;?>"><?php echo $pers_email;?></td>

                    <td id="pers_direccion_td_<?php echo $pers_id;?>"><?php echo $pers_direccion;?></td>

                    <td id="pers_celular_td_<?php echo $pers_id;?>"><?php echo $pers_celular;?></td>

                   
                    <td style="text-align:center; cursor:pointer;">
                        <input type="hidden" id="pais_id_nacionalidad_<?php echo $pers_id;?>" value="<?php echo $pais_id_nacionalidad;?>">
                        <input type="hidden" id="pais_id_pregrado_<?php echo $pers_id;?>" value="<?php echo $pais_id_pregrado;?>">
                        <input type="hidden" id="sexo_id_<?php echo $pers_id;?>" value="<?php echo $sexo_id;?>">
                        <input type="hidden" id="reli_id_<?php echo $pers_id;?>" value="<?php echo $reli_id;?>">
                        <input type="hidden" id="pers_documento_<?php echo $pers_id;?>" value="<?php echo $pers_documento;?>">
                        <input type="hidden" id="pers_nombres_<?php echo $pers_id;?>" value="<?php echo $pers_nombres;?>">
                        <input type="hidden" id="pers_apellidos_<?php echo $pers_id;?>" value="<?php echo $pers_apellidos;?>">
                        <input type="hidden" id="pers_fecha_nacimiento_<?php echo $pers_id;?>" value="<?php echo $pers_fecha_nacimiento;?>">
                        <input type="hidden" id="pers_email_<?php echo $pers_id;?>" value="<?php echo $pers_email;?>">
                        <input type="hidden" id="pers_direccion_<?php echo $pers_id;?>" value="<?php echo $pers_direccion;?>">
                        <input type="hidden" id="pers_celular_<?php echo $pers_id;?>" value="<?php echo $pers_celular;?>">

                        <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarPersonas('<?php echo $pers_id;?>')"></i></td-->
                    </tr>
                    <?php
                    
                }
                ?>
          
            </tbody>
            </table>

        </div>
        </div>
        </div>

        <script>
    
       function VerActualizarPersonas(pers_id)
       {
        let pais_id_nacionalidad=document.querySelector('#pais_id_nacionalidad_'+pers_id).value;
        let pais_id_pregrado=document.querySelector('#pais_id_pregrado_'+pers_id).value;
        let sexo_id=document.querySelector('#sexo_id_'+pers_id).value;
        let reli_id=document.querySelector('#reli_id_'+pers_id).value;
        let pers_documento=document.querySelector('#pers_documento_'+pers_id).value;
        let pers_nombres=document.querySelector('#pers_nombres_'+pers_id).value;
        let pers_apellidos=document.querySelector('#pers_apellidos_'+pers_id).value;
        let pers_fecha_nacimiento=document.querySelector('#pers_fecha_nacimiento_'+pers_id).value;
        let pers_email=document.querySelector('#pers_email_'+pers_id).value;
        let pers_direccion=document.querySelector('#pers_direccion_'+pers_id).value;
        let pers_celular=document.querySelector('#pers_celular_'+pers_id).value;
   

        let formulario=` 
        <div class="card">
         <div class="card-header">
            Actualizar personas
         </div>
            <form id="formulario_actualizar_personas">
                <div class="form-group">
                <div class="form-row">

                        <div class="col-md-3 col-sm-6 mb-3">
                            <label for="pais_id_nacionalidad">Pa&iacute;s de nacionalidad</label>
                            <select class="form-control" id="pais_id_nacionalidad" name="pais_id_nacionalidad">
                                <option value="" >Seleccionar el pa&iacute;s de nacionalidad</option>
                                <?php
                                
                                if($arreglo_paises)
                                {
                                    foreach($arreglo_paises as $objeto_paises)
                                    {
                                        $pais_id=$objeto_paises->pais_id;
                                        $pais_nombre =$objeto_paises->pais_nombre;
                                        ?>
                                        
                                        <option value="<?php echo $pais_id;?>"><?php echo $pais_nombre;?></option>

                                        <?php
                                    }
                                }

                                ?>
                            
                            
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <label for="pais_id_pregrado">Pa&iacute;s de pregrado</label>
                            <select class="form-control" id="pais_id_pregrado" name="pais_id_pregrado">
                                <option value="">Seleccionar el pa&iacute;s de pregrado</option>
                                <?php
                                
                                if($arreglo_paises)
                                {
                                    foreach($arreglo_paises as $objeto_paises)
                                    {
                                        $pais_id=$objeto_paises->pais_id;
                                        $pais_nombre =$objeto_paises->pais_nombre;
                                        ?>
                                        
                                        <option value="<?php echo $pais_id;?>"><?php echo $pais_nombre;?></option>

                                        <?php
                                    }
                                }

                                ?>
                                
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <label for="sexo_id">Sexo</label>
                            <select class="form-control" id="sexo_id" name="sexo_id">
                                <option value="">Seleccionar el sexo</option>

                                <?php
                                
                                if($arreglo_sexos)
                                {
                                    foreach($arreglo_sexos as $objeto_sexos)
                                    {
                                        $sexo_id=$objeto_sexos->sexo_id;
                                        $sexo_nombre =$objeto_sexos->sexo_nombre;
                                        ?>
                                        
                                        <option value="<?php echo $sexo_id;?>"><?php echo $sexo_nombre;?></option>

                                        <?php
                                    }
                                }

                                ?>
                            
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <label for="reli_id">Religi&oacute;n</label>
                            <select class="form-control" id="reli_id" name="reli_id">
                                <option value="">Seleccionar religi&oacute;n</option>
                                <?php
                                
                                if($arreglo_religiones)
                                {
                                    foreach($arreglo_religiones as $objeto_religiones)
                                    {
                                        $reli_id=$objeto_religiones->reli_id;
                                        $reli_nombre =$objeto_religiones->reli_nombre;
                                        ?>
                                        
                                        <option value="<?php echo $reli_id;?>"><?php echo $reli_nombre;?></option>

                                        <?php
                                    }
                                }

                                ?>
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3" >

                            <label for="pers_documento">N&uacute;mero de documento: </label>
                            <input type="text" class="form-control" id="pers_documento" name="pers_documento"  value="${pers_documento}" maxlength="15">
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <label for="pers_nombres">Nombres: </label>
                            <input type="text" class="form-control" id="pers_nombres" name="pers_nombres" value="${pers_nombres}" maxlength="50" onkeypress="return sololetras(event)">
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <label for="pers_apellidos">Apellidos: </label>
                            <input type="text" class="form-control" id="pers_apellidos" name="pers_apellidos"  value="${pers_apellidos}" maxlength="50" onkeypress="return sololetras(event)">
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">

                            <label for="pers_fecha_nacimiento">Fecha de nacimiento: </label>
                            <input type="date" class="form-control" id="pers_fecha_nacimiento" name="pers_fecha_nacimiento"  >
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <label for="pers_email">Correo electr&oacute;nico: </label>
                            <input type="email" class="form-control" id="pers_email" name="pers_email"  value="${pers_email}" maxlength="100">
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <label for="pers_direccion">Direcci&oacute;n: </label>
                            <input type="text" class="form-control" id="pers_direccion" name="pers_direccion"  value="${pers_direccion}" maxlength="100">
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <label for="pers_celular">N&uacute;mero de celular: </label>
                            <input type="text" class="form-control" id="pers_celular" name="pers_celular" maxlength="10"  value="${pers_celular}">
                        </div>

                        </div>
                </div>

                <input type="hidden" id="pers_id" name="pers_id" value="${pers_id}"/>

                <button type="button" onclick="actualizarPersonas('${pers_id}');" class="btn btn-primary float-right">Actualizar</button>
               </form>
        </dv>
      
     
        `;
        document.querySelector('#ventana_modal_contenido').innerHTML=formulario;
       }




        function actualizarPersonas(pers_id)
        {
          
           let cadena = new FormData(document.querySelector('#formulario_actualizar_personas'));
         
         fetch('personas_CO/actualizar',{
             method:'POST',
             body: cadena
         })
         .then(respuesta=>respuesta.json())
         .then(respuesta=>{

             
               let pais_id_nacionalidad=document.querySelector('#formulario_actualizar_personas #pais_id_nacionalidad').value;
               let pais_id_pregrado=document.querySelector('#formulario_actualizar_personas #pais_id_pregrado').value;
               let sexo_id=document.querySelector('#formulario_actualizar_personas #sexo_id').value;
               let reli_id=document.querySelector('#formulario_actualizar_personas #reli_id').value;
               let pers_documento=document.querySelector('#formulario_actualizar_personas #pers_documento').value;
               let pers_nombres=document.querySelector('#formulario_actualizar_personas #pers_nombres').value;
               let pers_apellidos=document.querySelector('#formulario_actualizar_personas #pers_apellidos').value;
               let pers_fecha_nacimiento=document.querySelector('#formulario_actualizar_personas #pers_fecha_nacimiento').value;
               let pers_email=document.querySelector('#formulario_actualizar_personas #pers_email').value;
               let pers_direccion=document.querySelector('#formulario_actualizar_personas #pers_direccion').value;
               let pers_celular=document.querySelector('#formulario_actualizar_personas #pers_celular').value;
         
            if(respuesta.estado=='EXITO')
            {
             document.querySelector('#pais_id_nacionalidad_td_'+pers_id).innerHTML=pais_id_nacionalidad;
             document.querySelector('#pais_id_nacionalidad_'+pers_id).value=pais_id_nacionalidad;

             document.querySelector('#pais_id_pregrado_td_'+pers_id).innerHTML=pais_id_pregrado;
             document.querySelector('#pais_id_pregrado_'+pers_id).value=pais_id_pregrado;

             document.querySelector('#sexo_id_td_'+pers_id).innerHTML=sexo_id;
             document.querySelector('#sexo_id_'+pers_id).value=sexo_id;

             document.querySelector('#reli_id_td_'+pers_id).innerHTML=reli_id;
             document.querySelector('#reli_id_'+pers_id).value=reli_id;

             document.querySelector('#pers_documento_td_'+pers_id).innerHTML=pers_documento;
             document.querySelector('#pers_documento_'+pers_id).value=pers_documento;

             document.querySelector('#pers_nombres_td_'+pers_id).innerHTML=pers_nombres;
             document.querySelector('#pers_nombres_'+pers_id).value=pers_nombres;

             document.querySelector('#pers_apellidos_td_'+pers_id).innerHTML=pers_apellidos;
             document.querySelector('#pers_apellidos_'+pers_id).value=pers_apellidos;

             document.querySelector('#pers_fecha_nacimiento_td_'+pers_id).innerHTML=pers_fecha_nacimiento;
             document.querySelector('#pers_fecha_nacimiento_'+pers_id).value=pers_fecha_nacimiento;

             document.querySelector('#pers_email_td_'+pers_id).innerHTML=pers_email;
             document.querySelector('#pers_email_'+pers_id).value=pers_email;

             document.querySelector('#pers_direccion_td_'+pers_id).innerHTML=pers_direccion;
             document.querySelector('#pers_direccion_'+pers_id).value=pers_direccion;

             document.querySelector('#pers_celular_td_'+pers_id).innerHTML=pers_celular;
             document.querySelector('#pers_celular_'+pers_id).value=pers_celular;
           
        
           

             toastr.success(respuesta.mensaje);

            
            }
            else if(respuesta.estado=='ERROR')
            {
             toastr.error(respuesta.mensaje);
            }
         });
        }



        function agregarPersonas()
        {

           let cadena = new FormData(document.querySelector('#formulario_agregar_personas'));
         
            fetch('personas_CO/agregar',{
                method:'POST',
                body: cadena
            })
            .then(respuesta=>respuesta.json())
            .then(respuesta=>{
             
                if(respuesta.estado=='EXITO')
               {
                    let pers_id=respuesta.pers_id;
                    let pais_id_nacionalidad=document.querySelector('#formulario_agregar_personas #pais_id_nacionalidad').value;
                    let pais_id_pregrado=document.querySelector('#formulario_agregar_personas #pais_id_pregrado').value;
                    let sexo_id=document.querySelector('#formulario_agregar_personas #sexo_id').value;
                    let reli_id=document.querySelector('#formulario_agregar_personas #reli_id').value;
                    let pers_documento=document.querySelector('#formulario_agregar_personas #pers_documento').value;
                    let pers_nombres=document.querySelector('#formulario_agregar_personas #pers_nombres').value;
                    let pers_apellidos=document.querySelector('#formulario_agregar_personas #pers_apellidos').value;
                    let pers_fecha_nacimiento=document.querySelector('#formulario_agregar_personas #pers_fecha_nacimiento').value;
                    let pers_email=document.querySelector('#formulario_agregar_personas #pers_email').value;
                    let pers_direccion=document.querySelector('#formulario_agregar_personas #pers_direccion').value;
                    let pers_celular=document.querySelector('#formulario_agregar_personas #pers_celular').value;
           

                let fila=`

                <tr>
                <td id="pais_id_nacionalidad_td_${pers_id}" >${pais_id_nacionalidad}</td>
                <td id="pais_id_pregrado_td_${pers_id}">${pais_id_pregrado}</td>
                <td id="sexo_id_td_${pers_id}">${sexo_id}</td>
                <td id="reli_id_td_${pers_id}">${reli_id}</td>
                <td id="pers_documento_td_${pers_id}" >${pers_documento}</td>
                <td id="pers_nombres_td_${pers_id}">${pers_nombres}</td>
                <td id="pers_apellidos_td_${pers_id}">${pers_apellidos}</td>
                <td  id="pers_fecha_nacimiento_td_${pers_id}">${pers_fecha_nacimiento}</td>
                <td id="pers_email_td_${pers_id}">${pers_email}</td>
                <td id="pers_direccion_td_${pers_id}">${pers_direccion}</td>
                <td id="pers_celular_td_${pers_id}" >${pers_celular}</td>
               
                <td style="text-align:center; cursor:pointer;">
                    <input type="hidden" id="pais_id_nacionalidad_${pers_id}" value="${pais_id_nacionalidad}">
                    <input type="hidden" id="pais_id_pregrado_${pers_id}" value="${pais_id_pregrado}">
                    <input type="hidden" id="sexo_id_${pers_id}" value="${sexo_id}">
                    <input type="hidden" id="reli_id_${pers_id}" value="${reli_id}">
                    <input type="hidden" id="pers_documento_${pers_id}" value="${pers_documento}">
                    <input type="hidden" id="pers_nombres_${pers_id}" value="${pers_nombres}">
                    <input type="hidden" id="pers_apellidos_${pers_id}" value="${pers_apellidos}">
                    <input type="hidden" id="pers_fecha_nacimiento_${pers_id}" value="${pers_fecha_nacimiento}">
                    <input type="hidden" id="pers_email_${pers_id}" value="${pers_email}">
                    <input type="hidden" id="pers_direccion_${pers_id}" value="${pers_direccion}">
                    <input type="hidden" id="pers_celular_${pers_id}" value="${pers_celular}">

               
                    <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarPersonas('${pers_id}')"></i></td>

                </tr>
                `;

                document.querySelector('#lista_personas').insertAdjacentHTML('afterbegin',fila);

                document.querySelector('#formulario_agregar_personas').reset();

                toastr.success(respuesta.mensaje);

               
               }
               else if(respuesta.estado=='ERROR')
               {
                toastr.error(respuesta.mensaje);
               }
            });
        
        }
        </script>
        <script type="text/javascript">
    
            function sololetras(e){
            
            key=e.keyCode || e.which;
            
            teclado = String.fromCharCode(key).toLowerCase();
            
            letras = " abcdefghijklmnñopqrstuvwxyz";
            
            especiales = " 8-37-38-46-164";
            
            teclado_especial = false;
            
            for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true; break;
            
            }}
            
            
            if(letras.indexOf(teclado)==-1 && !teclado_especial){
            return false;
            
            
            }
            
            }
      </script>
        <?php
    }
}
?>
