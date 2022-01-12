<?php
class paises_VI
{
    function __construct(){}

    function agregar()
    {
        require_once "modelos/paises_MO.php";
        $conexion=new conexion('sel');
        $paises_MO=new paises_MO($conexion);

        $arreglo_paises=$paises_MO->seleccionar();
        ?>
        <div class="card">
            <div class="card-header">
                Agregar paises
            </div>
             <div class="card-body">
                 <form id="formulario_agregar_paises">
                    <div class="form-group">
                        <div class="col-md-3 mb-3">
                            <label for="pais_nombre">Nombre pais</label>
                            <input type="text" class="form-control" id="pais_nombre" name="pais_nombre" maxlength="100" onkeypress="return sololetras(event)">
                        </div>
                        <button type="button" onclick="agregarPaises();" class="btn btn-primary float-right">Agregar</button>
                    </div>
                </form>
             </div>
        </div>

        <div class="card">
            <div class="card-header">
                   Listar paises
             </div>
            <div class="card-body">

            <table class="table table-success table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col" style="text-align:center;">Acci&oacute;n</th>
                    </tr>
                </thead>
                 <tbody id="lista_paises">
                    <?php
                
                    foreach($arreglo_paises as $objeto_paises)
                    {
                        $pais_id=$objeto_paises->pais_id;
                        $pais_nombre=$objeto_paises->pais_nombre;
                        ?>
                        <tr>
                        
                        <td id="pais_nombre_td_<?php echo $pais_id;?>"><?php echo $pais_nombre;?></td>
                        <td style="text-align:center; cursor:pointer;">
                            <input type="hidden" id="pais_nombre_<?php echo $pais_id;?>" value="<?php echo $pais_nombre;?>">
                            <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarPaises('<?php echo $pais_id;?>')"></i></td>
                        </tr>
                        <?php
                        
                    }
                    ?>
               </tbody>
            </table>

         </div>
        </div>

        <script>

       function VerActualizarPaises(pais_id)
        {
            let pais_nombre = document.querySelector('#pais_nombre_'+pais_id).value;
            let formulario=` 
            <div class="card">
            <div class="card-header">
                Actualizar paises
            </div>
                <form id="formulario_actualizar_paises">
                    <div class="form-group">
                        <label for="pais_nombre">Nombre pais</label>
                        <input type="text" class="form-control" value="${pais_nombre}" id="pais_nombre" name="pais_nombre" maxlength="100" onkeypress="return sololetras(event)" >
                    </div>

                    <input type="hidden" id="pais_id" name="pais_id" value="${pais_id}"/>

                    <button type="button" onclick="actualizarPaises('${pais_id}');" class="btn btn-primary float-right">Actualizar</button>
                    </form>
            </div>
      
     
            `;
              document.querySelector('#ventana_modal_contenido').innerHTML=formulario;
        }


        function actualizarPaises(pais_id)
        {
          
              let cadena = new FormData(document.querySelector('#formulario_actualizar_paises'));
         
                fetch('paises_CO/actualizar',{
                method:'POST',
                body: cadena
                })
                .then(respuesta=>respuesta.json())
                .then(respuesta=>{

                let pais_nombre=document.querySelector('#formulario_actualizar_paises #pais_nombre').value;
             
                if(respuesta.estado=='EXITO')
                {
                   
                    document.querySelector('#pais_nombre_td_'+pais_id).innerHTML=pais_nombre;
                    document.querySelector('#pais_nombre_'+pais_id).value=pais_nombre;
                    toastr.success(respuesta.mensaje);

            
                }
                else if(respuesta.estado=='ERROR')
                {
                  toastr.error(respuesta.mensaje);
                }
               });
        }



        function agregarPaises()
        {

           let cadena = new FormData(document.querySelector('#formulario_agregar_paises'));
         
            fetch('paises_CO/agregar',{
                method:'POST',
                body: cadena
            })
                .then(respuesta=>respuesta.json())
                .then(respuesta=>{
              
               if(respuesta.estado=='EXITO')
               {
                
                    let pais_id=respuesta.pais_id;
                    let pais_nombre=document.querySelector('#formulario_agregar_paises #pais_nombre').value;
                
                
                    let fila=`

                    <tr>
                    <td id="pais_nombre_td_${pais_id}">${pais_nombre}</td>
                    <td style="text-align:center; cursor:pointer;">
                        <input type="hidden" id="pais_nombre_${pais_id}" value="${pais_nombre}">
                        <i class="far fa-edit" data-toggle="modal" data-target="#ventana_modal" onclick="VerActualizarPaises('${pais_id}')"></i></td>

                    </tr>
                    `;

                    document.querySelector('#lista_paises').insertAdjacentHTML('afterbegin',fila);

                    document.querySelector('#formulario_agregar_paises').reset();

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
