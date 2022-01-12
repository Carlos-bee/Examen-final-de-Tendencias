<?php
class personas_deportes_VI
{
    function __construct(){}

    function agregar()
    {
        require_once "modelos/personas_deportes_MO.php";
        require_once "modelos/personas_MO.php";
        require_once "modelos/deportes_MO.php";

        $conexion=new conexion('sel');

        $personas_deportes_MO=new personas_deportes_MO($conexion);
        
        $personas_MO=new personas_MO($conexion);
       
        $deportes_MO=new deportes_MO($conexion);
        
        $arreglo_personas_deportes=$personas_deportes_MO->seleccionar();

        $arreglo_personas=$personas_MO->seleccionarPers();
       
        $arreglo_deportes=$deportes_MO->seleccionar();

                ?>
        <div class="card">
            <div class="card-header">
                Agregar deportes de una persona
            </div>
            <div class="card-body ">
                <form id="formulario_agregar_personas_deportes">
                     <div class="form-group ">
                        <div class="form-row">

                            <div class="col-md-3 mb-3">
                                 <label for="depo_id">Deporte</label>
                                 <select class="form-control" id="depo_id" name="depo_id">
                                    <option value="">Seleccionar deporte</option>
                                     <?php
                                        
                                        if($arreglo_deportes)
                                        {
                                            foreach($arreglo_deportes as $objeto_deportes)
                                            {
                                                $depo_id=$objeto_deportes->depo_id;
                                                $depo_nombre =$objeto_deportes->depo_nombre;
                                                ?>
                                                
                                                <option value="<?php echo $depo_id;?>"><?php echo $depo_nombre;?></option>

                                                <?php
                                            }
                                        }

                                        ?>
                        
                                 </select>
                            </div>

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
                            </div>
                         <button type="button" onclick="agregarPersonasDeportes();" class="btn btn-primary float-right">Agregar</button>
                  </form>
        
             </div>
         </div>
       
         <div class="card">
                <div class="card-header">
                    Listar personas y deportes
                </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-success table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Deporte </th>
                                <th scope="col">Persona</th>
                                <th scope="col" style="text-align:center;">Acci&oacute;n</th>
                            </tr>
                     </thead>
                     <tbody id="lista_personas_deportes">
                                <?php
                            
                                foreach($arreglo_personas_deportes as $objeto_personas_deportes)
                                {
                                    $pede_id=$objeto_personas_deportes->pede_id;
                                    $depo_id=$objeto_personas_deportes->depo_id;
                                    $pers_id=$objeto_personas_deportes->pers_id;
                                
                                    ?>
                                    <tr>
                                    <td id="depo_id_td_<?php echo $pede_id;?>"><?php echo $depo_id;?></td>

                                    <td id="pers_id_td_<?php echo $pede_id;?>"><?php echo $pers_id;?></td>

                                    <td style="text-align:center; cursor:pointer;">
                                        <input type="hidden" id="depo_id_<?php echo $pede_id;?>" value="<?php echo $depo_id;?>">
                                        <input type="hidden" id="pers_id_<?php echo $pede_id;?>" value="<?php echo $pers_id;?>">
                                        <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarPersonasDeportes('<?php echo $pede_id;?>')"></i></td-->
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
        
       function VerActualizarPersonasDeportes(pede_id)
       {
            let depo_id = document.querySelector('#depo_id_'+pede_id).value;
            let pers_id = document.querySelector('#pers_id_'+pede_id).value;
        

            let formulario=` 
            <div class="card">
            <div class="card-header">
                Actualizar personas y deportes
            </div>
                <form id="formulario_actualizar_personas_deportes">
                    <div class="form-group">
                        
                    <div class="col-md-3 mb-3">
                    <label for="depo_id">Deporte</label>
                    <select class="form-control" id="depo_id" name="depo_id">
                        <option value="">Seleccionar deporte</option>
                        <?php
                                
                                if($arreglo_deportes)
                                {
                                    foreach($arreglo_deportes as $objeto_deportes)
                                    {
                                        $depo_id=$objeto_deportes->depo_id;
                                        $depo_nombre =$objeto_deportes->depo_nombre;
                                        ?>
                                        
                                        <option value="<?php echo $depo_id;?>"><?php echo $depo_nombre;?></option>

                                        <?php
                                    }
                                }

                                ?>
                
                    </select>
                </div>

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
            
                    <input type="hidden" id="pede_id" name="pede_id" value="${pede_id}"/>
                

                    <button type="button" onclick="actualizarPersonasDeportes('${pede_id}');" class="btn btn-primary float-right">Actualizar</button>
                    </div>
            </form>
            
        
        
            `;
            document.querySelector('#ventana_modal_contenido').innerHTML=formulario;
       }




        function actualizarPersonasDeportes(pede_id)
        {
          
           let cadena = new FormData(document.querySelector('#formulario_actualizar_personas_deportes'));
         
             fetch('personas_deportes_CO/actualizar',{
             method:'POST',
             body: cadena
             })
            .then(respuesta=>respuesta.json())
            .then(respuesta=>{
            
            let depo_id=document.querySelector('#formulario_actualizar_personas_deportes #depo_id').value;
            let pers_id=document.querySelector('#formulario_actualizar_personas_deportes #pers_id').value;
          
            
            if(respuesta.estado=='EXITO')
            {
             document.querySelector('#depo_id_td_'+pede_id).innerHTML=depo_id;
             document.querySelector('#depo_id_'+pede_id).value=depo_id;
             document.querySelector('#pers_id_td_'+pede_id).innerHTML=pers_id;
             document.querySelector('#pers_id_'+pede_id).value=pers_id;
           
           

             toastr.success(respuesta.mensaje);

            
            }
            else if(respuesta.estado=='ERROR')
            {
             toastr.error(respuesta.mensaje);
            }
         });
        }



        function agregarPersonasDeportes()
        {

           let cadena = new FormData(document.querySelector('#formulario_agregar_personas_deportes'));
         
            fetch('personas_deportes_CO/agregar',{
                method:'POST',
                body: cadena
            })
                .then(respuesta=>respuesta.json())
                .then(respuesta=>{

            
               
               if(respuesta.estado=='EXITO')
               {
                let pede_id=respuesta.pede_id;
              
                let depo_id=document.querySelector('#formulario_agregar_personas_deportes #depo_id').value;
                let pers_id=document.querySelector('#formulario_agregar_personas_deportes #pers_id').value;

                let fila=`

                <tr>
                <td id="depo_id_td_${pede_id}" >${depo_id}</td>
                <td id="pers_id_td_${pede_id}" >${pers_id}</td>
                <td style="text-align:center; cursor:pointer;">
                    <input type="hidden" id="depo_id_${pede_id}" value="${depo_id}">
                    <input type="hidden" id="pers_id_${pede_id}" value="${pers_id}">
                    <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarPersonasDeportes('${pede_id}')"></i></td>

                </tr>
                `;

               
                document.querySelector('#lista_personas_deportes').insertAdjacentHTML('afterbegin',fila);

                document.querySelector('#formulario_agregar_personas_deportes').reset();

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
