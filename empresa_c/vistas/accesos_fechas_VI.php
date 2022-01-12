<?php
class accesos_fechas_VI
{
    function __construct(){}

    function agregar()
    {
        require_once "modelos/accesos_fechas_MO.php";
        require_once "modelos/dar_accesos_MO.php";

        $conexion=new conexion('sel');
        $accesos_fechas_MO=new accesos_fechas_MO($conexion);
        $dar_accesos_MO=new dar_accesos_MO($conexion);

        $arreglo_accesos_fechas=$accesos_fechas_MO->seleccionar();
        $arreglo_accesos=$dar_accesos_MO->seleccionar();


        ?>
        <div class="card">
        <div class="card-header">
            Agregar fechas para accesos
        </div>
        <div class="card-body ">
            <form id="formulario_agregar_accesos_fechas">
            <div class="form-group ">
            <div class="form-row">

                <div class="col-md-3 mb-3">
                <label for="acce_id">Usuario:</label>
                <select class="form-control" id="acce_id" name="acce_id">
                    <option value="" >Seleccionar usuario</option>
                    <?php
                            
                            if($arreglo_accesos)
                            {
                                foreach($arreglo_accesos as $objeto_accesos)
                                {
                                    $acce_id=$objeto_accesos->acce_id;
                                    $acce_usuario =$objeto_accesos->acce_usuario;
                                    ?>
                                    
                                    <option value="<?php echo $acce_id;?>"><?php echo $acce_usuario;?></option>

                                    <?php
                                }
                            }

                            ?>
               
                </select>
               </div>
                <div class="col-md-3 mb-3">

                <label for="acfe_fecha_desde">Fecha desde: </label>
                <input type="date" class="form-control" id="acfe_fecha_desde" name="acfe_fecha_desde" >
                </div>
               
                <div class="col-md-3 mb-3">
                <label for="acfe_fecha_hasta">Fecha hasta: </label>
                <input type="date" class="form-control" id="acfe_fecha_hasta" name="acfe_fecha_hasta">
                </div>
            
               
            </div>
            <button type="button" onclick="agregarAccesosFechas();" class="btn btn-primary float-right">Agregar</button>
            </form>
        
    </div>
    </div>
       
        <div class="card">
        <div class="card-header">
            Listar fechas de accesos
        </div>
        <div class="card-body">
        <div class="table-responsive">

            <table class="table table-success table-bordered">
            <thead>
                <tr>
                <th scope="col">Accesos</th>
                 <th scope="col">Fecha desde</th>
                <th scope="col">Fecha hasta</th>

                <th scope="col" style="text-align:center;">Acci&oacute;n</th>
                </tr>
            </thead>
            <tbody id="lista_accesos_fechas">
                <?php
              
                foreach($arreglo_accesos_fechas as $objeto_accesos_fechas)
                {
                    $acfe_id=$objeto_accesos_fechas->acfe_id;
                    $acce_id=$objeto_accesos_fechas->acce_id;
                    $acfe_fecha_desde=$objeto_accesos_fechas->acfe_fecha_desde;
                    $acfe_fecha_hasta=$objeto_accesos_fechas->acfe_fecha_hasta;
                   
                    ?>
                    <tr>
                    <td id="acce_id_td_<?php echo $acfe_id;?>"><?php echo $acce_id;?></td>

                    <td id="acfe_fecha_desde_td_<?php echo $acfe_id;?>"><?php echo $acfe_fecha_desde;?></td>

                    <td id="acfe_fecha_hasta_td_<?php echo $acfe_id;?>"><?php echo $acfe_fecha_hasta;?></td>

                    <td style="text-align:center; cursor:pointer;">
                        <input type="hidden" id="acce_id_<?php echo $acfe_id;?>" value="<?php echo $acce_id;?>">
                        <input type="hidden" id="acfe_fecha_desde_<?php echo $acfe_id;?>" value="<?php echo $acfe_fecha_desde;?>">
                        <input type="hidden" id="acfe_fecha_hasta_<?php echo $acfe_id;?>" value="<?php echo $acfe_fecha_hasta;?>">
                        <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarAccesosFechas('<?php echo $acfe_id;?>')"></i></td-->
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
    
       function VerActualizarAccesosFechas(acfe_id)
       {
        let acce_id=document.querySelector('#acce_id_'+acfe_id).value;
        let acfe_fecha_desde=document.querySelector('#acfe_fecha_desde_'+acfe_id).value;
        let acfe_fecha_hasta=document.querySelector('#acfe_fecha_hasta_'+acfe_id).value;
   

        let formulario=` 
        <div class="card">
         <div class="card-header">
            Actualizar fechas de accesos
         </div>
            <form id="formulario_actualizar_accesos_fechas">
                <div class="form-group">
                    <div class="col-md-3 mb-3">
                    <label for="acce_id">Usuario:</label>
                    <select class="form-control" id="acce_id" name="acce_id">
                        <option value="" >Seleccionar usuario</option>
                        <?php
                                
                                if($arreglo_accesos)
                                {
                                    foreach($arreglo_accesos as $objeto_accesos)
                                    {
                                        $acce_id=$objeto_accesos->acce_id;
                                        $acce_usuario =$objeto_accesos->acce_usuario;
                                        ?>
                                        
                                        <option value="<?php echo $acce_id;?>"><?php echo $acce_usuario;?></option>

                                        <?php
                                    }
                                }

                                ?>
                
                    </select>
                    </div>
                    <div class="col-md-3 mb-3">

                    <label for="acfe_fecha_desde">Fecha desde: </label>
                    <input type="date" class="form-control" id="acfe_fecha_desde" name="acfe_fecha_desde"  >
                    </div>
                
                    <div class="col-md-3 mb-3">
                    <label for="acfe_fecha_hasta">Fecha hasta: </label>
                    <input type="date" class="form-control" id="acfe_fecha_hasta" name="acfe_fecha_hasta" >
                    </div>
            
                </div>

                <input type="hidden" id="acfe_id" name="acfe_id" value="${acfe_id}"/>

                <button type="button" onclick="actualizarAccesosFechas('${acfe_id}');" class="btn btn-primary float-right">Actualizar</button>
               </form>
        </dv>
      
     
        `;
        document.querySelector('#ventana_modal_contenido').innerHTML=formulario;
       }




        function actualizarAccesosFechas(acfe_id)
        {
          
           let cadena = new FormData(document.querySelector('#formulario_actualizar_accesos_fechas'));
         
         fetch('accesos_fechas_CO/actualizar',{
             method:'POST',
             body: cadena
         })
         .then(respuesta=>respuesta.json())
         .then(respuesta=>{
            
            let acce_id=document.querySelector('#formulario_actualizar_accesos_fechas #acce_id').value;
            let acfe_fecha_desde=document.querySelector('#formulario_actualizar_accesos_fechas #acfe_fecha_desde').value;
            let acfe_fecha_hasta=document.querySelector('#formulario_actualizar_accesos_fechas #acfe_fecha_hasta').value;
           
            if(respuesta.estado=='EXITO')
            {
             document.querySelector('#acce_id_td_'+acfe_id).innerHTML=acce_id;
             document.querySelector('#acce_id_'+acfe_id).value=acce_id;

             document.querySelector('#acfe_fecha_desde_td_'+acfe_id).innerHTML=acfe_fecha_desde;
             document.querySelector('#acfe_fecha_desde_'+acfe_id).value=acfe_fecha_desde;

             document.querySelector('#acfe_fecha_hasta_td_'+acfe_id).innerHTML=acfe_fecha_hasta;
             document.querySelector('#acfe_fecha_hasta_'+acfe_id).value=acfe_fecha_hasta;
           

             toastr.success(respuesta.mensaje);

            
            }
            else if(respuesta.estado=='ERROR')
            {
             toastr.error(respuesta.mensaje);
            }
         });
        }



        function agregarAccesosFechas()
        {

           let cadena = new FormData(document.querySelector('#formulario_agregar_accesos_fechas'));
         
            fetch('accesos_fechas_CO/agregar',{
                method:'POST',
                body: cadena
            })
            .then(respuesta=>respuesta.json())
            .then(respuesta=>{
             
                if(respuesta.estado=='EXITO')
               {
                let acfe_id=respuesta.acfe_id;
                let acce_id=document.querySelector('#formulario_agregar_accesos_fechas #acce_id').value;
                let acfe_fecha_desde=document.querySelector('#formulario_agregar_accesos_fechas #acfe_fecha_desde').value;
                let acfe_fecha_hasta=document.querySelector('#formulario_agregar_accesos_fechas #acfe_fecha_hasta').value;
              

                let fila=`

                <tr>
                <td id="acce_id_td_${acfe_id}">${acce_id}</td>
                <td id="acfe_fecha_desde_td_${acfe_id}">${acfe_fecha_desde}</td>
                <td id="acfe_fecha_hasta_td_${acfe_id}">${acfe_fecha_hasta}</td>
                <td style="text-align:center; cursor:pointer;">
                    <input type="hidden" id="acce_id_${acfe_id}" value="${acce_id}">
                    <input type="hidden" id="acfe_fecha_desde_${acfe_id}" value="${acfe_fecha_desde}">
                    <input type="hidden" id="acfe_fecha_hasta_${acfe_id}" value="${acfe_fecha_hasta}">
                    <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarAccesosFechas('${acfe_id}')"></i></td>

                </tr>
                `;

                document.querySelector('#lista_accesos_fechas').insertAdjacentHTML('afterbegin',fila);

                document.querySelector('#formulario_agregar_accesos_fechas').reset();

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
