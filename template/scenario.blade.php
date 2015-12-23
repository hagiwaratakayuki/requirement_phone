@extends('layout')
@section('content')
<div class="content-box-large">
  	<div class="panel-heading">
		<div class="panel-title">Call Scenario</div>
	</div>
  	<div class="panel-body">
		<form action="scenario_update.php" method="post">
		  <input type="hidden" name='phonenumber' value='{{$params['phoneNumber']}}'>
		  <div class="form-group">
		    <label for="description">Description</label>
		    <textarea class="form-control" name='dewscription' id="description" placeholder="enter description">{{isset($params['description']) ? $params['description'] : ''}}</textarea>
		  </div>
		  <div class="form-group">
		    <label for="response_1">response to cloth needs(push 1)</label>
		    <textarea class="form-control" name="response_1" id="response_1" placeholder="Response to cloth needs">{{isset($params['response_1']) ? $params['response_1'] : ''}}</textarea>  </div>
		  <div class="form-group">
		    <label for="response_2">response to food needs(push 2)</label>
		    <textarea class="form-control" name="response_2" id="response_2" placeholder="Response to food needs">{{isset($params['response_2']) ? $params['response_2'] : ''}}</textarea>
		  </div>
		  <div class="form-group">
		    <label for="response_3">response to house needs(push 3)</label>
		    <textarea class="form-control" name="response_3" id="response_3" placeholder="Response to house needs">{{isset($params['response_3']) ? $params['response_3'] : ''}}</textarea>
		  </div>
		  <div class="form-group">
		    <label for="response_4">Response to medical needs(push 4)</label>
		    <textarea class="form-control" name="response_4" id="response_4" placeholder="Response to medical needs">{{isset($params['response_4']) ? $params['response_4'] : ''}}</textarea>
		  </div>
		  <div class="form-group">
		    <label for="response_5">Response to move needs(push 5)</label>
		    <textarea class="form-control" name="response_5" id="response_5" placeholder="Response to medical needs">{{isset($params['response_5']) ? $params['response_5'] : ''}}</textarea>
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</div>
@endsection
