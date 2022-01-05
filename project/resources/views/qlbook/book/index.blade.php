@extends('qlbook.app')
@section('content')
    <div class="container">
        @csrf
        <div class="panel-heading">
            <h2 class="text-center">Danh sách quốn sách</h2>
            <h6>Thêm sách : <button onclick="window.open('{{ route('book_view_add') }}','_self')"
                    class="btn btn-success">Click</button></h6>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Price</th>
                        <th>NBX</th>
                        <th>Nickname</th>
                        <th>Tên tác giả</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookList as $item)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->content }}</td>
                            <td>{{ number_format($item->price) }} VNĐ</td>
                            <td>{{ $item->nxb }}</td>
                            <td>{{ $item->nickname }}</td>
                            <td>{{ $item->fullname }}</td>
                            <td>
                                <a href=><button class="btn btn-warning">Sửa</button></a>
                                <button onclick="" class="btn btn-danger">Xóa</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {!! $bookList->links() !!}
        {{-- <img src="{{asset('photo/1.jpg')}}" width="50%"> --}}
    </div>
@endsection
