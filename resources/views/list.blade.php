@extends('layouts.shichhya')
@section('title','list')
@section('content')


<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- <script type="text/javascript" src="jquery-1.3.1.min.js"></script> -->
	
<body>
<!-- <script>
	body{
		.scrolling-wrapper {
  overflow-x: scroll;
  overflow-y: hidden;
  white-space: nowrap;

  .card {
    display: inline-block;
  }
}
	}
</script> -->
							
			
		<table id="tablecontent" class="table border">
			<thead>
				<tr>
					<th>SN</th>
					<th>name</th>
					<th>image</th>
					<th>address</th>
					<th>email</th>
					<th>number</th>
					<th>country</th>
					<th>district</th>
					<th>city</th>
					<th>status</th>
					<th>dob</th>
					<th>gender</th>
					<th>socialid</th>
					<th>social</th>
					<th>license</th>
					<th>vehicle</th>
					<th>Action</th>
				
				</tr>
			</thead>
			<tbody>
			
					@if($post_data)
					
					@foreach($post_data as $key=> $detail) 


					<tr>
						<td>{{$key+1}}</td>
						<td>{{$detail->name}}</td>
						<td><img src="{{asset('imgupload/'.$detail->image)}}" alt="image" height="100"></td>
						<td>{{$detail->address}}</td>
						<td>{{$detail->email}}</td>
						<td>{{$detail->number}}</td>
						<td>{{$detail->country}}</td>
						<td>{{$detail->district}}</td>
						<td>{{$detail->city}}</td>
						<td>{{$detail->status}}</td>
						<td>{{$detail->dob}}</td>
						<td>{{$detail->gender}}</td>
						<td>{{$detail->socialid}}</td>
						<td>{{$detail->social}}</td>
						<td>{{($detail->license)?"Yes":"No"}}</td>
						<td>{{($detail->vehicle)?"Yes":"No"}}</td>
						<td><a href= "{{url('/edit/'.$detail->id)}}">Edit / </a> <a href="{{url('/delete/'.$detail->id)}}">Delete</a></td>
						
						
					</tr>
					@endforeach
					@endif



					</tbody>

	






<script>
$(document).ready(function() {
    $('#tablecontent').DataTable( {
        "scrollX": true
    } );
} );
</script>


						

				
				
			
			</table>

			<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
<!-- </style>
</head>




<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>


			</body>
</html>
				
@endsection




