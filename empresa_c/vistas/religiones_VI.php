<?php
class religiones_VI
{
    function __construct(){}

    function agregar()
    {
        require_once "modelos/religiones_MO.php";
        $conexion=new conexion('sel');
        $religiones_MO=new religiones_MO($conexion);

        $arreglo_religiones=$religiones_MO->seleccionar();

        ?>
        <div class="card">
            <div class="card-header">
                Agregar religiones
            </div>
            <div class="card-body">
                <form id="formulario_agregar_religiones">
                    <div class="form-group">
                        <div class="col-md-4 mb-4">
                            <label for="reli_nombre">Nombre religión</label>
                            <input type="text" class="form-control" id="reli_nombre" name="reli_nombre" maxlength="100" onkeypress="return sololetras(event)">
                        </div>
                        <button type="button" onclick="agregarReligiones();" class="btn btn-primary float-right">Agregar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                 Listar religiones
           </div>
            <div class="card-body">

                <table class="table  table-success table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col" style="text-align:center;">Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody id="lista_religiones">
                        <?php
                    
                        foreach($arreglo_religiones as $objeto_religiones)
                        {
                            $reli_id=$objeto_religiones->reli_id;
                            $reli_nombre=$objeto_religiones->reli_nombre;
                            ?>
                            <tr>
                            
                            <td id="reli_nombre_td_<?php echo $reli_id;?>"><?php echo $reli_nombre;?></td>
                            <td style="text-align:center; cursor:pointer;">
                                <input type="hidden" id="reli_nombre_<?php echo $reli_id;?>" value="<?php echo $reli_nombre;?>">
                                <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarReligiones('<?php echo $reli_id;?>')"></i></td>
                            </tr>
                            <?php
                            
                        }
                        ?>
                   </tbody>
                </table>

            </div>
        </div>

        <script>

        function VerActualizarReligiones(reli_id)
        {
            let reli_nombre = document.querySelector('#reli_nombre_'+reli_id).value;

            let formulario=` 
                <div class="card">
                <div class="card-header">
                    Actualizar religiones
                </div>
                    <form id="formulario_actualizar_religiones">
                        <div class="form-group">
                            <label for="reli_nombre">Nombre religion</label>
                            <input type="text" class="form-control" value="${reli_nombre}" id="reli_nombre" name="reli_nombre" maxlength="100" onkeypress="return sololetras(event)">
                        </div>

                        <input type="hidden" id="reli_id" name="reli_id" value="${reli_id}"/>

                        <button type="button" onclick="actualizarReligiones('${reli_id}');" class="btn btn-primary float-right">Actualizar</button>
                        </form>
                </div>
            
            
            `;
            document.querySelector('#ventana_modal_contenido').innerHTML=formulario;
       }




        function actualizarReligiones(reli_id)
        {
          
            let cadena = new FormData(document.querySelector('#formulario_actualizar_religiones'));
         
             fetch('religiones_CO/actualizar',{
             method:'POST',
             body: cadena
             })

             .then(respuesta=>respuesta.json())
             .then(respuesta=>{

             let reli_nombre=document.querySelector('#formulario_actualizar_religiones #reli_nombre').value;
      
             if(respuesta.estado=='EXITO')
             {
                document.querySelector('#reli_nombre_td_'+reli_id).innerHTML=reli_nombre;
                document.querySelector('#reli_nombre_'+reli_id).value=reli_nombre;
           

                toastr.success(respuesta.mensaje);

            
             }
             else if(respuesta.estado=='ERROR')
             {
                toastr.error(respuesta.mensaje);
             }
             });
        }


        function agregarReligiones()
        {

           let cadena = new FormData(document.querySelector('#formulario_agregar_religiones'));
         
            fetch('religiones_CO/agregar',{
                method:'POST',
                body: cadena
            })
                .then(respuesta=>respuesta.json())
                .then(respuesta=>{

               let reli_id=respuesta.reli_id;
               let reli_nombre=document.querySelector('#formulario_agregar_religiones #reli_nombre').value;
             
               
               if(respuesta.estado=='EXITO')
               { 
              
                    let fila=`

                    <tr>
                    <td id="reli_nombre_td_${reli_id}">${reli_nombre}</td>
                    <td style="text-align:center; cursor:pointer;">
                        <input type="hidden" id="reli_nombre_${reli_id}" value="${reli_nombre}">
                        <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarReligiones('${reli_id}')"></i></td>

                    </tr>
                    `;
            
                    document.querySelector('#lista_religiones').insertAdjacentHTML('afterbegin',fila);

                    document.querySelector('#formulario_agregar_religiones').reset();

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
