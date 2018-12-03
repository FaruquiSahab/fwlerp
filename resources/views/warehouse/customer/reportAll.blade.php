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
                                        <th>Item Type</th>
                                        <th>Weight</th>
                                        <th>Units Recieved</th>
                                        <th>Avilable Units</th>
                                        {{-- <th class="hidden-print">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @foreach($orders as $key => $order)
                                     <tr>
                                        <td style="font-size: 17px">{{ $order->name }}</td>
                                        <td style="font-size: 17px">{{ $order->packing }}</td>
                                        <td style="font-size: 17px">{{ $order->weight }}</td>
                                        <td style="font-size: 17px">{{ $order->quantity }}</td>
                                        <td style="font-size: 17px">{{ $order->Total_Quantity }}</td>
                                    {{-- <td class="hidden-print">
                                        <form>
                                            <input type="hidden" name="id" value="{{ encrypt($order->id) }}">
                                            <button class="btn btn-md blue hidden-print margin-bottom-5" onclick="javascript:window.print();" >Print</button>
                                        </form>
                                        
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <button class="btn btn-lg blue hidden-print" onclick="javascript:window.print();" >Print</button> --}}
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
    $('table').dataTable({searching:false, paging:false, info:false});

    $(document).ready(function(){
        window.print();
        
        
    });
        
</script>

@endsection