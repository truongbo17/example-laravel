@extends('sinhvien.app')
@section('content')
    <div class="container">
        @csrf
        <div class="panel-heading">
            <h2 class="text-center">Điểm danh hôm nay</h2>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Lớp</th>
                        <th>Giáo viên</th>
                        <th>Môn học</th>
                        <th>Điểm danh</th>
                        <th>Thống kê</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $index = 1;
                    @endphp
                    @foreach ($lichdayToday as $item)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $item->class_name }}</td>
                            <td>{{ $item->teacher_name }}</td>
                            <td>{{ $item->subject_name }}</td>
                            <td><button class="btn btn-primary"
                                    onclick="window.open('{{ route('sinhvien_view') }}?id={{ $item->id }}','_self')">Điểm
                                    danh</button></td>
                            <td><button class="btn btn-success">Thống kê</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <img src="{{asset('photo/1.jpg')}}" width="50%"> --}}
    </div>
@endsection
