@extends('pos.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background-color: aliceblue">
                <table class="table table-bordered table-striped bg-white">
                    <thead>
                        <th>No</th>
                        <th>Role name</th>
                        <th style="width: 50px"></th>
                    </thead>
                    <tbody>
                        @foreach ($roleList as $item)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $item->role_name }}</td>
                                <td><a href="{{ route('permisson_setting') }}?id={{ $item->id }}"><button
                                            class="btn btn-primary">Setting
                                            Permisson</button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
