@extends('layouts.app')

@section('content')

<H1>Alterar Estilo Musical</H1>
<form action="{{ route('styles.update', ['style'=> $style->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nome</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$style->name}}">
        @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div>
        <button type="submit" class="btn btn-success btn-sm">Criar Estilo</button>
    </div>
</form>
@endsection
