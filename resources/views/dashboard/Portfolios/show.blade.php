@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Phorfolio</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5>
                                            Portfolio Category:
                                        </h5>
                                    </td>
                                    <td>
                                        <p>{{ $portfolio->category }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>
                                            Portfolio Name:
                                        </h5>
                                    </td>
                                    <td>
                                        <p>{{ $portfolio->portfolio_name }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>
                                            Portfolio Heading:
                                        </h5>
                                    </td>
                                    <td>
                                        <p>{{ $portfolio->portfolio_heading }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>
                                            Portfolio Desciption:
                                        </h5>
                                    </td>
                                    <td>
                                        <p>{{ $portfolio->portfolio_description }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>
                                            Portfolio image:
                                        </h5>
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/portfolio_images') }}/{{ $portfolio->portfolio_image }}" alt="" srcset="" style="width: 300px; border-radius:15%">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
