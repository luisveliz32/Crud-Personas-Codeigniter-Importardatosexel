<?=$cabecera?>
<h1>Administrar Personas</h1>
<?php if(session('mensaje')){?>
<div class="alert alert-danger" role="alert">
    <strong><?php echo session('mensaje')?></strong>
</div> 
<?php }?>
<?php if(session('exito')){?>
<div class="alert alert-success" role="alert">
    <strong><?php echo session('exito')?></strong>
</div> 
<?php }?>
<!-- modal AGREGAR -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregar">
  Agragar Persona
</button>
<div id="sql_result"></div>

        <!-- Modal -->
        <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form action="<?=site_url('/guardar')?>" method="post" id="guar"enctype="Multipart/form-data">
            <div class="modal-header text-center ">
                <h5 class="modal-title " id="exampleModalLabel">Agregar persona</h5> <br>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                <div class="mb-3 row">
                    <label for="nombre_completo" class="col-sm-3 col-form-label">Nombre Completo</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fecha_nacimiento" class="col-sm-3 col-form-label">Fecha de Nacimiento</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="imagen" class="col-sm-3 col-form-label">Imagen</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
            </div>
        </div>
        </div>




         <!-- Modal MODIFICAR-->
         <div class="modal fade" id="modificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form action="<?=site_url('/modificar')?>" method="post" id="mod"enctype="Multipart/form-data">
            <div class="modal-header text-center ">
                <h5 class="modal-title " id="exampleModalLabel">Modificar Persona</h5> <br>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <div class="mb-3 row">
                    <label class="col-sm-5"></label>
                    <div class="col-sm-7" style="width:100px; height:100px; " >
                              <img style="width:100%; height:100%; border-radius: 50%; border-style:solid ;" id="imge" alt="">
                    </div>
                </div>
            
                <form action="" method="post">
                <div class="mb-3 row">
                    <label for="nombre_completom" class="col-sm-3 col-form-label">Nombre Completo</label>
                    <div class="col-sm-9">
                        <input type="text" id="id" name="id">
                        <input type="text" class="form-control" id="nombre_completom" name="nombre_completo" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fecha_nacimientom" class="col-sm-3 col-form-label">Fecha de Nacimiento</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="fecha_nacimientom" name="fecha_nacimiento">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="imagenm" class="col-sm-3 col-form-label">Imagen</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="imagenm" name="imagen">
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
            </div>
        </div>
        </div>



                
        <!-- modal ELIMINAR -->
        

        <!-- Modal -->
        <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Elimar a :</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 id="rnombre">Eliminar a  </h5> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                <a id="enviar" type="button" class="btn btn-danger">Eliminar</a>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4">
                 <div class="table-responsive">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre Completo</th>
                                <th>Fecha de nacimiento</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Nombre Completo</th>
                                <th>Fecha Nacimiento</th>
                                <th>Imagen</th>
                                <th>aciones</th>
                            </tr>
                        </tfoot>
                        
                    </table>
                </div>
            </div>
        </div>
 <!-- Modal 
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>C. I.</th>
                    <th>Nombre</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($personas as $persona): ?>
                    <tr>
                        <td scope="row"><?php echo $persona['id']; ?> </td>
                        <td><?php echo $persona['nombre_completo']; ?></td>
                        <td><?php echo $persona['fecha_nacimiento']; ?></td>
                        <td> 
                            <div style="width:60px; height:60px;">
                              <img style="width:100%; height:100%; border-radius: 50%; border-style:solid" src="<?=base_url()?>/uploads/<?=$persona['imagen'];?>" alt="">
                            </div>
                            
                            
                        </td>
                        <td>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modificar" id="modificarre" data-id="<?=$persona['id']?>" data-nombrem="<?php echo $persona['nombre_completo']; ?>" data-fecham="<?php echo $persona['fecha_nacimiento']; ?>" data-imagenm="<?=base_url()?>/uploads/<?=$persona['imagen'];?>"type="buttom">Modificar</a>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar" id="eliminarre" data-urlid="<?=base_url('eliminar/'.$persona['id'])?>" data-nombre="<?php echo $persona['nombre_completo']; ?>" type="buttom">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
        </table> 
        //<?php echo $paginador->links();?> 
        -->
    <?=$js?>
    <script>

