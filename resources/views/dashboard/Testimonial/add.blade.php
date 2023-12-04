@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <form action="{{ route('testimonial.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="widget-stats-content">
                                    <label for="exampleInputEmail1" class="form-label mt-4">Feedback</label>
                                    <textarea class="form-control form-control-material" type="text" placeholder="Enter Feedback"
                                        aria-label="default input example" name="customer_feedback" style="resize:none; height:250px"></textarea>
                                </div>
                                <div class="widget-stats-content">
                                    <label for="exampleInputEmail1" class="form-label mt-4">Customer Name</label>
                                    <input class="form-control form-control-rounded" type="text"
                                        placeholder="Enter Customer Name" aria-label="default input example"
                                        name="customer_name">
                                </div>
                                <div class="widget-stats-content">
                                    <label for="exampleInputEmail1" class="form-label mt-4">Customer Image</label>
                                    <input class="form-control form-control-rounded" type="file"
                                        placeholder="Select Customer Image" aria-label="default input example"
                                        name="customer_image">
                                </div>
                                <div class="widget-stats-content">
                                    <button type="submit" class="btn btn-primary mt-4">Add FeedBack</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
