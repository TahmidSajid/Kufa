@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <form action="{{ route('testimonial.update',$testimonial->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="widget-stats-content">
                                    <label for="exampleInputEmail1" class="form-label mt-4">Feedback</label>
                                    <textarea class="form-control form-control-material" type="text" placeholder="Enter Feedback"
                                        aria-label="default input example" name="customer_feedback" style="resize:none; height:250px">{{ $testimonial->customer_feedback }}</textarea>
                                </div>
                                <div class="widget-stats-content">
                                    <label for="exampleInputEmail1" class="form-label mt-4">Customer Name</label>
                                    <input class="form-control form-control-rounded" type="text"
                                        placeholder="Enter Customer Name" aria-label="default input example"
                                        name="customer_name" value="{{ $testimonial->customer_name }}">
                                </div>
                                <div class="widget-stats-content">
                                    <label for="exampleInputEmail1" class="form-label mt-4">Customer Old Image</label>
                                    @if( $testimonial->customer_image )
                                        <img src="{{ asset('uploads/customer_images') }}/{{ $testimonial->customer_image }}" alt="" srcset="" style="width: 70px; border-radius:50%">
                                    @else
                                        <img src="{{ asset('dashboard-assets/images/default_profile.png') }}" alt="" srcset="" style="width: 40px">
                                    @endif
                                </div>
                                <div class="widget-stats-content">
                                    <label for="exampleInputEmail1" class="form-label mt-4">Customer Image</label>
                                    <input class="form-control form-control-rounded" type="file"
                                        placeholder="Select Customer Image" aria-label="default input example"
                                        name="customer_image">
                                </div>
                                <div class="widget-stats-content">
                                    <button type="submit" class="btn btn-primary mt-4">Update FeedBack</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
