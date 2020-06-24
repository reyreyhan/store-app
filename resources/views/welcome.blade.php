@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($data as $u)
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">{{ $u->name }}</div>
                    <div class="card-body">
                        <img src="{{ url($u->image) }}" class="img-fluid" alt="Responsive image" width="300" height="300">
                        <h1></h1>
                        <h5 class="card-title">{{ 'Rp. ' . number_format($u->price, 0, ',', '.') }}</h5>
                        <a href="{{ route('frontend.order', $u->id) }}" class="btn btn-primary">
                            Buy
                        </a>
                    </div>
                </div>
                <br>
            </div>
            @endforeach
        </div>
    </div>
@endsection
