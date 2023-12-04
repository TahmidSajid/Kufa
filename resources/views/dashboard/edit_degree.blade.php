@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="row">
                                    <h4>Edit Degree</h4>
                                    <form action="{{ route('upload_degree') }}" class="row g-3" method="POST">
                                        @csrf
                                        <div class="col-lg-6">
                                            <label for="customRange1" class="form-label">Degree name</label>
                                            <input type="text" class="form-control" name="degree_name" placeholder="Degree name" value="{{ $edu->degree_name }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="customRange1" class="form-label">Passing Year</label>
                                            <input type="text" class="form-control" name="year" placeholder="Passing Year" value="{{ $edu->year }}">
                                        </div>
                                        <label for="customRange1" class="form-label">Skill Range</label>
                                        <input type="range" class="form-range" id="customRange1" name="skill" value="{{ $edu->skill }}">
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
