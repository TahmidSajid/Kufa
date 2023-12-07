@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Edit Banner</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 offset-xl-3">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-content flex-fill">
                                    </div>
                                </div>
                                <div class="widget-stats-container">
                                    <form action="{{ route('banner.update', $banner->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Banner
                                                Description</label>
                                            <textarea class="form-control form-control-material" type="text" placeholder="Enter Banner Description"
                                                aria-label="default input example" name="banner_description" style="resize:none; height:250px">{{ $banner->banner_description }}</textarea>
                                            @error('banner_description')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Banner Old Image :
                                            </label>
                                            <img style="width: 150px; border-radius:15%" class="mt-4"
                                                src="{{ asset('uploads/banner_images') }}/{{ $banner->banner_image }}"
                                                alt="" srcset="">
                                        </div>
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Banner Image</label>
                                            <input class="form-control form-control-material" type="file"
                                                placeholder="Select Banner Image" aria-label="default input example"
                                                name="banner_image">
                                        </div>
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Status</label>
                                            <div class="form-check" value="active">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="flexRadioDefault1" value="active"
                                                    @if ($banner->status == 'active') checked @endif>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="flexRadioDefault2" @if ($banner->status == 'deactive') checked @endif
                                                    value="deactive">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Deactive
                                                </label>
                                            </div>
                                        </div>
                                        <div class="widget-stats-content">
                                            <button type="submit" class="btn btn-primary mt-4">Update Banner</button>
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
