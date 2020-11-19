@extends('layouts.app')

@section('content')

<div>
<h2>Nome: {{ $election->name}}</h2>
<h2>Periodo: {{ $election->starts_in}} até {{ $election->ends_in}}</h2>
@if ($election->isOpen == 1)
    <h2>Situção : Aberta</h2>
@else
    <h2>Situção : Encerrado</h2>
@endif


</div>

@isset($votes)


<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Total Votos</th>
        </tr>
<tbody>
    @foreach ($votes as $c)
    <tr>
        <td>{{$c[0]}}</td>
        <td>{{$c[1]}}</td>
    </tr>
    @endforeach
</tbody>
</table>
@endisset

@isset($vencedor)
<div>
    <h2> O vencedor foi {{ $vencedor->fullName}}! </h2>
</div>
@endisset


@endsection






