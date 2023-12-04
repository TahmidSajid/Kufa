@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    @foreach ($testis as $testi)
                        <div class="col-xl-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    @if($testi->customer_image)
                                        <img src="{{ asset('uploads/customer_images') }}/{{ $testi->customer_image }}" alt="" srcset="" style="width: 70px; border-radius:50%">
                                    @else
                                        <img src="{{ asset('dashboard-assets/images/default_profile.png') }}" alt="" srcset="" style="width: 40px">
                                    @endif
                                    {{-- <i class="{{ $testi->service_icon }} mt-4 mb-4" style="font-size: 50px"></i> --}}
                                    <h5 class="card-title mt-4 mb-4">{{ $testi->customer_name }}</h5>
                                    <p class="card-text">"{{ $testi->customer_feedback }}"</p>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a href="{{ route('testimonial.edit', $testi->id) }}" class="btn btn-primary"
                                                style="text-decoration: none">Edit</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <form action="{{ route('testimonial.destroy', $testi->id) }}" method="POST">
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
