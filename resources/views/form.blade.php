@extends('layouts.app')
@section('content')
	
	<div class="container">
		<div class="col-md-12">
			
			<form method="post" action="{{route('submit')}}" enctype="multipart/form-data">
			@csrf
			
				<script type="text/javascript"  src="jquery-1.3.1.min.js"></script>
				<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
				<script src="{{asset('ckfinder/ckfinder.js')}}"></script>

			
			 		<div class="form-group">
			 			<label class="col-10" >Customer Name:</label>
							
							<div class="col-10">
								<input  type="text" name="name"  class="form-control form-control-sm">
									
									
							</div>
					</div>
					
					<div class="form-group">
						<label class="col-2">Profile Image:</label>

						<div class="col-10" >
							<input type="file" name="image" accept="image/*">
								@if($errors->has('image'))
									<span class="alert-danger">{{$errors->first('image')}}</span>
								@endif
						</div>
					</div>

					<div class="form-group">
						<label class="col-2">Email id:</label>
						
						<div class="col-10">
							<input type="email" name="email" class="form-control form-control-sm">
								@if($errors->has('email'))
						 			<span class="alert-danger">{{$errors->first('email')}}</span>
								@endif
						</div>
					</div>


					<div class="form-group">
						<label class="col-2" >Phone:</label>
						
						<div class="col-10" >
							<input type="integer" name="number" class="form-control form-control-sm">
								@if($errors->has('number'))
						 			<span class="alert-danger">{{$errors->first('number')}}</span>
								@endif
						</div>
					</div>


					<div class="form-group">
						<label class="col-2">Address:</label>
						
						<div class="col-10">
							<input type="text" name="address" class="form-control form-control-sm">
								@if($errors->has('address'))
						 			<span class="alert-danger">{{$errors->first('address')}}</span>
								@endif
						</div>
					</div>

					<div class="form-group">
						<label class="col-2">Description:</label>
						
						<div class="col-10">
							<input type="text" name="description" class="form-control form-control-sm">
						</div>
					</div>

					<div class="form-group">
						<label class="col-1">Country:</label>
		    		
		    			<div class="col-2">
		    	 			<select type="text" name="country">
		    	 				<option value="nepal">Nepal</option>
								<option value="india">India</option>
								<option value="maldives">Maldives</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-1">District:</label>
							
						<div class="col-2">
			        		<select type="text" name="district">
								<option value="kathmandu">Kathmandu</option>
								<option value="bhaktapur">Bhaktapur</option>
								<option value="lalitpur">Lalitpur</option></select>
					
						</div>
					</div>

					<div class="form-group">
						<label class="col-1">City: </label>
		    	
		    			<div class="col-2">
							<input type="text" name="city">
								@if($errors->has('city'))
						 			<span class="alert-danger">{{$errors->first('city')}}</span>
								@endif
						</div>
		    		</div>

		    		<div class="form-group">
		    			<label class="col-2">Maritual Status:</label>

						<div class="col-10">
							<input type="radio"   class="aboveage1" name="status" value="married">Married
							<input type="radio" class="aboveage1" name="status" value="unmarried">Unmarried
								@if($errors->has('status'))
						 			<span class="alert-danger">{{$errors->first('status')}}</span>
								@endif
						</div>
		    		</div>

		    		<div class="form-group">
		    			<label class="col-2">Date of birth:</label>
							
						<div class="col-10">
							<input type="date" name="dob" class="form-control form-control-sm" onchange="age()">
								@if($errors->has('dob'))
						 			<span class="alert-danger">{{$errors->first('dob')}}</span>
								@endif
					
						</div>
		    		</div>

		    		<div class="form-group">
		    			<label class="col-2">Gender:</label>
						
						<div class="col-10">
							<input type="radio" name="gender"  value="male">Male
				    		<input type="radio" name="gender"  value="female">Female
				    			@if($errors->has('gender'))
						 			<span class="alert-danger">{{$errors->first('gender')}}</span>
								@endif
						</div>
		    		</div>
						
					<div class="form-group"><label class="col-2">Social ID:</label>
						<div class="col-10">
							<input type="checkbox" name="socialid[]" value="Facebook" id="facebook">Facebook
							<input type="text" name="social[]"  id="text" placeholder="Enter your facebook link here">
							<input type="checkbox" name="socialid[]" value="Instagram" id="instagram">Instagram
					 		<input type="text" name="social[]"  id="test1" placeholder="Enter your insta link here">
								@if($errors->has('socialid'))
						 			<span class="alert-danger">{{$errors->first('socialid')}}</span>
								@endif
						</div>
					</div>
		
			


				<div class="form-group-row">
				<input type="checkbox" name="license" value="1">
      			<label class="col-4">Do you have licence?:</label>
      			</div>
      	   

      	    
      	    	<div class="form-group-row">
				<input type="checkbox" name="vehicle" value="1">
			<label class="col-4">Do you have vehicle?:</label>
			</div>
		   
								 

   
            	<div class="col-2">
			<button type="submit" class="btn btn-success">Submit</button>
			<button type="reset" class="btn btn-danger">Reset</button>
		</div>
		
			</div>



			<!-- <ol class="formset">
        <li><label for="fname1">First Name: </label>
    <input type="text" id="fname1" value="" name="fname1"/></li>
 
        <li><label for="lname1">Last Name: </label>
    <input type="text" id="lname1" value="" name="lname1"/></li>
 
        <li><label for="email1">Email Address: </label><br />
    <input type="text" id="email1" value="" name="email1" /></li>
 
        <li><label for="age1">Are you above 21 yrs old?</label>
    <input type="radio" name="age1" value="Yes" class="aboveage1" /> Yes
    <input type="radio" name="age1" value="No" class="aboveage1" /> No</li>
