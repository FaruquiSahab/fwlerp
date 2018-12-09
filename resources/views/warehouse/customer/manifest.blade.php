@extends('layouts.dashboard')
@section('Title') Manifest @endsection
@section('content')
{{-- Index Manifest --}}
<div class="container" >
	<div class="row">
		<div class="col-md-10">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<div class="portlet light ">
				<div class="portlet-title" >
					<div class="caption">
						<i class="icon-settings font-red"></i>
						<span class="caption-subject font-red sbold uppercase">
                            <b>Order Manifest</b>
                        </span>
					</div>

                    <div class="portlet-body" id="items">
                      <div class="table-scrollable">

                       <table class="table table-hover table-light" id="myTable1">
                            <thead>
                                <tr>
                                    <th class="col-sm-1">S No.</th>
                                    <th class="col-sm-2">Order GRN</th>
                                    <th class="col-sm-2">MCR</th>
                                    <th class="col-sm-2">Status</th>
                                    {{-- <th>Avilable Units</th>
                                    <th>Time in W/H</th>
                                    <th>Date</th>
                                    <th>Status</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($manifest as $key => $value)
                                <tr>
                                    <td class="col-sm-1">{{ $key+1 }}.</td>
                                    <td class="col-sm-1"><span class="label label-sm label-success" style="font-size: 15px">{{ $value->dcn }}</span></td>
                                    <td class="col-sm-1">{{ $value->mcr_no }}</td>
                                    <td class="col-sm-1">
                                        @if($value->m_status == 0)
                                            Open
                                        @endif

                                    </td>
                                    {{-- <td>{{ $order->av_quantity }}</td>
                                    <td>{{ trim(Carbon\Carbon::parse($order->created_at)->diffForHumans(),'ago') }}</td>
                                    <td>{{ Carbon\Carbon::parse ($order->created_at)->format('j M y') }}</td>
                                    <td>{{ $order->status }}</td> --}}
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
        if ({{ $print }} == 1) 
        {
            window.print(); 
        }
    </script>

    @endsection