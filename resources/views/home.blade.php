@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">Product</div>
                <div class="card-body">
                    <h5 class="card-title">See All Product Here</h5>
                    <a href="{{ route('product.index') }}" class="btn btn-primary">
                        See Product
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">Order</div>
                <div class="card-body">
                    <h5 class="card-title">See All Order Here</h5>
                    <a href="{{ route('order.index') }}" class="btn btn-primary">
                        See Order
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">User</div>
                <div class="card-body">
                    <h5 class="card-title">See All User Here</h5>
                    <a href="{{ route('user.index') }}" class="btn btn-primary">
                        See User
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
