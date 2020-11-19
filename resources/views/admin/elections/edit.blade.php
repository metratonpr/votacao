@extends('layouts.app')

@section('content')

<H1>Editar Votação</H1>
<form action="{{ route('elections.update', ['election'=> $election->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $election->name }}">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Descrição</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{ $election->description }}</textarea>
        @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Artistas</label>
        <select name="singers[]" id="" class="form-control  @error('singers') is-invalid @enderror" multiple>
            @foreach ($singers as $singer)
            <option value="{{$singer->id}}" @if($election->singers->contains($singer)) selected @endif>{{$singer->fullName}}</option>
            @endforeach
        </select>
        @error('singers')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror

    </div>

    <div class="form-group">
        <label for="">Inicia em:</label>
        <input type="date" name="starts_in" class="form-control @error('starts_in') is-invalid @enderror" value="{{ $election->starts_in }}">
        @error('starts_in')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Termina em:</label>
        <input type="date" name="ends_in" class="form-control @error('ends_in') is-invalid @enderror" value="{{ $election->ends_in }}">
        @error('ends_in')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Fotos da Votação</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="isOpen" name="isOpen" @if ($election->isOpen) checked  @endif>
        <label class="form-check-label" for="isOpen">Votação esta ativa?</label>
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="view" name="view" @if ($election->view) checked  @endif>
        <label class="form-check-label" for="view">Mostra na tela Inicial?</label>
    </div>


    <div class="form-group">
        <label for="">Votos Totais</label>
        <input type="number" name="votes" disabled class="form-control @error('name') is-invalid @enderror" value="{{ $election->votes }}">
        @error('votes')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>


    <div>
        <button type="submit" class="btn btn-success btn-sm">Editar Votação</button>
    </div>
</form>



@endsection
