<?=$cabecera?>
<h1>Administrar Documentos</h1>

<!-- modal AGREGAR -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregar">
  Agragar Documento
</button>
<div id="sql_result"></div>

        <!-- Modal -->
        <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form  method="get" id="guardocumento" name="guardocumento"enctype="Multipart/form-data">
            <div class="modal-header text-center ">
                <h5 class="modal-title " id="exampleModalLabel">Agregar Documento</h5> <br>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                <div class="mb-3 row">
                    <label for="nombre_completo" class="col-sm-3 col-form-label">Descripcion</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="descripcion" name="descripcion" minlength="5" maxlength="255" required>
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="imagen" class="col-sm-3 col-form-label">Documento exel</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="exel" name="exel" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" >Guardar</button>
            </div>
            </form>
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
                                <th>Url</th>
                                <th>Descripcion</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Url</th>
                                <th>Descripcion</th>
                                <th>Fecha</th>
                            </tr>
                        </tfoot>
                        
                    </table>
                </div>
            </div>
        </div>
        <?=$js?>
        <script>


$(document).ready( function () {
    
    datatable();
    submitform();
} );



function submitform(){    
    $('#guardocumento').on('submit', function(e){
        e.preventDefault();

        var datos=new FormData(this);
        for (var value of datos.values()) {
            console.log(value);
        }


        $.ajax({
                method: 'Post',
                url: '<?= base_url()?>/guardardocu',
                data: datos,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){ 
                    
                    console.log(data);
                    toastr.options={"positionClass": "toast-top-center"};
                    toastr["success"]("Guardado Correctamente","CORRECTO!");
                    datatable();
                    $('#agregar').modal('hide')
                    
                },
                error : function(xhr, status) {
                console.log(xhr);
                console.log(status);
                toastr.options={"positionClass": "toast-top-center"};
                toastr["error"]("Ocurrio un Error","Error!");
                },
            });
        
        
    });
}



    

//opteniendo valores datatable desde el servidor
function datatable() {
  
  var table=$('#table_id').DataTable({
    destroy: true,
      serverSide:true,
      proscessing:true,
      
      ajax:{
        "url":"<?= base_url()?>/getdocu_datatables/",
        "type":"get",
        "dataSrc":function(json){
          $('#sql_result').html('').append(json.debug_query);
          return json.data;

        }
        
        
      },
      
      "columns":[
        { "data": "id" },
        { "data": "url" },
        { "render": function ( data, type, row, meta ) {
                            var a = `
                            <a href="<?= base_url()?>/materiales/`+row.id+`" style="text-decoration:none">`+row.descripcion+`</a>     
                            `;
                            
                            return a;
        } },
        { "data": "fecha" },
        
      ]
      }
      
);


};




</script>
<?=$pie?>