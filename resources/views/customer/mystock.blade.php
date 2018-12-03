@extends('layouts.dashboard')
@section('Title') Order Delivery @endsection
@section('content')
<div class="container" >
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title" >
                    <div class="caption">
                        <i class="icon-settings font-red"></i>
                        <span class="caption-subject font-red sbold uppercase"><b>Stock Report</b></span>
                    </div>

                    <div class="portlet-body" id="items">
                        <div class="table-scrollable">

                            <table class="table table-hover table-light" id="myTable1">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        {{-- <th>Item Type</th> --}}
                                        <th>Quantity In</th>
                                        <th>Quantity Off</th>
                                        <th>Types</th>
                                        <th class="hidden-print">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                     @foreach($orders as $key => $order)
                                     <tr>
                                        <td style="font-size: 17px">{{ $order->p_name }}</td>
                                        {{-- <td style="font-size: 17px">{{ $order->packing }}</td> --}}
                                        <td style="font-size: 17px">{{ $order->quantity_in ? $order->quantity_in : 'NULL' }}</td>
                                        <td style="font-size: 17px">{{ $order->quantity_off ? $order->quantity_off  : 'NULL' }}</td>
                                        <td style="font-size: 17px">{{ $order->pl_type }}</td>
                                        <td style="font-size: 17px">
                                            <form method="POST" action="{{ route('customer.log') }}">
                                                {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $order->pl_id}}">
                                                <button class="btn btn-md blue hidden-print margin-bottom-5">Print</button>
                                            </form>

                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <form method="GET" action="{{ route('customer.logAll') }}">
                    <button class="btn btn-lg blue hidden-print" >Print</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
    {{-- end  model --}}




</div>

@endsection


@section('script')

<script type="text/javascript">

</script>

@endsection