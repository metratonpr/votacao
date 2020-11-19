@extends('layouts.app')

@section('content')

    <div style="margin: 5px">
    <a href="{{route('singers.create')}} " class="btn btn-sm btn-success">Novo Artista</a>
    </div>

    @isset($singers)
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome Completo</th>
                    <th>Apelido</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            <tbody>
                @foreach ($singers as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->fullName}}</td>
                    <td>{{$c->nickname}}</td>
                    <td>{{$c->description}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('singers.edit',['singer'=> $c->id])}}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{route('singers.destroy',['singer'=> $c->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger ml-2">Remover</button>
                            </form>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {!! $singers->links('pagination::bootstrap-4') !!}
        </div>
    @endisset

@endsection




