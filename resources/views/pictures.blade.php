
  
      @foreach ($images as $image)
        <div class="row">
        
        <div class="col-8">
            <img src="{{ asset('uploads/' . $image->getFilename()) }}" height="100">
        </div>
        </div>



  
      @endforeach

      
<a href="{{url('del/')}}">Del</a>


 