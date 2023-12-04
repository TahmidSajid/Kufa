@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-body">
                                    <div class="row">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h5>
                                                            Name:
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        <p>{{ $email->name }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5>
                                                            Mail:
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        <p>{{ $email->email }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5>
                                                            Message:
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        <p>{{ $email->message }}</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
