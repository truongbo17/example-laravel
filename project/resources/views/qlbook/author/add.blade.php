@extends('qlbook.app')
@section('content')
    <div class="container">
        @csrf
        <div class="panel-heading">
            <h2 class="text-center">Them tac gia</h2>
            <h6>danh sach tac gia : <button onclick="window.open('{{ route('author_index') }}','_self')"
                    class="btn btn-success">Click</button></h6>
        </div>
        <form action="{{ route('post_add') }}" method="POST">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                    <label for="nickname"></label>
                    <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Nhập nick name"
                        required>
                </div>
                <div class="form-group">
                    <label for="fullname"></label>
                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Nhập tên" required>
                </div>
                <div class="form-group">
                    <label for="email"></label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required>
                </div>
                <div class="form-group">
                    <label for="address"></label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Nhập dia chỉ"
                        required>
                </div>
                <div class="form-group">
                    <label for="phonenumber"></label>
                    <input type="number" name="phonenumber" id="phonenumber" class="form-control" placeholder="Nhập sdt"
                        required>
                </div>
            </div>
            <button class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
