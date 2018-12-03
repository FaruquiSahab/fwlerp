@extends('layouts.dashboard')
@section('Title') Inventory Details @endsection
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
						<span class="caption-subject font-red sbold uppercase"><b>Inventory</b></span>
					</div>

                    <div class="portlet-body" id="items">
                      <div class="table-scrollable">

                         <table class="table table-hover table-light" id="myTable1">
                            <thead>
                             <tr>
                                <th>Item</th>
                                <th>Quantity Inc</th>
                                <th>Quantity Dec</th>
                                <th>Type</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody >
                           @foreach($ordersin as $key => $order)
                            <tr>
                            <td><span class="label label-sm label-success blue" style="font-size: 15px">{{ $order->p_name }}</span></td>
                            <td>{{ $order->quantity_in ?? 'Null'}}</td>
                            <td>{{ $order->quantity_off ?? 'Null'  }}</td>
                            <td>{{ $order->pl_type }}</td>
                            <td>{{ Carbon\Carbon::parse ($order->pl_create)->format('j M y') }}</td>
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