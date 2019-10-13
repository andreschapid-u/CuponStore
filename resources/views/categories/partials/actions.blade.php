{{-- <a id="ver-{{$id}}"class="btn btn-sm btn-info" href="{{ route('marcas.show', $id)}}">Ver</a> --}}
<a id="editar-{{$id}}"class="btn btn-sm btn-info" href="{{ route('categorias.edit', $id)}}">Editar</a>


{{-- <script>
    document.getElementById("ver-{{$id}}").addEventListener('click', function (event) {
        event.preventDefault();
        console.log('click');
        traerData({{$id}})
    });
</script> --}}