<form  action="{{url('save')}}" method="post" style="width: 100%; text-align: center;margin: 20px;">
	@csrf 	
	<textarea rows = "5" cols = "100%" name = "surgical">
            
    </textarea>
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
       	<button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>