<div class="btn-group" role="group" aria-label="">
    <a id="ver-{{$id}}" class="btn btn-sm btn-warning" href="{{ route('persons.show', $id)}}">Ver</a>
    <a id="editar-{{$id}}" class="btn btn-sm btn-info" href="{{ route('persons.edit', $id)}}">Editar</a>
</div>