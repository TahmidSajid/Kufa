@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-content flex-fill">
                                    </div>
                                </div>
                                <div class="widget-stats-container">
                                    <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Portfolio
                                                Category</label>
                                            <input class="form-control form-control-material" type="text"
                                                placeholder="Enter Portfolio Category" aria-label="default input example"
                                                name="category" value="{{ $portfolio->category }}">
                                        </div>
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Portfolio Name</label>
                                            <input class="form-control form-control-material" type="text"
                                                placeholder="Enter Portfolio Name" aria-label="default input example"
                                                name="portfolio_name" value="{{ $portfolio->portfolio_name }}">
                                        </div>
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Portfolio
                                                Heading</label>
                                            <input class="form-control form-control-material" type="text"
                                                placeholder="Enter Portfolio Heading" aria-label="default input example"
                                                name="portfolio_heading" value="{{ $portfolio->portfolio_heading }}">
                                        </div>
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Portfolio
                                                Description</label>
                                            <textarea class="form-control form-control-material" type="text" placeholder="Enter Portfolio Description"
                                                aria-label="default input example" name="portfolio_description" style="resize:none; height:250px">{{ $portfolio->portfolio_description }}</textarea>
                                        </div>
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Portfolio Old Image :
                                                <img src="{{ asset('uploads/portfolio_images/') }}/{{ $portfolio->portfolio_image }}"
                                                    alt="" style="width: 300px; border-radius:15%"></label>
                                        </div>
                                        <div class="widget-stats-content">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Portfolio Image</label>
                                            <input class="form-control form-control-material" type="file"
                                                placeholder="Select Portfolio Image" aria-label="default input example"
                                                name="portfolio_image">
                                        </div>
                                        <div class="widget-stats-content">
                                            <button type="submit" class="btn btn-primary mt-4">Add Portfolio</button>
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
