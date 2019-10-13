<div class="btn-group" role="group" aria-label="">
    <a id="editar-{{$id}}" class="btn btn-sm btn-info" href="{{ route('brands.edit', $id)}}">Editar</a>
    <a id="ver-{{$id}}" class="btn btn-sm btn-warning" href="#">Editar</a>
</div>



<script>
    document.getElementById("ver-{{$id}}").addEventListener('click', function (event) {
        event.preventDefault();
        traerData({{$id}})
    });

</script>