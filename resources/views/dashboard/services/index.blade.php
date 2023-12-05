@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Service</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($services as $service)
                    <div class="col-xl-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">{{ $service->service_name }}</h5>
                                <i class="{{ $service->service_icon }} mt-4 mb-4" style="font-size: 50px"></i>
                                <p class="card-text">{{ $service->service_description }}</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="{{ route('services.edit',$service->id) }}" class="btn btn-primary" style="text-decoration: none">Edit</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <form action="{{ route('services.destroy',$service->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="text-decoration: none">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-content flex-fill">
                                    </div>
                                </div>
                                <div class="widget-stats-container">
                                    <form action="{{ route('services.store') }}" method="POST">
                                        @csrf
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Service Name</label>
                                            <input class="form-control form-control-material" type="text"
                                                placeholder="Enter Service Name" aria-label="default input example"
                                                name="service_name">
                                        </div>
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Service Icon</label>
                                            <input class="form-control form-control-material" type="text" id="icon-input"
                                                name="service_icon" readonly style="background: transparent">
                                        </div>
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Service
                                                Description</label>
                                            <textarea class="form-control form-control-material" type="text" placeholder="Enter Service Description"
                                                aria-label="default input example" name="service_description" style="resize:none; height:120px"></textarea>
                                        </div>
                                        <div class="widget-stats-content">
                                            <button type="submit" class="btn btn-primary mt-4">Add Service</button>
                                        </div>
                                    </form>
                                    <h5 class="mt-4">Select Icon From here:</h5>
                                    <div class="all-icons mt-4" style="overflow-y: scroll; height:300px">

                                    </div>
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
