<?=$cabecera?>
<h1>Materiales del Documento:<?php echo $documento['descripcion']; ?></h1>
<a href="<?= base_url()?>/exportarexel/<?php echo $documento['id']; ?>" type="button" class="btn btn-primary" >
  Exportar a exel
</a>
<div id="sql_result"></div>
<input type="hidden" id="iddo" value="<?php echo $documento['id']; ?>">


     



                
      
        <div class="row">
            <div class="col-md-12 mt-4">
                 <div class="table-responsive">
                    <table id="table_idd" class="display">
                        <thead>
                            <tr>
                               
                                <th>Nro</th>
                                <th>Item/Materiel</th>
                                <th>Unidades</th>
                                <th>Marca</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                
                                <th>Nro</th>
                                <th>Item/Materiel</th>
                                <th>Unidades</th>
                                <th>Marca</th>
                                <th>Precio</th>
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
} );


function onch(dato,name,id) {
  console.log(id);
  var datac ='{"dato":"'+dato+'","name":"'+name+'"}';
  var datas = JSON.parse(datac);
 console.log(datas);
  $.ajax({
          type: "get",
          url:"<?= base_url()?>/editarmaterial/"+id ,
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




    

//opteniendo valores datatable desde el servidor
function datatable() {
  var iid=$('#iddo').val();

  var table=$('#table_idd').DataTable({
      serverSide:true,
      proscessing:true,
      
      ajax:{
        "url":"<?= base_url()?>/listarmateriales/"+iid,
        "type":"get",
        "dataSrc":function(json){
          $('#sql_result').html('').append(json.debug_query);
          return json.data;

        }
        
        
      },
      
      "columns":[
       
        { "data": "nro" },
      
        { "render": function ( data, type, row, meta ) {
                            var a = `
                            <div class="input-group">
                                <input  type="text" Class="in form-control" data-id="`+row.id+`" name="iten_material" onchange="onch($(this).val(),$(this).attr('name'),$(this).attr('data-id'))" value="`+row.iten_material+`">
                                
                            </div>       
                            `;
                            
                            return a;
        } },
        { "render": function ( data, type, row, meta ) {
                            var a = `
                            <div class="input-group">
                                <input  type="text" Class="form-control" data-id="`+row.id+`" name="unidades" onchange="onch($(this).val(),$(this).attr('name'),$(this).attr('data-id'))" value="`+row.unidades+`">
                                
                            </div>       
                            `;
                            
                            return a;
        } },
        { "render": function ( data, type, row, meta ) {
                            var a = `
                            <div class="input-group">
                                <input  type="text" Class="form-control" data-id="`+row.id+`" name="marca" onchange="onch($(this).val(),$(this).attr('name'),$(this).attr('data-id'))" value="`+row.marca+`">
                                
                            </div>       
                            `;
                            
                            return a;
        } },
        { "render": function ( data, type, row, meta ) {
                            var a = `
                            <div class="input-group">
                                <input  type="text" Class="form-control" data-id="`+row.id+`" name="precio" onchange="onch($(this).val(),$(this).attr('name'),$(this).attr('data-id'))" value="`+row.precio+`">
                                
                            </div>       
                            `;
                            
                            return a;
        } },
        
      ]
      }
      
);


};




</script>
<?=$pie?>