@extends('layouts.dashboard')
@section('Title') MCR @endsection
@section('content')
                    {{-- Customer login see products --}}
<div class="container" >
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<div class="portlet light ">
				<div class="portlet-title" >
					<div class="caption">
						<i class="icon-settings font-red"></i>
						<span class="caption-subject font-red sbold uppercase"><b>MCR</b></span>
					</div>
					<div class="actions">
						<div class="btn-group btn-group-devided" data-toggle="buttons">


							<a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-circle btn btn-transparent purple btn-outline  btn-sm active" >Add New MCR</a>
						</div>
					</div>
					<div class="portlet-body" id="items">
						<div class="table-scrollable">

							<table class="table table-hover table-light" id="myTable">
								<thead>
									<tr>
                                        <th>Vendor Name</th>
                                        <th>Driver Name</th>
                                        <th>Contact No</th>
                                        <th>Vehicle</th>
                                        <th>Vehicle Number</th>
                                        <th>Origin</th>
                                        <th>Destination</th>
                                        <th>Via</th>
                                    </tr>
                                </thead>
                                <tbody >
                                   @foreach($mcrs as $key => $mcr)
                                   <tr>
                                       <td>{{ $mcr->vendor->name ?? 'Null' }}</td>
                                       <td>{{ $mcr->mcr_driver_name }}</td>
                                       <td>{{ $mcr->mcr_driver_cell }}</td>
                                       <td>{{ $mcr->vehicle->vehicle_name ?? 'Null' }}</td>
                                       <td>{{ $mcr->vehicle->vehicle_number ?? 'Null' }}</td>
                                       <td>{{ $mcr->mcr_from }}</td>
                                       <td>{{ $mcr->mcr_to }}</td>
                                       <td>{{ $mcr->mcr_via }}</td>
                                   </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>




        


           


            {{-- start  model --}}

            <div class="modal fade in" id="addmodel" tabindex="-1" role="basic" aria-hidden="true" style=" padding-right: 16px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Create New MCR</h4>
                        </div>
                        <div class="modal-body" > 

                            <form class="form-horizontal" method="POST" action="{{ route('mcr.store') }}">

                                {{ csrf_field() }}
                                
                                <div class="form-group{{$errors->has('mcr_vendor') ? ' has-error' : '' }}">
                                        <label for="mcr_vendor" class="col-md-4 control-label">Vendor</label>
                                        <div class="col-md-6">
                                            {!! Form::select('mcr_vendor',$vendors, null, ['placeholder' => 'Select a Vendor...', 'class'=>'form-control']) !!}
                                            @if ($errors->has('mcr_vendor'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mcr_vendor') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group{{ $errors->has('mcr_driver_name') ? ' has-error' : '' }}">
                                    <label for="mcr_driver_name" class="col-md-4 control-label">Driver Name</label>

                                    <div class="col-md-6">
                                        <input id=" mcr_driver_name" type="text" class="form-control" name="mcr_driver_name" required>

                                        @if ($errors->has('mcr_driver_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mcr_driver_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('mcr_driver_cell') ? ' has-error' : '' }}">
                                    <label for="mcr_driver_cell" class="col-md-4 control-label">Driver Cell</label>

                                    <div class="col-md-6">
                                        <input id="" type="text" class="form-control" name="mcr_driver_cell" required>

                                        @if ($errors->has('mcr_driver_cell'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mcr_driver_cell') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{$errors->has('mcr_vehicle') ? ' has-error' : '' }}">
                                        <label for="mcr_vehicle" class="col-md-4 control-label">Vehicle</label>
                                        <div class="col-md-6">
                                            {!! Form::select('mcr_vehicle',$vehicles, null, ['placeholder' => 'Select a Vehicle...', 'class'=>'form-control']) !!}
                                            @if ($errors->has('mcr_vehicle'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mcr_vehicle') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                <div class="form-group{{ $errors->has('mcr_from') ? ' has-error' : '' }}">
                                    <label for="mcr_from" class="col-md-4 control-label">Origin</label>

                                    <div class="col-md-6">
                                        <input id="" type="text" class="form-control" name="mcr_from" required>

                                        @if ($errors->has('mcr_from'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mcr_from') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="mcr_to" class="col-md-4 control-label">To</label>

                                    <div class="col-md-6">
                                        <input id="" type="text" class="form-control" name="mcr_to" required>
                                    </div>

                                    @if ($errors->has('mcr_to'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mcr_to') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                
                                <div class="form-group">
                                    <label for="mcr_via" class="col-md-4 control-label">Description</label>

                                    <div class="col-md-6">
                                        <input id="" type="textarea" class="form-control" name="mcr_via" required>
                                    </div>
                                    
                                    @if ($errors->has('mcr_via'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mcr_via') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="col-md-2 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Proceed
                                        </button>
                                    </div>
                                    <div class="col-md-6 ">
                                        <button type="submit" class="btn btn-primary" data-dismiss="modal">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                                            {{-- /.modal-content  --}}
                                        </div>
                                        {{-- /.modal-dialog --}}
                                    </div>
                                    </div>
                                    {{-- end  model --}}


                                </div>
                                
                                @endsection


                                @section('script')

                                    <script type="text/javascript">
                                    </script>
                                @endsection