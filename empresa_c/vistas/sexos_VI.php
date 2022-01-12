<?php
class sexos_VI
{
    function __construct(){}

    function agregar()
    {
        require_once "modelos/sexos_MO.php";
        $conexion=new conexion('sel');
        $sexos_MO=new sexos_MO($conexion);

        $arreglo_sexos=$sexos_MO->seleccionar();
        ?>
        <div class="card">
        <div class="card-header">
            Agregar sexos
        </div>
        <div class="card-body">
            <form id="formulario_agregar_sexos">
                <div class="form-group">
                    <div class="col-md-4 mb-4 col-sm-6">
                        <label for="sexo_nombre">Nombre sexo</label>
                        <input type="text" class="form-control" id="sexo_nombre" name="sexo_nombre" maxlength="50" onkeypress="return sololetras(event)">
                    </div>
                    <button type="button" onclick="agregarSexos();" class="btn btn-primary float-right">Agregar</button>
                </div>
            </form>
        </div>
        </div>
        <div class ="container">
          <div class="card">
            <div class="card-header">
              Listar sexos
            </div>
            <div class="card-body">

                <table class="table  table-success table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col" style="text-align:center;">Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody id="lista_sexos">
                        <?php
                    
                        foreach($arreglo_sexos as $objeto_sexos)
                        {
                            $sexo_id=$objeto_sexos->sexo_id;
                            $sexo_nombre=$objeto_sexos->sexo_nombre;
                            ?>
                            <tr>
                            
                            <td id="sexo_nombre_td_<?php echo $sexo_id;?>" ><?php echo $sexo_nombre;?></td>
                    
                            <td style="text-align:center; cursor:pointer;">
                                <input type="hidden" id="sexo_nombre_<?php echo $sexo_id;?>" value="<?php echo $sexo_nombre;?>">
                                <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarSexos('<?php echo $sexo_id;?>')"></i></td>
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

       function VerActualizarSexos(sexo_id)
       {
            let sexo_nombre = document.querySelector('#sexo_nombre_'+sexo_id).value;
            let formulario=` 
            <div class="card">
            <div class="card-header">
                Actualizar sexos
            </div>
                <form id="formulario_actualizar_sexos">
                    <div class="form-group">
                        <label for="sexo_nombre">Nombre sexo</label>
                        <input type="text" class="form-control" value="${sexo_nombre}" id="sexo_nombre" name="sexo_nombre" maxlength="50" >
                    </div>

                    <input type="hidden" id="sexo_id" name="sexo_id" value="${sexo_id}"/>

                    <button type="button" onclick="actualizarSexos('${sexo_id}');" class="btn btn-primary float-right">Actualizar</button>
                    </form>
            </div>
        
        
            `;
            document.querySelector('#ventana_modal_contenido').innerHTML=formulario;
        }


        function actualizarSexos(sexo_id)
        {
          
           let cadena = new FormData(document.querySelector('#formulario_actualizar_sexos'));
         
            fetch('sexos_CO/actualizar',{
             method:'POST',
             body: cadena
            })
             .then(respuesta=>respuesta.json())
             .then(respuesta=>{
             let sexo_nombre=document.querySelector('#formulario_actualizar_sexos #sexo_nombre').value;
            
            
                if(respuesta.estado=='EXITO')
                {
                document.querySelector('#sexo_nombre_td_'+sexo_id).innerHTML=sexo_nombre;
                document.querySelector('#sexo_nombre_'+sexo_id).value=sexo_nombre;
            

                toastr.success(respuesta.mensaje);

                
                }
                else if(respuesta.estado=='ERROR')
                {
                toastr.error(respuesta.mensaje);
                }
            });
        }

        function agregarSexos()
        {

           let cadena = new FormData(document.querySelector('#formulario_agregar_sexos'));
         
            fetch('sexos_CO/agregar',{
                method:'POST',
                body: cadena
            })
                .then(respuesta=>respuesta.json())
                .then(respuesta=>{
            
               
               if(respuesta.estado=='EXITO')
               {

                let sexo_id=respuesta.sexo_id;
              
                let sexo_nombre=document.querySelector('#formulario_agregar_sexos #sexo_nombre').value;
              

                let fila=`

                <tr>
                <td id="sexo_nombre_td_${sexo_id}">${sexo_nombre}</td>
                <td style="text-align:center; cursor:pointer;">
                    <input type="hidden" id="sexo_nombre_${sexo_id}" value="${sexo_nombre}">
                    <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarSexos('${sexo_id}')"></i></td>
                    
                </tr>
                `;

               
                document.querySelector('#lista_sexos').insertAdjacentHTML('afterbegin',fila);
                
                document.querySelector('#formulario_agregar_sexos').reset();

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
