@extends('history.layout')

@section('eltema')
<form  action="{{url('save')}}" method="post" style="width: 100%; text-align: center;margin: 20px;">
	@csrf 	
	<strong>PHYSICIANS NOTE</strong><br>
	<textarea style="resize: none;" rows = "5" cols = "100%" name = "note" >
            
    </textarea>

	<br><strong>DIAGNOSIS:</strong><br>
    <textarea style="resize: none;" rows = "5" cols = "100%" name = "diagnosis"></textarea>

    <div class="form-group">
		 <br><strong>TREATMENT PLAN:</strong><br> 
		 <textarea style="resize: none;" rows = "5" cols = "100%" name = "plan"></textarea>
    </div>

    <div class="form-group">
        <br><strong>FOLLOW UP:</strong>
        <input type="text" name="followup" value="" class="form-inline"   maxlength="30" size="30" required>
    </div>

    <div class="form-group">
        <br><strong>PHYSICIAN:</strong>
        <input type="text" name="physician" value="" class="form-inline"   maxlength="30" size="30" required>        
    </div>

 	<div class="form-inline">
        <div class="form-group">
            <strong>DATE:</strong>
            <input type="date" name="followup" value="" class="form-inline"   maxlength="30" size="30" required>
        </div>
     </div>


	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
       	<button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection