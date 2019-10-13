<div id="myModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('brands.update')}}" method="POST">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">Editar Marca</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body">
                    <p>Se actualizara a : <strong id="m-edit"></strong></p>
                    @method('POST') @csrf
                    <input type="hidden" name="id" id="id-edit" value="">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpMarca" placeholder="Nuevo nombre">
                        <small id="helpMarca" class="form-text text-muted">Nuevo nombre</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function traerData(id){
            fetch("api/marcas/get/"+id,{
                method: 'get'
            }).then(function(response){
                return response.json();
            }).then(function(json){
                console.log(json);
                document.getElementById('m-edit').innerText = json["name"];
                document.getElementById('id-edit').value = json["id"];
                $('#myModal').modal('toggle')
            });
        }

</script>