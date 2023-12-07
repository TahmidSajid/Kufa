@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Brand List</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center">Your Brands</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Brand name</th>
                                            <th scope="col">Brand image</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($brands as $brand)
                                            <tr class="text-center">
                                                <td>{{ $brand->brand_name }}</td>
                                                <td style="background-color:gray"><img
                                                        style="width: 70px ;"
                                                        src="{{ asset('uploads/brand_images') }}/{{ $brand->brand_image }}"
                                                        alt="" srcset=""></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-xl">
                                                            <a class="btn btn-primary"
                                                                href="{{ route('brand.edit', $brand->id) }}">Edit</a>
                                                        </div>
                                                        <div class="col-xl">
                                                            <form action="{{ route('brand.destroy', $brand->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr class="text-center">
                                                <td class="text-warning" colspan="3">No Brand Added yet</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="row">
                                    <form action="{{ route('brand.store') }}" class="row g-3" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-lg-12 text-center">
                                            <label>
                                                <h5>
                                                    Upload Brand Image
                                                </h5>
                                            </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="brand_name"
                                                placeholder="enter brand name">
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
                                            <button class="btn btn-primary">Add Brand</button>
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
@section('alertSweet')
    @if (session('alerting'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('alerting') }}"
            });
        </script>
    @endif
@endsection
