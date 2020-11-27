@extends('layouts.app')

@section('content')

    <div style="margin: 5px">
    <a href="{{route('subscriptions.create')}} " class="btn btn-sm btn-success">Nova Inscrição</a>
    </div>

    @isset($subscriptions)
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Cidade</th>
                    <th>UF</th>
                    <th>Ações</th>
                </tr>
            <tbody>
                @foreach ($subscriptions as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->name}}</td>
                    <td>{{$c->phoneNumber}}</td>
                    <td>{{$c->city}}</td>
                    <td>{{$c->state}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('subscriptions.edit',['subscription'=> $c->id])}}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{route('subscriptions.destroy',['subscription'=> $c->id])}}" method="POST">
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
            {!! $subscriptions->links('pagination::bootstrap-4') !!}
        </div>
    @endisset

@endsection




