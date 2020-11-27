@extends('layouts.app')

@section('content')

    <div style="margin: 5px">
    <a href="{{route('styles.create')}} " class="btn btn-sm btn-success">Novo Estilo</a>
    </div>

    @isset($styles)
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            <tbody>
                @foreach ($styles as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->name}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('styles.edit',['style'=> $c->id])}}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{route('styles.destroy',['style'=> $c->id])}}" method="POST">
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
            {!! $styles->links('pagination::bootstrap-4') !!}
        </div>
    @endisset

@endsection




