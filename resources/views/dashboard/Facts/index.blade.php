@extends('layouts.dashboard')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center">Add Facts Number</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Fact Name</th>
                                            <th scope="col">Fact Number</th>
                                            <th scope="col">Fact Icon</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($facts as $fact)
                                            <tr class="text-center">
                                                <td>{{ $fact->fact_name }}</td>
                                                <td>{{ $fact->fact_number }}</td>
                                                <td style="font-size: 25px"><i class="{{ $fact->fact_icon }}"></i></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-xl">
                                                            <a class="btn btn-primary" href="{{ route('fact.edit',$fact->id) }}">Edit</a>
                                                        </div>
                                                        <div class="col-xl">
                                                            <form action="{{ route('fact.destroy',$fact->id) }}" method="POST">
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
                                <div class="row">
                                    <form action="{{ route('fact.store') }}" class="row g-3" method="POST">
                                        @csrf
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" name="fact_name"
                                                placeholder="Fact name">
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" name="fact_number"
                                                placeholder="Fact number">
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" name="fact_icon"
                                                placeholder="Fact icon" id="icon-input" readonly style="background: transparent">
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-primary">Add Fact</button>
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
