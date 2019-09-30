@extends('layouts.app')
@section('content')

	<form method="post" action="{{route('update')}}" enctype="multipart/form-data">
	@csrf
		<input hidden type="text" name="id" value ="{{$post_data->id}}"> 

			<div class="container">

				<div class="row">
					<label class="col-2">Customer Name:</label>
						<div class="col-10">
							<input  type="text" name="name" class="form-control form-control-sm" value="{{$post_data->name}}">
						</div>
				</div>


	    	
				<div class="row">
						<label class="col-2">Profile Image:</label>
						<div class="col-10">
							<img src="{{asset('uploads/'.$post_data->image)}}" height="100">
							<input type="file" name="image" accept="image/*" value="{{$post_data->image}}">
						</div>
				</div>



			<div class="row">
				<label class="col-2">Email id:</label>
				<div class="col-10">
					<input type="email" name="email" class="form-control form-control-sm" value="{{$post_data->email}}">
				</div>
			</div>


		
			<div class="row">
				<label class="col-2">Phone:</label>
				<div class="col-10">
					<input type="integer" name="number" class="form-control form-control-sm" value="{{$post_data->number}}">
				</div>
			</div>


			
			<div class="row">
				<label class="col-2">Address:</label>
				<div class="col-10">
					<input type="text" name="address" class="form-control form-control-sm" value="{{$post_data->address}}">
				</div>
			</div>


		
		    <div class="row">
		    	<label class="col-1">Country:</label>
		    	<div class="col-2">
		    	 	<select type="text" name="country">
		    	 		<option value="nepal" @if ($post_data->country=="nepal"){{"selected"}} @endif>Nepal</option>
						<option value="india" @if ($post_data->country=="india"){{"selected"}} @endif>India</option>
						<option value="maldives" @if ($post_data->country=="maldives"){{"selected"}} @endif>Maldives</option></select>
					</div>


			<label class="col-1">District:</label>
			<div class="col-2">
			        <select type="text" name="district">
						<option value="kathmandu" @if ($post_data->district=="kathmandu"){{"selected"}} @endif>Kathmandu</option>
						<option value="bhaktapur" @if ($post_data->district=="bhaktapur"){{"selected"}} @endif>Bhaktapur</option>
						<option value="lalitpur" @if ($post_data->district=="lalitpur"){{"selected"}} @endif>Lalitpur</option></select>
					
					</div>
		
		    	<label class="col-1">City: </label>
		    	<div class="col-2">
					<input type="text" name="city" value="{{$post_data->city}}">
				</div>
		    </div>
		    
				
		    	
			
				

			<div class="row">
				<label class="col-2">Maritual Status:</label>
				<div class="col-10">
					<input type="radio" name="status" value="married" @if ($post_data->status=="married"){{"checked"}} @endif>Married
					<input type="radio" name="status" value="unmarried" @if ($post_data->status=="unmarried"){{"checked"}}@endif>Unmarried
				</div>
			</div>


			<div class="row">
				<label class="col-2">Date of birth:</label>
				{{$post_data->dob}}
				<div class="col-10">
					<input type="date" name="dob" class="form-control form-control-sm" value="{{$post_data->dob}}">
				</div>
			</div>
			


			<div class="row">
				<label class="col-2">Gender:</label>
				<div class="col-10">
					<input type="radio" name="gender" value="male" @if ($post_data->gender=="male"){{"checked"}} @endif>Male
				    <input type="radio" name="gender" value="female" @if ($post_data->gender=="female"){{""}}@endif>Female
				</div>
			</div>


			<div class="row">
				<label class="col-2">Social ID:</label>
				<div class="col-10">
					@php($v = $post_data->socialid)
					<input type="checkbox" name="socialid[]" value="Facebook"
					 @if(strpos($post_data->socialid,"Facebook")!== false)
					 {{"checked"}} 
					 @endif>
					Facebook
					 <input type="checkbox" name="socialid[]" value="Instagram"
					@if(strpos($post_data->socialid,"Instagram")!== false)
					 	{{"checked"}} 
					 @endif
					 >Instagram
				</div>
			</div>
			


			<div class="row">
				<input type="checkbox" name="license" value="1">
      			<label class="col-4">Do you have licence?:</label>
      	    </div>

      	    
      	    <div class="row">		
				<input type="checkbox" name="vehicle" value="1">
			<label class="col-4">Do you have vehicle?:</label>
		   </div>
								 

            <div class="row">
            	<div class="col-2">
			<button type="submit" class="btn btn-success">Update</button>
			<button type="reset" class="btn btn-danger">Reset</button>
		</div>
			</div>

			
		</form>
@endsection
