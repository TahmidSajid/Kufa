@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Banners</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($banners as $banner)
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <h5>
                                                            Banner Description:
                                                        </h5>
                                                    </th>
                                                    <td>
                                                        <p>{{ $banner->banner_description }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <h5>
                                                            Banner Status:
                                                        </h5>
                                                    </th>
                                                    <td>
                                                        @if ($banner->status == 'active')
                                                            <h6 class="text-success">
                                                                {{ $banner->status }}
                                                            </h6>
                                                        @else
                                                        <h6 class="text-danger">
                                                            {{ $banner->status }}
                                                        </h6>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <h5>
                                                            Banner Image:
                                                        </h5>
                                                    </th>
                                                    <td>
                                                        <img src="{{ asset('uploads/banner_images') }}/{{ $banner->banner_image }}" alt="" srcset="" style="width: 300px; border-radius:15%">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-lg-6">
                                            <a href="{{ route('banner.edit',$banner->id) }}" class="btn btn-primary" style="text-decoration: none">Edit</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <form action="{{ route('banner.destroy',$banner->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    style="text-decoration: none">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
