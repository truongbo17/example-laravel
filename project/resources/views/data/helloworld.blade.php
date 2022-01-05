@extends('layouts.app')

@section('content')
@php
    $id = $fullname = $email = $address = '';
@endphp
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
            <h4>View List User <a href="{{ route('showstudent') }}">Click</a></h4>
            <div class="panel-heading">
                <h2 class="text-center">Nhập thông tin người dùng</h2>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('dopostuser') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input required="true" type="text" class="form-control" id="fullname" name="fullname"
                            value="{{ $fullname }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input required="true" type="email" class="form-control" id="email" name="email"
                            value="{{ $email }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $address }}">
                    </div>
                    <button class="btn btn-success">{{ $id != '' ? 'Sửa' : 'Thêm' }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
