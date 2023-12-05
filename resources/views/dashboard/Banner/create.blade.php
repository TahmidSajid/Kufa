@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Create Banner</h1>
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
                                    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Banner
                                                Description</label>
                                            <textarea class="form-control form-control-material" type="text" placeholder="Enter Banner Description"
                                                aria-label="default input example" name="banner_description" style="resize:none; height:250px"></textarea>
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
                                                    id="flexRadioDefault1" value="active">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="flexRadioDefault2" checked value="deactive">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Deactive
                                                </label>
                                            </div>
                                        </div>
                                        <div class="widget-stats-content">
                                            <button type="submit" class="btn btn-primary mt-4">Add Banner</button>
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
