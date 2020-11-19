@extends('layouts.app')

@section('content')

<div style="margin: 5px">
<a href="{{route('elections.create')}} " class="btn btn-sm btn-success">Nova Votação</a>
</div>

@isset($elections)
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Inicia Em:</th>
            <th>Termina Em:</th>
            <th>Esta aberta:</th>
            <th>Total de Votos:</th>
            <th>Image:</th>
            <th>Ações</th>
        </tr>
<tbody>
    @foreach ($elections as $c)
    <tr>
        <td>{{$c->id}}</td>
        <td>{{$c->name}}</td>
        <td>{{$c->description}}</td>
        <td>{{$c->starts_in}}</td>
        <td>{{$c->ends_in}}</td>
        @if ($c->isOpen == 1)
            <td>Aberta</td>
        @else
            <td>Encerrado</td>
        @endif
        <td>{{$c->votes}}</td>
        <td>{{$c->image}}</td>
        <td>
            <div class="btn-group">
                <a href="{{route('elections.edit',['election'=> $c->id])}}" class="btn btn-sm btn-primary">Editar</a>
                <form action="{{route('elections.destroy',['election'=> $c->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger ml-2">Remover</button>
                </form>
                <a href="{{route('elections.show',['election'=> $c->id])}}" class="btn btn-sm btn-warning ml-2">Resultado</a>
            </div>

        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{ $elections->links() }}
@endisset

@endsection




