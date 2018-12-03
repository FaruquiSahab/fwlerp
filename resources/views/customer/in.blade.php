@extends('layouts.dashboard')
@section('Title') Order Delivery @endsection
@section('content')
{{-- Print Sinlge Inload --}}
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
                                    <th>GRN</th>
                                    <th>Item Name</th>
                                    <th>Item Packing</th>
                                    <th>Avilable Units</th>
                                    <th>Time in W/H</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ordersin as $key => $order)
                                <tr>
                                    <td><span class="label label-sm label-success" style="font-size: 15px">{{ $order->grn }}</span></td>
                                    <td>{{ $order->p_name }}</td>
                                    <td>{{ $order->p_packing }}</td>
                                    <td>{{ $order->av_quantity }}</td>
                                    <td>{{ trim(Carbon\Carbon::parse($order->created_at)->diffForHumans(),'ago') }}</td>
                                    <td>{{ Carbon\Carbon::parse ($order->created_at)->format('j M y') }}</td>
                                    <td>{{ $order->status }}</td>

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