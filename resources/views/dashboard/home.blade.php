@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Profile</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-warning">
                                        <i class="material-icons-outlined">person</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">User Name</span>
                                        <span class="widget-stats-amount"
                                            style="font-size: 15px">{{ auth()->user()->name }}</span>
                                        <span class="widget-stats-info">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <form action="{{ route('password_change') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">
                                            <h4>Password Change</h4>
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Old Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="Old password" name="old_password">
                                        @error('old_password')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="New password" name="password">
                                        @error('password')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="confirm password" name="password_confirmation">
                                        @error('password_confirmation')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card">
                            @if (auth()->user()->profile_image)
                                <img src="{{ asset('uploads/profile_photos') }}/{{ auth()->user()->profile_image }}"
                                    class="card-img-top" alt="...">
                            @else
                                <img src="{{ asset('dashboard-assets') }}/images/cards/card.png" class="card-img-top"
                                    alt="...">
                            @endif
                            <div class="card-body">
                                @if (auth()->user()->profile_image)
                                    <h5 class="card-title">Your current profile picture</h5>
                                @endif
                                <p class="card-text">Upload your photo from below down</p>
                                <form class="row g-3" action="{{ route('profile_image') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-auto">
                                        <input type="file" class="form-control" name="profile_image">
                                        @error('profile_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-success mb-3">Upload photo</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center">Add Social Accounts</h5>
                                @forelse ($socials as $social)
                                    <div class="card widget widget-stats">
                                        <div class="card-body">
                                            <div class="widget-stats-container d-flex align-items-center">
                                                <div class="widget-stats-icon widget-stats-icon-primary">
                                                    <i class="{{ $social->social_media_icon }}"></i>
                                                </div>
                                                <div class="widget-stats-content flex-fill">
                                                    <span class="widget-stats-title">User Name</span>
                                                    <span class="widget-stats-amount"
                                                        style="font-size: 15px">{{ $social->social_media_name }}</span>
                                                    <span
                                                        class="widget-stats-info">{{ Str::limit($social->social_media_link, 25) }}</span>
                                                </div>
                                                <div class="widget-stats-content">
                                                    <form action="{{ route('social.destroy', $social->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center">
                                        <h6 class="text-warning mt-4 mb-4">No Social Media added yet</h6>
                                    </div>
                                @endforelse
                                <div class="row">
                                    <form action="{{ route('social.store') }}" class="row g-3" method="POST">
                                        @csrf
                                        <div class="col-lg-4">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Social Name</label>
                                            <input type="text" class="form-control" name="social_media_name"
                                                placeholder="Social Media Name">
                                            @error('social_media_name')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Social link</label>
                                            <input type="text" class="form-control" name="social_media_link"
                                                placeholder="Social Media Link">
                                            @error('social_media_link')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4 ">
                                            <label for="exampleInputEmail1" class="form-label mt-4">Social Icon</label>
                                            <input type="text" class="form-control d-none" id="icon-input"
                                                name="social_media_icon" placeholder="Social Media Icon">
                                            <p class="text-center">
                                                <i class="" style="font-size: 35px" id="icon-show"></i>
                                            </p>
                                            @error('social_media_icon')
                                                <div class="text-danger mt-4 pt-4">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-primary">Add Social Media Link</button>
                                        </div>
                                    </form>
                                </div>
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
@endsection
@section('alertSweet')
    @if (session('login_alert'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ session('login_alert') }}",
            });
        </script>
    @endif
@endsection
@section('alertlogin')
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
