@extends('qlbook.app')
@section('content')
    <div class="container">
        @csrf
        <div class="panel-heading">
            <h2 class="text-center">Danh sách tac gia</h2>
            <h6>Thêm tac gia : <button onclick="window.open('{{ route('author_view_add') }}','_self')"
                    class="btn btn-success">Click</button></h6>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Nickname</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Phonenumber</th>
                        <th>Address</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authorList as $item)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $item->nickname }}</td>
                            <td>{{ $item->fullname }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phonenumber }}</td>
                            <td>{{ $item->address }}</td>
                            <td>
                                <a href=><button class="btn btn-warning">Sửa</button></a>
                                <button onclick="" class="btn btn-danger">Xóa</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {!! $authorList->links() !!}
        {{-- <img src="{{asset('photo/1.jpg')}}" width="50%"> --}}
    </div>
@endsection
