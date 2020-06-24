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
                    <div class="card-header">Edit Product</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('product.update', $data->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="project_name" class="col-md-3 col-form-label text-md-right">Product Name</label>
                                <div class="col-md-9">
                                    <input id="name" type="text" name="name" value="{{ $data->name }}" required="required" autofocus="autofocus" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project_name" class="col-md-3 col-form-label text-md-right">Product Price</label>
                                <div class="col-md-9">
                                    <input id="price" type="number" name="price" value="{{ $data->price }}" required="required" autofocus="autofocus" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project_name" class="col-md-3 col-form-label text-md-right">Product Image (Upload if want to update)</label>
                                <div class="col-md-9">
                                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project_name" class="col-md-3 col-form-label text-md-right">Product Image</label>
                                <img src="{{ url($data->image) }}" class="img-fluid" alt="Responsive image" width="300" height="300">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 col-form-label text-md-right">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
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
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
@endsection
