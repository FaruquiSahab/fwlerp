@extends('layouts.dashboard')
@section('Title') Transaction @endsection
@section('content')

<div class="container" >
	<div class="row">
    		<div class="col-md-12" >
    			<!-- BEGIN SAMPLE TABLE PORTLET-->
    			<div class="portlet light " style="margin-left: 20px;">
    				<div class="portlet-title" >
    					<div class="caption">
    						<i class="icon-settings font-red"></i>
    						<span class="caption-subject font-red sbold uppercase"><b>Transaction</b></span>
    					</div>
    					<div class="portlet-body" id="items">
    						<div class="table-scrollable">

    							<table class="table table-hover table-light" id="myTable">
    								<thead>
    									<tr>
                                            <th>Client Company</th>
                                            <th>Vehicle M</th>
                                            <th>Warehouse M</th>
                                            {{-- <th>Tax</th> --}}
                                            <th>Distribution</th>
                                            <th>User</th>
                                            {{-- <th>Agent M</th> --}}
                                            <th>Product</th>
                                            {{-- <th>Amount</th> --}}
                                            <th>Status</th>
                                            <th>BarCode</th>
                                            {{-- <th>Booking</th> --}}
                                            <th>From</th>
                                            <th>To</th>
                                            {{-- <th>CN</th> --}}
                                            {{-- <th>MCR</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody >
                                       @foreach($transactions as $key => $transaction)
                                       <tr>
                                           <td>{{ $transaction->client->corporate_name ?? 'NULL' }}</td>
                                           <td>{{ $transaction->vehicle->vehicle->vehicle_number ?? 'NULL' }}</td>
                                           <td>{{ $transaction->warehouse->warehouse->w_name ?? 'NULL' }}</td>
                                           <td>{{ $transaction->distribution->customer_name ?? 'NULL' }}</td>
                                           <td>{{ $transaction->user->personal_info_person_name ?? 'NULL' }}</td>
                                           <td>{{ $transaction->product->name ?? 'NULL' }}</td>
                                           <td>{{ $transaction->status ?? 'NULL' }}</td>
                                           <td>
                                               <img src="data:image/png;base64, {{ DNS1D::getBarcodePNG(strval($transaction->barcode),'C93' )}}" height="30" width="250" >
                                           </td>
                                           <td>{{ $transaction->route_from ?? 'NULL' }}</td>
                                           <td>{{ $transaction->route_to ?? 'NULL' }}</td>
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