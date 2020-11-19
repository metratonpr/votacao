@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
        @isset($elections)
        <h2> Votação em aberto: </h2>
        <br>

        <div class="container-fluid">
            @foreach ($elections as $election)
            <br>
                <img src="{{asset('storage/'.$election->image)}}" alt="" class="img-fluid">
            <br>
            <h2>{{ $election->name }}</h2>
                    @foreach ($election->singers as $singer)
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            @isset($singer->image)
                                <img src="{{asset('storage/'.$singer->image)}}" alt="" class="img-fluid card-img-top">
                            @endisset
                            <div class="card-body">
                            <h5 class="card-title">{{ $singer->fullName }}</h5>
                            <p class="card-text">{{ $singer->description }}</p>
                            @if ($election->isOpen)
                            <form action="{{route('votar')}}" method="POST">
                                @csrf
                                <input type="hidden" name="election" id="election" value="{{ $election->id }}">
                                <input type="hidden" name="singer" id="singer" value="{{ $singer->id }}">
                                @if(!!$election->ip_already_voted)
                                   <span>Voce já participou dessa votação</span>
                                @else
                                   <button class="btn btn-sm btn-success ml-2">Votar</button>
                                @endif
                            </form>
                            @else
                                <span>Voce poderá votar em breve!</span>
                            @endif

                            </div>
                        </div>
                    </div>
                    @endforeach
            @endforeach
        </div>

        @endisset
    </div>
</div>
@endsection
