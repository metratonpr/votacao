@extends('layouts.app')

@section('content')

@isset($votes)
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Data</th>
            <th>Computador</th>
            <th>IP</th>
            <th>Votação</th>
            <th>Artista</th>
            <th>Ações</th>
        </tr>
<tbody>
    @foreach ($votes as $c)
    <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->created_at }}</td>
        <td>{{ $c->computerName }}</td>
        <td>{{ $c->ip }}</td>
        <td>{{ $c->election->name }}</td>
        <td>{{ $c->singer->fullName }}</td>
        <td>
            <div class="btn-group">
                <form action="{{route('votes.destroy',['vote'=> $c->id])}}" method="POST">
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
    {!! $votes->links('pagination::bootstrap-4') !!}
</div>
@endisset

@endsection




