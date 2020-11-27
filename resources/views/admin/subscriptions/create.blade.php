@extends('layouts.app')

@section('content')

<H1>Criar Estilo Musical</H1>
<form action="{{ route('styles.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Nome</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
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
