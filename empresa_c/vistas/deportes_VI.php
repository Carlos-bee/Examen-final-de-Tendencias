<?php
class deportes_VI
{
    function __construct(){}

    function agregar()
    {
        require_once "modelos/deportes_MO.php";
        $conexion=new conexion('sel');
        $deportes_MO=new deportes_MO($conexion);

        $arreglo_deportes=$deportes_MO->seleccionar();
        ?>
        <div class="card">
            <div class="card-header">
                Agregar deportes
            </div>
             <div class="card-body">
                 <form id="formulario_agregar_deportes">
                        <div class="form-group">
                            <div class="col-md-4 mb-4">
                                <label for="depo_nombre">Nombre deporte</label>
                                <input type="text" class="form-control" id="depo_nombre" name="depo_nombre" maxlength="100" onkeypress="return sololetras(event)">
                            </div>
                            <button type="button" onclick="agregarDeportes();" class="btn btn-primary float-right">Agregar</button>
                        </div>
                 </form>
            </div>
        </div>

        <div class="card">
                <div class="card-header">
                    Listar deportes
                </div>
                 <div class="card-body">

                    <table class="table  table-success table-bordered">
                         <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col" style="text-align:center;">Acci&oacute;n</th>
                            </tr>
                        </thead>
                         <tbody id="lista_deportes">
                                <?php
                            
                                foreach($arreglo_deportes as $objeto_deportes)
                                {
                                    $depo_id=$objeto_deportes->depo_id;
                                    $depo_nombre=$objeto_deportes->depo_nombre;
                                    ?>
                                    <tr>
                                    
                                    <td id="depo_nombre_td_<?php echo $depo_id;?>"><?php echo $depo_nombre;?></td>
                                    <td style="text-align:center; cursor:pointer;">
                                        <input type="hidden" id="depo_nombre_<?php echo $depo_id;?>" value="<?php echo $depo_nombre;?>">
                                        <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarDeportes('<?php echo $depo_id;?>')"></i></td>
                                    </tr>
                                    <?php
                                    
                                }
                                ?>
                         </tbody>
                    </table>

            </div>
        </div>

        <script>

       function VerActualizarDeportes(depo_id)
       {

            let depo_nombre = document.querySelector('#depo_nombre_'+depo_id).value;
        

            let formulario=` 
            <div class="card">
            <div class="card-header">
                Actualizar deportes
            </div>
                <form id="formulario_actualizar_deportes">
                    <div class="form-group">
                        <label for="depo_nombre">Nombre deporte</label>
                        <input type="text" class="form-control" value="${depo_nombre}" id="depo_nombre" name="depo_nombre"  maxlength="100" onkeypress="return sololetras(event)">
                    </div>

                    <input type="hidden" id="depo_id" name="depo_id" value="${depo_id}"/>

                    <button type="button" onclick="actualizarDeportes('${depo_id}');" class="btn btn-primary float-right">Actualizar</button>
                    </form>
            </div>
        
        
            `;
            document.querySelector('#ventana_modal_contenido').innerHTML=formulario;
       }




        function actualizarDeportes(depo_id)
        {
           
           let cadena = new FormData(document.querySelector('#formulario_actualizar_deportes'));
         
             fetch('deportes_CO/actualizar',{
             method:'POST',
             body: cadena
            })
            .then(respuesta=>respuesta.json())
            .then(respuesta=>{
          
            let depo_nombre=document.querySelector('#formulario_actualizar_deportes #depo_nombre').value;
           
            
            if(respuesta.estado=='EXITO')
            {
                document.querySelector('#depo_nombre_td_'+depo_id).innerHTML=depo_nombre;
                document.querySelector('#depo_nombre_'+depo_id).value=depo_nombre;
               
                toastr.success(respuesta.mensaje);
            }
            else if(respuesta.estado=='ERROR')
            {
             toastr.error(respuesta.mensaje);
            }
          });
        }

        function agregarDeportes()
        {

           let cadena = new FormData(document.querySelector('#formulario_agregar_deportes'));
         
                fetch('deportes_CO/agregar',{
                    method:'POST',
                    body: cadena
                })
                .then(respuesta=>respuesta.json())
                .then(respuesta=>{
                
                
                if(respuesta.estado=='EXITO')
                {
                    let depo_id=respuesta.depo_id;
                    let depo_nombre=document.querySelector('#formulario_agregar_deportes #depo_nombre').value;
                    
                    let fila=`

                    <tr>
                    <td id="depo_nombre_td_${depo_id}">${depo_nombre}</td>
                    <td style="text-align:center; cursor:pointer;">
                        <input type="hidden" id="depo_nombre_${depo_id}" value="${depo_nombre}">
                        <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarDeportes('${depo_id}')"></i></td>

                    </tr>
                    `;

                
                    document.querySelector('#lista_deportes').insertAdjacentHTML('afterbegin',fila);

                    document.querySelector('#formulario_agregar_deportes').reset();

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
