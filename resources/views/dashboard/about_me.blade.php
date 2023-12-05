@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>About me</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-content flex-fill">
                                        <label for="exampleInputEmail1" class="form-label">
                                            <h5>
                                                Your educational description
                                            </h5>
                                        </label>
                                        <h6 class="widget-stats-info">{{ $description }}</h6>
                                    </div>
                                </div>
                                <div class="widget-stats-container">
                                    <form action="{{ route('edu_description') }}" method="POST">
                                        @csrf
                                        <div class="widget-stats-content ">
                                            <label for="exampleInputEmail1" class="form-label">Tag Line about you</label>
                                            <textarea type="text" class="form-control" name="edu_description" style="resize:none; height:120px"></textarea>
                                        </div>
                                        <div class="widget-stats-content mt-4">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                @if ($updating == true)
                                    <div class="row">
                                        <form action="{{ route('contacts.update',$contacts->id) }}" class="row g-3" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <h5 class="text-center">Updating</h5>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon3">Phone Number</span>
                                                <input type="text" class="form-control" id="basic-url"
                                                    aria-describedby="basic-addon3" name="phone" value="{{ $contacts->phone }}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon3">Office Address</span>
                                                <input type="text" class="form-control" placeholder="Office Address"
                                                    name="office_address" value="{{ $office }}">
                                                <span class="input-group-text">City</span>
                                                <input type="text" class="form-control" placeholder="City"
                                                    aria-label="Server" name="city" value="{{ $city }}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Email</span>
                                                <input type="mail" class="form-control" id="basic-url"
                                                    aria-describedby="basic-addon3" placeholder="....@...com"
                                                    name="email" value="{{ $contacts->email }}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Contact Description</span>
                                                <textarea class="form-control" name="contact_description" aria-label="With textarea" style="resize: none">{{ $contacts->contact_description }}</textarea>
                                            </div>
                                            <div class="col-lg-6">
                                                <button class="btn-sm btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                @else
                                @if ($cnct == true)
                                <h5 class="text-center">Your Address</h5>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr class="text-start">
                                            <td>
                                                <h6>
                                                    Phone Number:
                                                </h6>
                                            </td>
                                            <td>{{ $contacts->phone }}</td>
                                        </tr>
                                        <tr class="text-start">
                                            <td>
                                                <h6>
                                                    Email:
                                                </h6>
                                            </td>
                                            <td>{{ $contacts->email }}</td>
                                        </tr>
                                        <tr class="text-start">
                                            <td>
                                                <h6>
                                                    Address:
                                                </h6>
                                            </td>
                                            <td>{{ $contacts->address }}</td>
                                        </tr>
                                        <tr class="text-start">
                                            <td>
                                                <h6>
                                                    Contact Description:
                                                </h6>
                                            </td>
                                            <td>{{ $contacts->contact_description }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{ route('contacts.edit',$contacts->id) }}"
                                                    class="btn btn-primary">Update</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <div class="row">
                                    <form action="{{ route('contacts.store') }}" class="row g-3" method="POST">
                                        @csrf
                                        <h5>Add Address</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">Phone Number</span>
                                            <input type="text" class="form-control" id="basic-url"
                                                aria-describedby="basic-addon3" name="phone">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">Office Address</span>
                                            <input type="text" class="form-control" placeholder="Office Address"
                                                name="office_address">
                                            <span class="input-group-text">City</span>
                                            <input type="text" class="form-control" placeholder="City"
                                                aria-label="Server" name="city">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Email</span>
                                            <input type="mail" class="form-control" id="basic-url"
                                                aria-describedby="basic-addon3" placeholder="....@...com"
                                                name="email">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Contact Description</span>
                                            <textarea class="form-control" name="contact_description" aria-label="With textarea" style="resize: none"></textarea>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn-sm btn-primary">Add Contact Info</button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <h5>Your Education</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Degree</th>
                                            <th scope="col">Year</th>
                                            <th scope="col">Skill</th>
                                            <th scope="col">actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($educations as $edu)
                                            <tr class="text-center">
                                                <td>{{ $edu->degree_name }}</td>
                                                <td>{{ $edu->year }}</td>
                                                <td>{{ $edu->skill }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <a style="text-decoration: none" class="btn btn-primary"
                                                                href="{{ route('education.edit', $edu->id) }}">Edit</a>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <form action="{{ route('education.destroy', $edu->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger"
                                                                    style="text-decoration: none">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <form action="{{ route('education.store') }}" class="row g-3" method="POST">
                                        @csrf
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="degree_name"
                                                placeholder="Degree name">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="year"
                                                placeholder="Passing Year">
                                        </div>
                                        <label for="customRange1" class="form-label">Skill Range</label>
                                        <input type="range" class="form-range" id="customRange1" name="skill">
                                        <div class="col-lg-6">
                                            <button class="btn-sm btn-primary">Add Degree</button>
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
