@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Edit Fact</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 offset-lg-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form action="{{ route('fact.update', $fact->id) }}" class="row g-3" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-lg-4">
                                            <label for="" class="form-label">Fact name</label>
                                            <input type="text" class="form-control" name="fact_name"
                                                placeholder="Fact name" value="{{ $fact->fact_name }}">
                                            @error('fact_name')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="" class="form-label">Fact number</label>
                                            <input type="text" class="form-control" name="fact_number"
                                                placeholder="Fact number" value="{{ $fact->fact_number }}">
                                            @error('fact_number')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="" class="form-label">Fact icon</label>
                                            <input type="text" class="form-control d-none" name="fact_icon"
                                                placeholder="Fact icon" id="icon-input" value="{{ $fact->fact_icon }}">
                                            <p class="text-center">
                                                <i class="{{ $fact->fact_icon }}" style="font-size: 35px"
                                                    id="icon-show"></i>
                                            </p>
                                            @error('fact_icon')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-primary">Update Fact</button>
                                        </div>
                                    </form>
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
    </div>
@endsection
