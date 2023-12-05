@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Mail Inbox</h1>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="row">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr class="text-center">
                                            <th scope="col">#</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Customer Email</th>
                                            <th scope="col">Customer Message</th>
                                            <th scope="col">Send At</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mails as $mail)
                                            <tr class="text-center">
                                                <th scope="row">1</th>
                                                <td>{{ $mail->name }}</td>
                                                <td>{{ $mail->email }}</td>
                                                <td>{{ Str::limit($mail->message,10)}}</td>
                                                <td>{{ $mail->updated_at }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-6 text-center">
                                                            <a href="{{ route("email.show",$mail->id) }}" class="btn btn-primary" style="text-decoration: none">Show</a>
                                                        </div>
                                                        <div class="col-lg-6 text-center">
                                                            <form action="{{ route('email.destroy',$mail) }}" method="POST">
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
