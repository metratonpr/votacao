@extends('layouts.app')

@section('content')

    <H1>Alterar Inscrição</H1>
    <form action="{{ route('subscriptions.update', ['subscription' => $subscription->id]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ $subscription->name }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Telefone</label>
            <input type="text" name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror"
                value="{{ $subscription->phoneNumber }}">
            @error('phoneNumber')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ $subscription->email }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Logradouro</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                value="{{ $subscription->address }}">
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Cidade</label>
            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                value="{{ $subscription->city }}">
            @error('city')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Estado</label>
            <input type="text" name="state" class="form-control @error('state') is-invalid @enderror"
                value="{{ $subscription->state }}">
            @error('state')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Video de apresentação: Tamanho maximo 30 mb (30.720 kb)</label>
            <input type="file" name="video" class="form-control @error('video') is-invalid @enderror">
            @error('video')
                <div class="invalid-feedback">
                    Tamanho Invalido de arquivo
                </div>
            @enderror
        </div>

        <!-- 16:9 aspect ratio -->
        <div class="embed-responsive embed-responsive-21by9 form-group">
            <label for="">Video carregado</label>
            <iframe class="embed-responsive-item" src="{{ asset('storage/' . $subscription->video) }}"></iframe>
        </div>

        <div class="form-group">
            <label for="">Estilo musical</label>
            <select name="styles[]" id="" class="form-control  @error('styles') is-invalid @enderror" multiple>
                @foreach ($styles as $style)
                    <option value="{{ $style->id }}" @if ($subscription->styles->contains($style)) selected
                @endif>{{ $style->name }}</option>
                @endforeach
            </select>
            <br />
            @error('styles')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <button type="submit" class="btn btn-success btn-sm">Editar Inscrição</button>
        </div>
    </form>
@endsection
