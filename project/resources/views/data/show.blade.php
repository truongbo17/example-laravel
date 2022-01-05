@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <h6>hello {{ $msg }}</h6> --}}
        {{-- <h2>Result : {{ $result }}</h2> --}}
        {{-- <table class="table">
            <thead>
                <tr>
                    <td>STT</td>
                    <td>name</td>
                    <td>age</td>
                    <td>address</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1;
                @endphp
                @foreach ($studentList as $item)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $item['fullname'] }}</td>
                        <td>{{ $item['age'] }}</td>
                        <td>{{ $item['address'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Thông tin người dùng</h2>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="fullname">Full Name: {{ $fullname }}</label>
                </div>
                <div class="form-group">
                    <label for="email">Email: {{ $email }}</label>
                </div>
                <div class="form-group">
                    <label for="address">Address: {{ $address }}</label>
                </div>
                <a href="{{ route('viewinputuser') }}">Quay lại</a>
            </div>
        </div>
    </div>

@endsection
