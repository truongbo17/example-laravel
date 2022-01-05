@extends('qlbook.app')
@section('content')
    <div class="container">
        @csrf
        <div class="panel-heading">
            <h2 class="text-center">Them sach</h2>
            <h6>danh sach quyen sach : <button onclick="window.open('{{ route('book_index') }}','_self')"
                    class="btn btn-success">Click</button></h6>
        </div>
        <form action="{{ route('book_add') }}" method="POST">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                    <label for="title"></label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Nhập title" required>
                </div>
                <div class="form-group">
                    <label for="content"></label>
                    <input type="text" name="content" id="content" class="form-control" placeholder="Nhập content"
                        required>
                </div>
                <div class="form-group">
                    <label for="price"></label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="Nhập price" required>
                </div>
                <div class="form-group">
                    <label for="nxb"></label>
                    <input type="text" name="nxb" id="nxb" class="form-control" placeholder="Nhập nxb" required>
                </div>
                <div class="form-group">
                    <label for="nickname"></label>
                    <select name="nickname" id="nickname" class="form-control">
                        @foreach ($nicknameList as $item)
                            <option value="{{ $item->nickname }}">{{ $item->fullname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
