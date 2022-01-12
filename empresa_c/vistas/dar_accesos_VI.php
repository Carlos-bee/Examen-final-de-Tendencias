<?php
class dar_accesos_VI
{
    function __construct(){}

    function agregar()
    {
        require_once "modelos/personas_MO.php";
        require_once "modelos/dar_accesos_MO.php";

        $conexion=new conexion('sel');

        $dar_accesos_MO=new dar_accesos_MO($conexion);
        $personas_MO=new personas_MO($conexion);

        $arreglo_accesos=$dar_accesos_MO->seleccionar();
        $arreglo_personas=$personas_MO->seleccionarPers();
        
                ?>

        <div class="card">
        <div class="card-header">
             Agregar accesos
                
             <div class="card-body ">
               <form id="formulario_agregar_dar_accesos">
                    <div class="form-group ">
                        <div class="form-row">

                            <div class="col-md-3 mb-3">
                                <label for="pers_id">Persona</label>
                                <select class="form-control" id="pers_id" name="pers_id">
                                    <option value="">Seleccionar persona</option>
                                    <?php
                                    
                                    if($arreglo_personas)
                                    {
                                        foreach($arreglo_personas as $objeto_personas)
                                        {
                                            $pers_id=$objeto_personas->pers_id;
                                            $pers_nombres =$objeto_personas->pers_nombres;
                                            ?>
                                            
                                            <option value="<?php echo $pers_id;?>"><?php echo $pers_nombres;?></option>

                                            <?php
                                        }
                                    }

                                    ?>
                                </select>
                            </div>

                        
                            <div class="col-md-3 mb-3">
                                <label for="acce_usuario">Usuario: </label>
                                <input type="text" class="form-control" id="acce_usuario" name="acce_usuario" maxlength="45" minlength="3">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="acce_clave">Clave: </label>
                                <input type="text" class="form-control" id="acce_clave" name="acce_clave" maxlength="255" minlength="5">
                            </div>

                        
                        </div>
                            <div class="col-sm" >
                                <button type="button" onclick="agregarAccesos();" class="btn btn-primary float-right">Agregar</button>
                            </div>
                  </div>
                        
                </form>
           
        </div>
        
        <div class="card">
            <div class="card-header">
                Listar Accesos
            </div>
             <div class="card-body">
                <div class="table-responsive">

                     <table class="table table-success table-bordered">
                          <thead>
                                <tr>
                                    <th scope="col">Persona</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col"> Clave</th>
                                    <th scope="col" style="text-align:center;">Acci&oacute;n</th>
                                </tr>
                         </thead>
                           <tbody id="lista_accesos">
                                <?php
                            
                                foreach($arreglo_accesos as $objeto_accesos)
                                {
                                    $acce_id=$objeto_accesos->acce_id;
                                    $pers_id=$objeto_accesos->pers_id;
                                    $acce_usuario=$objeto_accesos->acce_usuario;
                                    $acce_clave=$objeto_accesos->acce_clave;
                                
                                    ?>
                                    <tr>
                                        <td id="pers_id_td_<?php echo $acce_id;?>"><?php echo $pers_id;?></td>

                                        <td id="acce_usuario_td_<?php echo $acce_id;?>"><?php echo $acce_usuario;?></td>

                                        <td id="acce_clave_td_<?php echo $acce_id;?>"><?php echo $acce_clave;?></td>

                                        <td style="text-align:center; cursor:pointer;">
                                          <input type="hidden" id="pers_id_<?php echo $acce_id;?>" value="<?php echo $pers_id;?>">
                                          <input type="hidden" id="acce_usuario_<?php echo $acce_id;?>" value="<?php echo $acce_usuario;?>">
                                          <input type="hidden" id="acce_clave_<?php echo $acce_id;?>" value="<?php echo $acce_clave;?>">
                                          <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarAccesos('<?php echo $acce_id;?>')"></i></td>
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
    
       function VerActualizarAccesos(acce_id)
       {
        
            let pers_id = document.querySelector('#pers_id_'+acce_id).value;
            let acce_usuario = document.querySelector('#acce_usuario_'+acce_id).value;
            let acce_clave = document.querySelector('#acce_clave_'+acce_id).value;
        
            let formulario=` 
            <div class="card">
            <div class="card-header">
                Actualizar accesos
            </div>
                <form id="formulario_actualizar_accesos">
                    <div class="form-group">
                    <div class="col-md-3 mb-3">
                            <label for="pers_id">Persona</label>
                            <select class="form-control" id="pers_id" name="pers_id" value="${pers_id}">
                                <option value="">Seleccionar persona</option>
                                <?php
                                
                                if($arreglo_personas)
                                {
                                    foreach($arreglo_personas as $objeto_personas)
                                    {
                                        $pers_id=$objeto_personas->pers_id;
                                        $pers_nombres =$objeto_personas->pers_nombres;
                                        ?>
                                        
                                        <option value="<?php echo $pers_id;?>"><?php echo $pers_nombres;?></option>

                                        <?php
                                    }
                                }

                                ?>
                                </select>
                            </div>

                                
                                <div class="col-md-3 mb-3">
                                    <label for="acce_usuario">Usuario: </label>
                                    <input type="text" class="form-control" id="acce_usuario" name="acce_usuario" value="${acce_usuario}" maxlength="45" minlength="3">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="acce_clave">Clave: </label>
                                    <input type="text" class="form-control" id="acce_clave" name="acce_clave" value="${acce_clave}" maxlength="255" minlength="5">
                                </div>
                    </div>

                    <input type="hidden" id="acce_id" name="acce_id" value="${acce_id}"/>

                    <button type="button" onclick="actualizarAccesos('${acce_id}');" class="btn btn-primary float-right">Actualizar</button>
                    </form>
            </div>
        
        
            `;
            document.querySelector('#ventana_modal_contenido').innerHTML=formulario;
       }

        function actualizarAccesos(acce_id)
        {
          
           let cadena = new FormData(document.querySelector('#formulario_actualizar_accesos'));
         
            fetch('dar_accesos_CO/actualizar',{
                method:'POST',
                body: cadena
            })
            .then(respuesta=>respuesta.json())
            .then(respuesta=>{
                
                let pers_id=document.querySelector('#formulario_actualizar_accesos #pers_id').value;
                let acce_usuario=document.querySelector('#formulario_actualizar_accesos #acce_usuario').value;
                let acce_clave=document.querySelector('#formulario_actualizar_accesos #acce_clave').value;
                
                if(respuesta.estado=='EXITO')
                {
                    document.querySelector('#pers_id_td_'+acce_id).innerHTML=pers_id;
                    document.querySelector('#pers_id_'+acce_id).value=pers_id;

                    document.querySelector('#acce_usuario_td_'+acce_id).innerHTML=acce_usuario;
                    document.querySelector('#acce_usuario_'+acce_id).value=acce_usuario;

                    document.querySelector('#acce_clave_td_'+acce_id).innerHTML=acce_clave;
                    document.querySelector('#acce_clave_'+acce_id).value=acce_clave;
                
                    toastr.success(respuesta.mensaje);
                }
                else if(respuesta.estado=='ERROR')
                {
                toastr.error(respuesta.mensaje);
                }
            });
        }

        function agregarAccesos()
        {

           let cadena = new FormData(document.querySelector('#formulario_agregar_dar_accesos'));
         
            fetch('dar_accesos_CO/agregar',{
                method:'POST',
                body: cadena
            })
                .then(respuesta=>respuesta.json())
                .then(respuesta=>{
                    
                    if(respuesta.estado=='EXITO')
                    {
                        let acce_id=respuesta.acce_id;
                        let pers_id=document.querySelector('#formulario_agregar_dar_accesos #pers_id').value;
                        let acce_usuario=document.querySelector('#formulario_agregar_dar_accesos #acce_usuario').value;
                        let acce_clave=document.querySelector('#formulario_agregar_dar_accesos #acce_clave').value;
                        

                        let fila=`

                        <tr>
                        <td id="pers_id_td_${acce_id}">${pers_id}</td>
                        <td id="acce_usuario_td_${acce_id}">${acce_usuario}</td>
                        <td id="acce_clave_td_${acce_id}">${acce_clave}</td>
                    
                        <td style="text-align:center; cursor:pointer;">
                            <input type="hidden" id="pers_id_${acce_id}" value="${pers_id}">
                            <input type="hidden" id="acce_usuario_${acce_id}" value="${acce_usuario}">
                            <input type="hidden" id="acce_clave_${acce_id}" value="${acce_clave}">
                            <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarAccesos('${acce_id}')"></i></td>

                        </tr>
                        `;

                    
                        document.querySelector('#lista_accesos').insertAdjacentHTML('afterbegin',fila);

                        document.querySelector('#formulario_agregar_dar_accesos').reset();

                        toastr.success(respuesta.mensaje);

                    
                    }
                    else if(respuesta.estado=='ERROR')
                    {
                        toastr.error(respuesta.mensaje);
                    }
                });
        
        }
        </script>
        <?php
    }
}
?>
