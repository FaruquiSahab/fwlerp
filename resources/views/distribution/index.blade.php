@extends('layouts.dashboard')
@section('Title') Distributor @endsection
@section('content')

<div class="container" >
	<div class="row">
		<div class="col-md-5" >
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<div class="portlet light " style="margin-left: 20px;">
				<div class="portlet-title" >
					<div class="caption">
						<i class="icon-settings font-red"></i>
						<span class="caption-subject font-red sbold uppercase"><b>Distribution</b></span>
					</div>
					<div class="portlet-body" id="items">
						<div class="table-scrollable">

							<table class="table table-hover table-light" id="myTable">
								<thead>
									<tr>
                                        <th>Customer Name</th>
                                        <th>Reciever Name</th>
                                        <th>Item</th>
                                        <th>Packing</th>
                                        <th>Station</th>
                                        <th>Vehicle</th>
                                        <th>CN</th>
                                        <th>Charges</th>
                                        <th>Agent</th>
                                        <th>Status</th>
                                        <th>Re Routed</th>
                                    </tr>
                                </thead>
                                <tbody >
                                 @foreach($distributions as $key => $distribution)
                                 <tr>
                                    <td>{{ $distribution->customer_name }}</td>
                                    <td>{{ $distribution->reciever_name }}</td>
                                    <td>{{ $distribution->item }}</td>
                                    <td>{{ $distribution->packing }}</td>
                                    <td>{{ $distribution->station }}</td>
                                    <td>{{ $distribution->vehicle_type }}</td>
                                    <td>{{ $distribution->cn }}</td>
                                    <td>{{ $distribution->charges }}</td>
                                    <td>{{ $distribution->agent_name }}</td>
                                    <td>
                                    @if($distribution->status == "Delivered")
                                    <form method="POST" action="distribution/setStatus" >
                                        {{ csrf_field() }}
                                        <input type="hidden" name="d_id" value="{{ $distribution->d_id }}">
                                        <button type="submit" class="btn btn-success btn-sm" name="status" value="{{ $distribution->status }}">{{ $distribution->status }}</button>
                                    </form>
                                    @elseif($distribution->status == "Received")
                                    <form method="POST" action="distribution/setStatus" >
                                        {{ csrf_field() }}
                                        <input type="hidden" name="d_id" value="{{ $distribution->d_id }}">
                                        <button class="btn btn-default btn-sm" name="status" value="{{ $distribution->status }}">{{ $distribution->status }}</button>
                                    </form>
                                    @elseif($distribution->status == "Done")
                                    <span class="label label-sm label-success">{{ $distribution->status }}</span>
                                    @else
                                    <form method="POST" action="distribution/setStatus" >
                                        {{ csrf_field() }}
                                        <input type="hidden" name="d_id" value="{{ $distribution->d_id }}">
                                        <button class="btn btn-info btn-sm" name="status" value="{{ $distribution->status }}">{{ $distribution->status }}</button>
                                    </form>
                                    @endif
                                </td>
                                @if($distribution->status != "Done!")
                                    <td>
                                        <form method="POST" action="distribution/re_routed">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="d_id" value="{{ $distribution->d_id }}">
                                            @if($distribution->re_routed == 0 && $distribution->status != "Done")
                                            <button name="re_routed" value="{{ $distribution->re_routed }}" class="btn btn-default btn-sm">Re Route</button>
                                            @endif
                                        </form>
                                    </td>
                                @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    {{-- Re Routed Table --}}
    <div class="col-md-7">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet light " style="margin-left: -14px!important;">
            <div class="portlet-title" >
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase"><b>Distribution Re Routed</b></span>
                </div>
                <div class="portlet-body" id="items">
                    <div class="table-scrollable">
                        <table class="table table-hover table-light col-md-6" id="myTable1">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Reciever Name</th>
                                    <th>Item</th>
                                    <th>Packing</th>
                                    <th>Station</th>
                                    <th>Vehicle</th>
                                    <th>CN</th>
                                    <th>Charges</th>
                                    <th>Agent</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody >
                             @foreach($distributions1 as $key => $distribution)
                             <tr>
                                <td>{{ $distribution->customer_name }}</td>
                                <td>{{ $distribution->reciever_name }}</td>
                                <td>{{ $distribution->item }}</td>
                                <td>{{ $distribution->packing }}</td>
                                <td>{{ $distribution->station }}</td>
                                <td>{{ $distribution->vehicle_type }}</td>
                                <td>{{ $distribution->cn }}</td>
                                <td>{{ $distribution->charges }}</td>
                                <td>{{ $distribution->agent_name }}</td>
                                <td>
                                    @if($distribution->status == "Delivered")
                                    <form method="POST" action="distribution/setStatus" >
                                        {{ csrf_field() }}
                                        <input type="hidden" name="d_id" value="{{ $distribution->d_id }}">
                                        <button type="submit" class="btn btn-success btn-sm" name="status" value="{{ $distribution->status }}">{{ $distribution->status }}?</button>
                                    </form>
                                    @elseif($distribution->status == "Received")
                                    <form method="POST" action="distribution/setStatus" >
                                        {{ csrf_field() }}
                                        <input type="hidden" name="d_id" value="{{ $distribution->d_id }}">
                                        <button class="btn btn-default btn-sm" name="status" value="{{ $distribution->status }}">{{ $distribution->status }}?</button>
                                    </form>
                                    @elseif($distribution->status == "Done")
                                    <span class="label label-sm label-success">{{ $distribution->status }}!</span>
                                    @else
                                    <form method="POST" action="distribution/setStatus" >
                                        {{ csrf_field() }}
                                        <input type="hidden" name="d_id" value="{{ $distribution->d_id }}">
                                        <button class="btn btn-info btn-sm" name="status" value="{{ $distribution->status }}">{{ $distribution->status }}</button>
                                    </form>
                                    @endif
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
</div>
</div>
</div>
</div>
</div>


            @endsection


            @section('script')

            @endsection