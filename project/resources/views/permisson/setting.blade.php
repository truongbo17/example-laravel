@extends('pos.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background-color: aliceblue">
                <table class="table table-bordered table-striped bg-white">
                    <thead>
                        <th>No</th>
                        <th>Route title</th>
                        <th>Route name</th>
                        <th style="width: 150px"></th>
                    </thead>
                    <tbody>
                        @foreach ($permissonList as $item)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $item['route_title'] }}</td>
                                <td>{{ $item['route_name'] }}</td>
                                <td>
                                    <select name="" id="" class="form-control"
                                        onchange="updatePermisson(this,{{ $item['route_id'] }},{{ $role_id }})">
                                        <option value="0" {{ $item['status'] == 0 ? 'selected' : '' }}>Disable</option>
                                        <option value="1" {{ $item['status'] == 1 ? 'selected' : '' }}>Enable</option>
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function updatePermisson(that, route_id, role_id) {
            status = $(that).val();
            $.post('{{ route('permisson_save') }}', {
                '_token': '{{ csrf_token() }}',
                'route_id': route_id,
                'role_id': role_id,
                'status': status,
            }, function(data) {

            })
        }
    </script>
@endsection
