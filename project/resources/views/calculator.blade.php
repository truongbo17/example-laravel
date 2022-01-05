@extends('layouts.app')

@section('content')
<div class="container">
	<h6>Calculator</h6>
	<form method="GET" class="form-group">

		@csrf

		<input type="number" name="a" step="0.1" size="100" placeholder="Enter a" value="{{ $a }}">
		{{ $cal }}
		<input type="number" name="b" step="0.1" size="100" placeholder="Enter b" value="{{ $b }}">
		=
		<input type="number" name="result" step="0.1" size="100" disabled value="{{ $result }}">
		<br>
		<br>
		<button class="btn btn-success" name="cal" value="+">Addition</button>
		<button class="btn btn-warning" name="cal" value="-">Subtraction</button>
		<button class="btn btn-primary" name="cal" value="x">Multiplication</button>
		<button class="btn btn-danger" name="cal" value="/">Division</button>
	</form>
	<a href="{{ route('calculator') }}">CLICK</a>
</div>

@endsection