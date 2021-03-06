@extends('layouts.app')

@section('content')

    @if (session()->has('success'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-9">
                <div class="card text-center">
                    <div class="card-header">Order Success!</div>
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="project_name" class="col-md-3 col-form-label text-md-right">Product Name</label>
                                <div class="col-md-9">
                                    <input id="name" type="text" name="name" value="{{ $data->product->name }}" required="required" autofocus="autofocus" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project_name" class="col-md-3 col-form-label text-md-right">Product Price</label>
                                <div class="col-md-9">
                                    <input id="price" type="text" name="price" value="{{ 'Rp. ' . number_format($data->product->price, 0, ',', '.') }}" required="required" autofocus="autofocus" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project_name" class="col-md-3 col-form-label text-md-right">Product Image</label>
                                <div class="col-md-9">
                                    <img src="{{ url($data->product->image) }}" class="img-fluid" alt="Responsive image" width="300" height="300" disabled>
                                </div>
                            </div>

                            <br>
                            <br>
                            <h1 class="justify-content-center">Customer Information</h1>
                            <br>

                            <div class="form-group row">
                                <label for="project_name" class="col-md-3 col-form-label text-md-right">Invoice</label>
                                <div class="col-md-9">
                                    <input id="name" type="text" name="quantity" value="{{ $data->invoice }}" required="required" autofocus="autofocus" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project_name" class="col-md-3 col-form-label text-md-right">Name</label>
                                <div class="col-md-9">
                                    <input id="name" type="text" name="name" value="{{ $data->name }}" required="required" autofocus="autofocus" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project_name" class="col-md-3 col-form-label text-md-right">Phone</label>
                                <div class="col-md-9">
                                    <input id="name" type="text" name="phone" value="{{ $data->phone }}" required="required" autofocus="autofocus" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project_name" class="col-md-3 col-form-label text-md-right">Order Quantity</label>
                                <div class="col-md-9">
                                    <input id="name" type="text" name="quantity" value="{{ $data->quantity }}" required="required" autofocus="autofocus" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project_name" class="col-md-3 col-form-label text-md-right">Total</label>
                                <div class="col-md-9">
                                    <input id="name" type="text" name="quantity" value="{{ 'Rp. ' . number_format($data->total, 0, ',', '.') }}" required="required" autofocus="autofocus" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project_name" class="col-md-3 col-form-label text-md-right">Address</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="address" autofocus="autofocus" rows="3" required disabled>{{ $data->address }}</textarea>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-header">Home</div>
                    <div class="card-body">
                        <h5 class="card-title">Back to Home</h5>
                        <a href="{{ route('frontend.index') }}" class="btn btn-primary">
                            Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
@endsection
