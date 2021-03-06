@extends('layout')
@section('content')
<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Survey Result</div>
				</div>
  				<div class="panel-body">
  					<div role="grid" class="dataTables_wrapper form-inline" id="example_wrapper">
  						<div class="row">
  							<div class="col-xs-6">
  								<div id="example_length" class="dataTables_length">
  									<label>
  										<select name="example_length" size="1" aria-controls="example">
  											<option value="10" selected="selected">10</option>
  											<option value="25">25</option><option value="50">50</option>
  											<option value="100">100</option>
  											</select> records per page
  									</label>
  								</div>
  							</div>
  							<div class="col-xs-6">
  								<div class="dataTables_filter" id="example_filter">
  									
  								</label>
  							</div>
  						</div>
  					</div>
  				<table cellspacing="0" cellpadding="0" border="0" id="example" class="table table-striped table-bordered dataTable" aria-describedby="example_info">
					<thead>
						<tr role="row">
							<th class="" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 166px;" aria-sort="ascending" aria-label="">Phone Number</th>
							<th class="" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-label="">Choice</th>
							<th class="" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-label="">Phone Date</th>
							<th class="" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-label="">Message</th>
						</tr>
					</thead>						
					<tbody role="alert" aria-live="polite" aria-relevant="all">
					@foreach ($params as $param)
					<tr class="gradeA odd">
							<td class="">{{$param['phone-number']}}</td>
							<td class="">{{$param['choice']}}</td>
							<td class="">{{$param['created']}}</td>
							<td class="">
								<p>{{$param['speechtext']}}</p>
								<p><a href="{{$param['recording_url']}}.mp3" target='_blank'><i class="glyphicon glyphicon-play"></i> hear message</a></td>
							
					</tr>
						@endforeach
						
					</tbody>
				</table>
				<div class="row">
						<div class="col-xs-6">
							<div class="dataTables_info" id="example_info"></div>
						</div>
						<div class="col-xs-6">
							<div class="dataTables_paginate paging_bootstrap">
								<ul class="pagination">
									<li class="prev disabled"><a href="#">← Previous</a></li>
									<li class="next disabled">
									<a href="#">Next → </a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
  			</div>
 </div>
@endsection
