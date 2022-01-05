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
                        <th>Rollno</th>
                        <th>Học sinh</th>
                        <th style="text-align: center">Vắng mặt</th>
                        <th style="text-align: center">Đi học</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($studentList != null)
                        @php
                            $index = 1;
                        @endphp
                        @foreach ($studentList as $item)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $lichday->class_name }}</td>
                                <td>{{ $item->rollno }}</td>
                                <td>{{ $item->fullname }}</td>
                                <td>
                                    <input type="radio" name="{{ $item->id }}" value="0" class="form-control">
                                </td>
                                <td>
                                    <input type="radio" name="{{ $item->id }}" value="1" class="form-control" checked>
                                </td>
                                <td>
                                    <input type="text" name="note_{{ $item->id }}" class="form-control">
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    @if ($edit != null && count($edit) > 0)
                        @php
                            $index = 1;
                        @endphp
                        @foreach ($edit as $item)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $lichday->class_name }}</td>
                                <td>{{ $item->rollno }}</td>
                                <td>{{ $item->fullname }}</td>
                                <td>
                                    <input type="radio" name="{{ $item->id }}" value="0" class="form-control"
                                        {{ $item->status == 0 ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <input type="radio" name="{{ $item->id }}" value="1" class="form-control"
                                        {{ $item->status == 1 ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <input type="text" name="note_{{ $item->id }}" class="form-control"
                                        value="{{ $item->note }}">
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{-- <img src="{{asset('photo/1.jpg')}}" width="50%"> --}}
        <button class="btn btn-success" onclick="submitData()">Save</button>
    </div>
    <script>
        function submitData() {
            //đẩy data lên bằng json
            //thong tin sinh viên,lịch dạy
            statusList = jQuery('input[type=radio]:checked');
            data = [];
            for (i = 0; i < statusList.length; i++) {
                std = {
                    'id': jQuery(statusList[i]).attr('name'),
                    'status': jQuery(statusList[i]).val(),
                    'note': jQuery('[name=note_' + jQuery(statusList[i]).attr('name') + ']').val()
                }
                data.push(std);
            }
            $.post('{{ route('sinhvien_post') }}', {
                    '_token': "{{ csrf_token() }}",
                    'id_lichday': {{ $lichday->id }},
                    'data': JSON.stringify(data)
                },
                function(dt) {
                    location.reload();
                })
        }
    </script>
@endsection
