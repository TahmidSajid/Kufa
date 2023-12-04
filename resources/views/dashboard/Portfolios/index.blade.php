@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="row">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr class="text-center">
                                            <th scope="col">#</th>
                                            <th scope="col">Portfolio Category</th>
                                            <th scope="col">Portfolio Name</th>
                                            <th scope="col">Portfolio Heading</th>
                                            <th scope="col">Portfolio Description</th>
                                            <th scope="col">Portfolio Image</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($portfolios as $portfolio)
                                            <tr class="text-center">
                                                <th scope="row">1</th>
                                                <td>{{ $portfolio->category }}</td>
                                                <td>{{ $portfolio->portfolio_name }}</td>
                                                <td>{{ Str::limit($portfolio->portfolio_heading,10)}}</td>
                                                <td>{{ Str::limit($portfolio->portfolio_description,10)}}</td>
                                                <td><img src="{{ asset('uploads/portfolio_images') }}/{{ $portfolio->portfolio_image }}"
                                                        alt="img" style="width: 80px"></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-4 text-center">
                                                            <a href="{{ route('portfolio.edit',$portfolio->id) }}" class="btn btn-success" style="text-decoration: none">Edit</a>
                                                        </div>
                                                        <div class="col-lg-4 text-center">
                                                            <a href="{{ route('portfolio.show',$portfolio->id,) }}" class="btn btn-primary" style="text-decoration: none">Show</a>
                                                        </div>
                                                        <div class="col-lg-4 text-center">
                                                            <form action="{{ route('portfolio.destroy',$portfolio->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
