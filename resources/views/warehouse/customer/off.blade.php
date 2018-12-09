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
						<span class="caption-subject font-red sbold uppercase"><b>Pending Intra-City Distributions</b></span>
					</div>

                    <div class="portlet-body" id="items">
                      <div class="table-scrollable">

                         <table class="table table-hover table-light" id="myTable1">
                            <thead>
                                <tr>
                                    <th>DC Number</th>
                                    <th>Customer</th>
                                    <th>Stock Location</th>
                                    <th>Packing</th>
                                    <th>Quantity</th>
                                    <th>Delivered Point</th>
                                    <th>Nature</th>
                                    {{-- <th>Option</th> --}}
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody >
                                @foreach($ordersoff as $key => $order)
                                    <tr>
                                        <td>
                                            <a class="label label-sm label-success showDmodalintra" style="font-size: 18px">{{ $order->dcn }}</a>
                                        </td>
                                        <td>
                                            <span class="label label-sm" style="font-size: 16px">
                                                <a class="nocursor">{{ $order->c_name }}</a>
                                            </span>
                                        </td>
                                        <td class="uppercase">{{ $order->w_location  }}</td>

                                        <td>{{ $order->p_packing }}</td>
                                        <td>{{ $order->o_quantity }}</td>
                                        <td class="uppercase">{{ $order->cn_location }}</td>
                                        <td>{{ $order->o_order_type }}</td>
                                        {{-- <td>Pick Order</td> --}}
                                        {{-- <td>
                                            <form method="POST" action="{{ route('head.offOne') }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ encrypt($order->id) }}">
                                                <button class="btn btn-md blue hidden-print margin-bottom-5">Print</button>
                                            </form>
                                        </td> --}}
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