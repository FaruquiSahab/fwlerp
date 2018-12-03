@extends('layouts.dashboard')
@section('Title') Order Delivery @endsection
@section('content')
{{-- order off load single print --}}
<div class="container" >
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<div class="portlet light ">
				<div class="portlet-title" >
					<div class="caption">
						<i class="icon-settings font-red"></i>
						<span class="caption-subject font-red sbold uppercase"><b>Order Recieve</b></span>
					</div>

                    <div class="portlet-body" id="items">
                      <div class="table-scrollable">

                         <table class="table table-hover table-light" id="myTable1">
                                <thead>
                                    <tr>
                                        <th>DC Num</th>
                                        <th>Against GRN</th>
                                        <th>Item Name</th>
                                        <th>Dispatch Date</th>
                                        <th>Units Dispatch </th>
                                        <th>Consignee</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody >
                                 @foreach($ordersoff as $key => $order)
                                 <tr>
                                    <td>
                                        <span class="label label-sm label-success" style="font-size: 18px">{{ $order->dcn }}</span>
                                    </td>
                                    <td>{{ $order->grn }}</td>
                                    <td>{{ $order->p_name ?? 'NULL'  }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('j M Y') }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->cn_name }}</td>
                                    <td>
                                        @if($order->status == "Pending")
                                        <span class="label label-sm label-warning" style="font-size: 14px">{{ $order->status }}</span>
                                        @elseif($order->status == "Seen")
                                        <span class="label label-sm label-info" style="font-size: 14px">{{ $order->status }}</span>
                                        @elseif($order->status == "Accepted")
                                        <span class="label label-sm label-success" style="font-size: 14px">{{ $order->status }}</span>
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
            </div>
        </div>


    </div>

    @endsection


    @section('script')

    <script type="text/javascript">
        $('table').dataTable({searching:false, paging:false, info:false});
        window.print();


    </script>

    @endsection