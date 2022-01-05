@extends('pos.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background-color: aliceblue">
                <table class="table table-bordered table-striped bg-white">
                    <thead>
                        <th>No</th>
                        <th>Route name</th>
                    </thead>
                    <tbody>
                        @foreach ($roleList as $item)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td><a href="{{ route($item->route_name) }}" target="_blank">{{ $item->route_title }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
