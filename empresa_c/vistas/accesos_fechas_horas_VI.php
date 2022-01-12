<?php
class accesos_fechas_horas_VI
{
    function __construct(){}

    function agregar()
    {
        require_once "modelos/accesos_fechas_horas_MO.php";
        require_once "modelos/accesos_fechas_MO.php";


        $conexion=new conexion('sel');

        $accesos_fechas_horas_MO=new accesos_fechas_horas_MO($conexion);

        $accesos_fechas_MO=new accesos_fechas_MO($conexion);

        $arreglo_accesos_fechas_horas=$accesos_fechas_horas_MO->seleccionar();

        $arreglo_accesos_fechas=$accesos_fechas_MO->seleccionar();

        ?>
        <div class="card">
        <div class="card-header">
            Agregar fechas horas para accesos
        </div>
        <div class="card-body ">
            <form id="formulario_agregar_accesos_fechas_horas">
            <div class="form-group ">
            <div class="form-row">

                <div class="col-md-3 mb-3">
                <label for="acfe_id">Acceso fechas:</label>
                <select class="form-control" id="acfe_id" name="acfe_id">
                    <option value="">Seleccionar fechas</option>
                    <?php
                            
                            if($arreglo_accesos_fechas)
                            {
                                foreach($arreglo_accesos_fechas as $objeto_accesos_fechas)
                                {
                                    $acfe_id=$objeto_accesos_fechas->acfe_id;
                                    $acfe_fecha_desde =$objeto_accesos_fechas->acfe_fecha_desde;
                                    ?>
                                    
                                    <option value="<?php echo $acfe_id;?>"><?php echo  $acfe_fecha_desde;?></option>

                                    <?php
                                }
                            }

                            ?>
                </select>
               </div>
                <div class="col-md-3 mb-3">

                <label for="acfh_hora_desde">Hora desde: </label>
                <input type="text" class="form-control" id="acfh_hora_desde" name="acfh_hora_desde" placeholder="HORA:MINUTO - 00:00 a 24:00" maxlength="5"  >
                </div>
               
                <div class="col-md-3 mb-3">
                <label for="acfh_hora_hasta">Hora hasta: </label>
                <input type="text" class="form-control" id="acfh_hora_hasta" name="acfh_hora_hasta" placeholder="HORA:MINUTO - 00:00 a 24:00" maxlength="5" >
                </div>
            
               
            </div>
            <button type="button" onclick="agregarAccesosHoras();" class="btn btn-primary float-right">Agregar</button>
            </form>
        
    </div>
    </div>
       
        <div class="card">
        <div class="card-header">
            Listar horas de accesos
        </div>
        <div class="card-body">
        <div class="table-responsive">

            <table class="table table-success table-bordered">
            <thead>
                <tr>
                <th scope="col">Fecha de acceso</th>
                 <th scope="col">Hora desde</th>
                <th scope="col">Hora hasta</th>

                <th scope="col" style="text-align:center;">Acci&oacute;n</th>
                </tr>
            </thead>
            <tbody id="lista_accesos_fechas_horas">
                <?php
              
                foreach($arreglo_accesos_fechas_horas as $objeto_accesos_fechas_horas)
                {
                    $acfh_id=$objeto_accesos_fechas_horas->acfh_id;
                    $acfe_id=$objeto_accesos_fechas_horas->acfe_id;
                    $acfh_hora_desde=$objeto_accesos_fechas_horas->acfh_hora_desde;
                    $acfh_hora_hasta=$objeto_accesos_fechas_horas->acfh_hora_hasta;
                   
                    ?>
                    <tr>
                    <td id="acfe_id_td_<?php echo $acfh_id;?>"><?php echo $acfe_id;?></td>

                    <td id="acfh_hora_desde_td_<?php echo $acfh_id;?>"><?php echo $acfh_hora_desde;?></td>

                    <td id="acfh_hora_hasta_td_<?php echo $acfh_id;?>"><?php echo $acfh_hora_hasta;?></td>

                    <td style="text-align:center; cursor:pointer;">
                        <input type="hidden" id="acfe_id_<?php echo $acfh_id;?>" value="<?php echo $acfe_id;?>">
                        <input type="hidden" id="acfh_hora_desde_<?php echo $acfh_id;?>" value="<?php echo $acfh_hora_desde;?>">
                        <input type="hidden" id="acfh_hora_hasta_<?php echo $acfh_id;?>" value="<?php echo $acfh_hora_hasta;?>">
                       
                        <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarAccesosHoras('<?php echo $acfh_id;?>')"></i></td-->
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
    
       function VerActualizarAccesosHoras(acfh_id)
       {
        let acfe_id = document.querySelector('#acfe_id_'+acfh_id).value;
        let acfh_hora_desde = document.querySelector('#acfh_hora_desde_'+acfh_id).value;
        let acfh_hora_hasta = document.querySelector('#acfh_hora_hasta_'+acfh_id).value;
       

        let formulario=` 
        <div class="card">
         <div class="card-header">
            Actualizar horas de accesos
         </div>
            <form id="formulario_actualizar_accesos_horas">
                <div class="form-group">
                <div class="col-md-3 mb-3">
                <label for="acfe_id">Acceso fechas:</label>
                <select class="form-control" id="acfe_id" name="acfe_id">
                    <option value="">Seleccionar fechas</option>
                    <?php
                            
                            if($arreglo_accesos_fechas)
                            {
                                foreach($arreglo_accesos_fechas as $objeto_accesos_fechas)
                                {
                                    $acfe_id=$objeto_accesos_fechas->acfe_id;
                                    $acfe_fecha_desde =$objeto_accesos_fechas->acfe_fecha_desde;
                                    ?>
                                    
                                    <option value="<?php echo $acfe_id;?>"><?php echo  $acfe_fecha_desde;?></option>

                                    <?php
                                }
                            }

                            ?>
                </select>
               </div>
                <div class="col-md-3 mb-3">

                <label for="acfh_hora_desde">Hora desde: </label>
                <input type="text" class="form-control" value="${acfh_hora_desde}" id="acfh_hora_desde" name="acfh_hora_desde" placeholder="HORA:MINUTO - 00:00 a 24:00" maxlength="5">
                </div>
               
                <div class="col-md-3 mb-3">
                <label for="acfh_hora_hasta">Hora hasta: </label>
                <input type="text" class="form-control" value="${acfh_hora_hasta}"  id="acfh_hora_hasta" name="acfh_hora_hasta" placeholder="HORA:MINUTO - 00:00 a 24:00" maxlength="5" >
                </div>
            
                </div>

                <input type="hidden" id="acfh_id" name="acfh_id" value="${acfh_id}"/>

                <button type="button" onclick="actualizarAccesosHoras('${acfh_id}');" class="btn btn-primary float-right">Actualizar</button>
                </form>
        </div>
      
     
        `;
        document.querySelector('#ventana_modal_contenido').innerHTML=formulario;
       }




        function actualizarAccesosHoras(acfh_id)
        {
          
        let cadena = new FormData(document.querySelector('#formulario_actualizar_accesos_horas'));
         
         fetch('accesos_fechas_horas_CO/actualizar',{
             method:'POST',
             body: cadena
         })
         .then(respuesta=>respuesta.json())
         .then(respuesta=>{
            
            let acfe_id=document.querySelector('#formulario_actualizar_accesos_horas #acfe_id').value;
            let acfh_hora_desde=document.querySelector('#formulario_actualizar_accesos_horas #acfh_hora_desde').value;
            let acfh_hora_hasta=document.querySelector('#formulario_actualizar_accesos_horas #acfh_hora_hasta').value;
             
            if(respuesta.estado=='EXITO')
            {
                document.querySelector('#acfe_id_td_'+acfh_id).innerHTML=acfe_id;
                document.querySelector('#acfe_id_'+acfh_id).value=acfe_id;

                document.querySelector('#acfh_hora_desde_td_'+acfh_id).innerHTML=acfh_hora_desde;
                document.querySelector('#acfh_hora_desde_'+acfh_id).value=acfh_hora_desde;

                document.querySelector('#acfh_hora_hasta_td_'+acfh_id).innerHTML=acfh_hora_hasta;
                document.querySelector('#acfh_hora_hasta_'+acfh_id).value=acfh_hora_hasta;

             toastr.success(respuesta.mensaje);

            
            }
            else if(respuesta.estado=='ERROR')
            {
             toastr.error(respuesta.mensaje);
            }
         });
        }



        function agregarAccesosHoras()
        {

           let cadena = new FormData(document.querySelector('#formulario_agregar_accesos_fechas_horas'));
         
            fetch('accesos_fechas_horas_CO/agregar',{
                method:'POST',
                body: cadena
            })
            .then(respuesta=>respuesta.json())
            .then(respuesta=>{
              
               let acfe_id=$('#formulario_agregar_accesos_fechas_horas #acfe_id').val();
               let acfh_hora_desde=$('#formulario_agregar_accesos_fechas_horas #acfh_hora_desde').val();
               let acfh_hora_hasta=$('#formulario_agregar_accesos_fechas_horas #acfh_hora_hasta').val();
               
               if(respuesta.estado=='EXITO')
               {

                let acfh_id=respuesta.acfh_id;
                let acfe_id=document.querySelector('#formulario_agregar_accesos_fechas_horas #acfe_id').value;
                let acfh_hora_desde=document.querySelector('#formulario_agregar_accesos_fechas_horas #acfh_hora_desde').value;
                let acfh_hora_hasta=document.querySelector('#formulario_agregar_accesos_fechas_horas #acfh_hora_hasta').value;
                

                let fila=`

                <tr>
                <td id="acfe_id_td_${acfh_id}">${acfe_id}</td>
                <td id="acfh_hora_desde_td_${acfh_id}">${acfh_hora_desde}</td>
                <td id="acfh_hora_hasta_td_${acfh_id}">${acfh_hora_hasta}</td>

                <td style="text-align:center; cursor:pointer;">
                    <input type="hidden" id="acfe_id_${acfh_id}" value="${acfe_id}">
                    <input type="hidden" id="acfh_hora_desde_${acfh_id}" value="${acfh_hora_desde}">
                    <input type="hidden" id="acfh_hora_hasta_${acfh_id}" value="${acfh_hora_hasta}">
                    <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick=" VerActualizarAccesosHoras('${acfh_id}')"></i></td>

                </tr>
                `;

               
                document.querySelector('#lista_accesos_fechas_horas').insertAdjacentHTML('afterbegin',fila);

                document.querySelector('#formulario_agregar_accesos_fechas_horas').reset();

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