</ol> -->
<ol id="parent1" class="formset" diabled="true">
<li><strong>Parent/Guardian Information:</strong></li>
        <li><label for="pname1">Parent Name: </label>
    <input type="text" id="pname1" value="" name="pname1"/></li>
        <li><label for="contact1">Contact No.: </label>
    <input type="text" id="contact1" value="" name="contact1"/></li>
</ol>

<div id="parent-1">
    <div id="child-1" class="child">CHILD 1
       <div id="sub-child-1" class="subchild">SUB CHILD 1</div>
       <div id="sub-child-2" class="subchild">SUB CHILD 2</div>
       <div id="sub-child-3" class="subchild">SUB CHILD 3</div>
    </div>
    <div id="child-2" class="child">CHILD 2</div>
    <div id="child-3" class="child">CHILD 3</div>
</div>
			</form>
		</div>
		</div>


<script type="text/javascript">
	$(document).ready(function(){
    $("#parent1").css("display","none");
        $(".aboveage1").click(function(){
        if ($('input[name=status]:checked').val() == "unmarried" ) {
           // $("#parent1").slideDown("fast"); //Slide Down Effect
            $("#parent1").show();
        } else {
            $("#parent1").hide();  //Slide Up Effect
        }
     });
});
</script>

<script type="text/javascript">
	$(document).ready(function () {
   $('div#parent-1 > div:eq(2)').css("display", "none");
});
</script>



			<script>
				$(document).ready (function()
				{





					$('#text').hide();
  					$('#facebook').on('change',function()
  					{
  						if(this.checked)
  							{
  								$('#text').show();
  							}
  								else
  									{
  										$('#text').hide();
  										$('#text').val('');
  									}
 
					});
 				
  				
  					$('#test1').hide();
  					$('#instagram').on('change',function()
  					{
  				 		if(this.checked)
  							{
  								$('#test1').show();
  							}
  								else
  									{
  										$('#test1').hide();
  										$('#test1').val('');
  									}
 
					});
   					
				});

			
 			

  	
  
			</script>
			<script>
  // CKEDITOR.replace('description');
  // CKFINDER.replace('description');
  var editor = CKEDITOR.replace('description');
  CKFinder.setupCKEditor( editor ,{
  // CKEDITOR.replace( 'description', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '700'
} );

</script> 


			
		
@endsection