$(document).ready( function () {
    
    datatable();
} );

function onch(dato,name,id) {
  console.log(id);
  var datac ='{"dato":"'+dato+'","name":"'+name+'"}';
  var datas = JSON.parse(datac);
 console.log(datas);
  $.ajax({
          type: "get",
          url:"<?= base_url()?>/editar/"+id ,
          data: datas,
          //dataType: "json",    
          success: function(data){
            console.log(data);
            toastr.options={"positionClass": "toast-top-center"};
            toastr["success"]("Guardado Correctamente","CORRECTO!");
        },
        error : function(xhr, status) {
          toastr.options={"positionClass": "toast-top-center"};
          toastr["error"]("Ocurrio un Error","Error!");
    },
  })
  }

//opteniendo datos de un fila data table
/*
function dat(tbody,table){
  $(tbody).on("click", "button#edit", function () {

var tr = $(this).closest('tr').parents('tr');

var data = table.row($(this).parents(tr)).data();

console.log(data);
})
};

*/

//opteniendo valores datatable desde el servidor
function datatable() {
  
  var table=$('#table_id').DataTable({
      serverSide:true,
      proscessing:true,
      
      ajax:{
        "url":"<?= base_url()?>/get_datatable/",
        "type":"get",
        "dataSrc":function(json){
          $('#sql_result').html('').append(json.debug_query);
          return json.data;

        }
        
        
      },
      
      "columns":[
        { "data": "id" },
        { "render": function ( data, type, row, meta ) {
                            var a = `
                            <div class="input-group">
                                <input  type="text" Class="in form-control" data-id="`+row.id+`" name="nombre_completo" onchange="onch($(this).val(),$(this).attr('name'),$(this).attr('data-id'))" value="`+row.nombre_completo+`">
                                
                            </div>       
                            `;
                            
                            return a;
        } },
        { "render": function ( data, type, row, meta ) {
                            var a = `
                            <div class="input-group">
                                <input  type="date" Class="form-control" data-id="`+row.id+`" name="fecha_nacimiento" onchange="onch($(this).val(),$(this).attr('name'),$(this).attr('data-id'))" value="`+row.fecha_nacimiento+`">
                                
                            </div>       
                            `;
                            
                            return a;
        } },
        
        { "render": function ( data, type, row, meta ) {
                            var a = `
                            <div style="width:60px; height:60px;">
                              <img style="width:100%; height:100%; border-radius: 50%; border-style:solid" src="<?=base_url()?>/uploads/`+row.imagen+`" alt="">
                            </div>        
                            `;
                            
                            return a;
        } },
        { "render": function ( data, type, row, meta ) {
                            var b = `
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modificar" id="modificarre" data-id="`+row.id+`" data-nombrem="`+row.nombre_completo+`" data-fecham="`+row.fecha_nacimiento+`" data-imagenm="<?=base_url()?>/uploads/`+row.imagen+`"type="buttom" title="Editar"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar" id="eliminarre" data-urlid="<?=base_url('eliminar/')?>/`+row.id+`" data-nombre="`+row.nombre_completo+`" type="buttom" title="Eliminar"><i class="bi bi-trash-fill"></i></a>
                            `;
                            return b;

        } },
      ]
      }
      
);


};



$(document).on('click','#eliminarre',function(){
  

  
  $('#rnombre').text($(this).data('nombre'));
  var urlid=$(this).data('urlid');
  console.log(urlid);
  
  $('#enviar').attr('href',urlid);
})

var myModalEl = document.getElementById('agregar')
myModalEl.addEventListener('hidden.bs.modal', function (event) {
  $("#guar")[0].reset()
})
$(document).on('click','#modificarre',function(){  
  $('#id').val($(this).data('id'));
  $('#nombre_completom').val($(this).data('nombrem'));
  $('#fecha_nacimientom').val($(this).data('fecham'));
  
  console.log($(this).data('fecham'));
  $('#imge').attr('src',$(this).data('imagenm'));
  
})

</script>
<?=$pie?>