

@extends('layouts.shichhya')

@section('content')


@if($post_data)
				
	
<div style="width:100%; padding: 0;margin:0; text-align: center;">
	@foreach($post_data as $key=> $detail) 
			<h2>{{$detail->name}}</h1>
			<p>
				<img src="{{asset('uploads/'.$detail->image)}}" alt="image" width="450">
				<p>
					{{$detail->address}}

					{{$detail->email}}
					{{$detail->number}}
					{{$detail->country}}
					{{$detail->district}}
					{{$detail->city}}
					{{$detail->status}}
					{{$detail->dob}}
					{{$detail->gender}}
					{{$detail->socialid}}
					{{$detail->social}}
					{{($detail->license)?"Yes":"No"}}{{($detail->vehicle)?"Yes":"No"}}
				</p>
			</p>

	@endforeach						

<div>
	
@endif				
@endsection