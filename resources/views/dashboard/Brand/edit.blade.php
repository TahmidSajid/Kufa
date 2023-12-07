@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Brand Edit</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form action="{{ route('brand.update', $brand->id) }}" class="row g-3" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-lg-12 text-center">
                                            <label>
                                                <h5>
                                                    Update Brand Image
                                                </h5>
                                            </label>
                                        </div>
                                        <div class="col-lg-6 offset-lg-6 ">

                                            <div class="row d-flex align-items-center">
                                                <div class="col-lg-6">
                                                    <h6>Old Brand Image: </h6>
                                                </div>
                                                <div class="col-lg-6 text-center" style="background-color:gray">
                                                    <img style="width: 70px ;"
                                                        src="{{ asset('uploads/brand_images') }}/{{ $brand->brand_image }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="brand_name"
                                                placeholder="enter brand name" value="{{ $brand->brand_name }}">
                                            @error('brand_name')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-control" name="brand_image"
                                                placeholder="enter brand image">
                                            @error('brand_image')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-primary">Update Brand</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
