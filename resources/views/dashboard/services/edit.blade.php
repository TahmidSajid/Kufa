@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Service Edit</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 offset-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container">
                                    <form action="{{ route('services.update', $service->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Service Name</label>
                                            <input class="form-control form-control-material" type="text"
                                                placeholder="Enter Service Name" aria-label="default input example"
                                                name="service_name" value="{{ $service->service_name }}">
                                                @error('service_name')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Service Icon</label>
                                            <input class="form-control form-control-material d-none" type="text" id="icon-input"
                                                name="service_icon" value="{{ $service->service_icon }}">
                                            <p class="text-center">
                                                <i class="{{ $service->service_icon }}" style="font-size: 35px" id="icon-show"></i>
                                            </p>
                                            @error('service_icon')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Service
                                                Description</label>
                                            <textarea class="form-control form-control-material" type="text" placeholder="Enter Service Description"
                                                aria-label="default input example" name="service_description" style="resize:none; height:120px">{{ $service->service_description }}</textarea>
                                                @error('service_description')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        <div class="widget-stats-content">
                                            <button type="submit" class="btn btn-primary mt-4">Update Service</button>
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
