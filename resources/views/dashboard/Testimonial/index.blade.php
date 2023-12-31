@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Testimonial</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse ($testis as $testi)
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
                        @empty
                        <div class="row">
                            <div class="col-xl-6 offset-xl-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h6 class="text-warning">No Testimonial added yet</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
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
