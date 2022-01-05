@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/library.css') }}">
@endsection
@section('content')
    <div class="container">
        @csrf
        <div class="panel-heading">
            <h2 class="text-center">Danh sách sinh viên</h2>
            <h6>Thêm sinh viên : <a href="{{ route('viewinputuser') }}">Click</a></h6>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Fullname</th>
                        <th>Gioitinh</th>
                        <th>Ngay sinh</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $index = 1;
                    @endphp
                    @foreach ($studentList as $item)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $item->fullname }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->address }}</td>
                            <td>
                                <a href="{{ route('viewinputuser') }}?id={{ $item->id }}"><button
                                        class="btn btn-warning">Sửa</button></a>
                                <button onclick="deleteStudent({{ $item->id }})" class="btn btn-danger">Xóa</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <img src="{{asset('photo/1.jpg')}}" width="50%"> --}}
    </div>
@endsection
<script>
    function deleteStudent(id) {
        $.post("{{ route('deletestudent') }}", {
                '_token': $('[name=_token]').val(),
                'id': id
            },
            function(data, status) {
                location.reload();
            });
    }
</script>
