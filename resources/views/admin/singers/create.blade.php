@extends('layouts.app')

@section('content')

<H1>Criar Artista</H1>
<form action="{{ route('singers.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Nome Completo</label>
    <input type="text" name="fullName" class="form-control @error('fullName') is-invalid @enderror" value="{{old('fullName')}}">
        @error('fullName')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Apelido</label>
    <input type="text" name="nickname" class="form-control @error('nickname') is-invalid @enderror" value="{{old('nickname')}}">
        @error('nickname')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Descrição</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Fotos do Artista</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div>
        <button type="submit" class="btn btn-success btn-sm">Criar Artista</button>
    </div>
</form>
@endsection
