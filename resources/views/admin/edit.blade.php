@extends('layouts.dashboard')
@section('title') Test @endsection
@section('content')



<div class="container" >
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<div class="portlet light ">
				<div class="portlet-title" >
					<div class="caption">
						<i class="icon-settings font-red"></i>
						<span class="caption-subject font-red sbold uppercase"><b>Test Views</b></span>
					</div>
					<div class="actions">
						<div class="btn-group btn-group-devided" data-toggle="buttons">


							<a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-circle btn btn-transparent red btn-outline  btn-sm active" >Add Warehouse</a>


						</div>
					</div>
					<div class="portlet-body" id="items">
						<div class="table-scrollable">

							<table class="table table-hover table-light" id="myTable">
								<thead>
									<tr>
										<th>Test Name</th>
										<th>Test FName</th>
										<th>Test Phone Number</th>
										<th>Test Action </th>
										<th>Status</th>

									</tr>
								</thead>
								<tbody >
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>

								</tbody>
							</table>


						</div>	
					</div>	
				</div>
				@endsection


				@section('script')



				@endsection