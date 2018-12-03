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
                        <span class="caption-subject font-red sbold uppercase"><b>Warehouse Inventory Orders</b></span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">

                            
                            
                            <a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-circle btn btn-transparent purple btn-outline  btn-sm active" >Deliver To Warehouse </a>
                            
                        </div>
                    </div>
                    <div class="portlet-body" id="items">
                        <div class="table-scrollable">

                            <table class="table table-hover table-light" id="myTable">
                                <thead>
                                    <tr>
                                        <th>GR Num</th>
                                        <th>Item Name</th>
                                        <th>Item Packing</th>
                                        <th>Avilable Units</th>
                                        <th>Time Requested</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody >
                                     @foreach($inload as $key => $order)
                                     <tr>
                                        <td>
                                            <a class="label label-sm label-success showmodal" style="font-size: 18px" data-toggle="modal" data-target="#showmodal" 
                                            data-grnDtl = "{{ $order->grn }}"
                                            data-productDtl= "{{ $order->product->name ?? 'NULL' }}"
                                            data-warehouseDtl = "{{ $order->warehouse->w_name ?? 'NULL' }}"
                                            data-quantityDtl = "{{ $order->quantity  }}"
                                            data-remarksDtl = "{{ $order->remarks }}"
                                            data-statusDtl = "{{ $order->status }}"
                                            data-vehicleDtl = "{{ $order->vehicle_no }}"
                                            data-typeDtl = "{{ $order->vehicle_type }}"
                                            data-driverDtl = "{{ $order->driver_name }}"
                                            data-cnicDtl = "{{ $order->driver_cnic }}">{{ $order->grn }}</a>
                                        </td>
                                        <td>
                                            <span class="label label-sm" style="font-size: 16px">
                                                <a class="nocursor">{{ $order->product->name ?? 'NULL' }}</a>
                                            </span>
                                        </td>
                                        <td>{{ $order->product->packing ?? 'NULL'  }}</td>
                                        <td>
                                            @if($order->status == "Accepted")
                                            {{ $order->av_quantity }}
                                            @else
                                            
                                            @endif
                                        </td>
                                        <td>{{ trim($order->created_at->diffForHumans(),'ago now fom') }}</td>
                                        {{-- <td>{{ $order->created_at->diffForHumans() }}</td> --}}
                                        <td>
                                            @if($order->status == "Pending")
                                            <span class="label label-sm label-warning" style="font-size: 14px">{{ $order->status }}</span>
                                            @elseif($order->status == "Rejected")
                                            <span class="label label-sm label-danger" style="font-size: 14px">{{ $order->status }}</span>
                                            @elseif($order->status == "Accepted")
                                            <span class="label label-sm label-success" style="font-size: 14px">{{ $order->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('cust.inOneOthers') }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ encrypt($order->id) }}">
                                                <button class="btn btn-md blue hidden-print margin-bottom-5">Print</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                    </table>
                </div>
            </div>

            <form method="GET" action="{{ route('cust.inAllOthers') }}">
                <input type="hidden" name="customer_id" value="{{ Auth::guard('customers')->user()->id }}">
                <button class="btn btn-lg blue hidden-print" >Print</button>
            </form>
            
            
           


            
            {{--  --}}

            {{--  --}}

            {{--  --}}

            {{--  --}}

            {{--  --}}
            
           {{-- Show Data Modal  --}}
            
            <div id="showmodal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title"><strong><u>Details</u></strong></h3>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" style="padding: 20px;">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>GRN</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="grnDtl" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Product</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="productDtl" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Warehouse</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="warehouseDtl" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Quantity</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="quantityDtl" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Remarks</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="remarksDtl" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Status</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="statusDtl" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Vehicle Number</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="vehicleDtl" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Vehicle Type</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="typeDtl" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Driver Name</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="driverDtl" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Driver CNIC</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="cnicDtl" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                {{-- <input type="button" class="btn btn-primary" value="Cancel" data-dismiss="modal"> --}}
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Show Data Modal Ends --}}

            {{--  --}}

            {{--  --}}

            {{--  --}}

            {{--  --}}

            {{--  --}}





            

            {{-- start  model --}}
            <div class="modal fade in" id="addmodel" tabindex="-1" role="basic" aria-hidden="true" style=" padding-right: 16px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add New Item To Warehouse</h4>
                        </div>
                        <div class="modal-body" > 

                            <form class="form-horizontal" method="POST" action="{{ route('order_inload.store') }}" >

                                {{ csrf_field() }}


                                <div class="form-group{{$errors->has('location_id') ? ' has-error' : '' }}">
                                    <label for="location_id" class="col-md-4 control-label">Location</label>
                                    <div class="col-md-6">
                                        <input type="text" id="locationWarehouse" class="form-control" value="">
                                    </div>
                                    @if ($errors->has('location_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="w_id" class="col-md-4 control-label">Warehouse Name</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="warehouseByLocation" name="w_id" required>
                                            <option value="" disabled selected>Select a Warehouse</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('w_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('w_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{$errors->has('product_id') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Product</label>
                                    <div class="col-md-6">

                                        {!! Form::select('product_id', $product , null, ['placeholder' => 'Select a Product...', 'class'=>'form-control colSelect_1', 'name'=>'product_id','id'=>'productSelect','required'])!!}
                                        @if ($errors->has('product_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('product_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Avilable Quantity</label>
                                    <div class="col-md-6">
                                        <input type="number" min="0" class="form-control" id="available_quantity" disabled>
                                    </div>
                                </div>  --}}                               




                                    <div class="form-group">
                                        <label for="quantity" class="col-md-4 control-label">Piece Quantity</label>
                                        <div class="col-md-6">
                                            <input id="quantity" type="number" min="0" class="form-control" name="quantity" required >

                                            @if ($errors->has('quantity'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('quantity') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="vehicle_no" class="col-md-4 control-label">Vehicle Number</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="vehicle_no" required >
                                        </div>
                                        @if ($errors->has('vehicle_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('vehicle_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="vehicle_type" class="col-md-4 control-label">Vehicle Type</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="vehicle_type" required>
                                        </div>
                                        @if ($errors->has('vehicle_type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('vehicle_type') }}</strong>
                                        </span>
                                        @endif

                                    </div>

                                    <div class="form-group{{ $errors->has('driver_name') ? ' has-error' : '' }}">
                                        <label for="driver_name" class="col-md-4 control-label">Driver Name</label>
                                        <div class="col-md-6">
                                            <input id="driver_name" type="text" class="form-control" name="driver_name" required>
                                        </div>
                                        @if ($errors->has('driver_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('driver_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('driver_cnic') ? ' has-error' : '' }}">
                                        <label for="driver_cnic" class="col-md-4 control-label">Driver CNICs</label>
                                        <div class="col-md-6">
                                            <input type="number" maxlength="11"  class="form-control" name="driver_cnic" required>
                                        </div>
                                        @if ($errors->has('driver_cnic'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('driver_cnic') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
                                        <div class="col-md-6">
                                            <input type="hidden"  class="form-control" name="customer_id" value="{{ Auth::id() }}" required>
                                        </div>
                                        @if ($errors->has('customer_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('customer_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-2 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary" id="submitButton">
                                                Register
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

                            </div>
                        </div>
                    </div>

</div>
</div>


















































<div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title" >
                    <div class="caption">
                        <i class="icon-settings font-red"></i>
                        <span class="caption-subject font-red sbold uppercase"><b>Other Dispatch Orders</b></span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">

                            <a href=""  data-target="#addmodel1" data-toggle="modal" class="btn btn-circle btn btn-transparent purple btn-outline  btn-sm active" >Create Dispatch Order</a>

                        </div>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                 @foreach($orders as $key => $order)
                                 <tr>
                                    <td>
                                        <a class="label label-sm label-success showDmodal" style="font-size: 18px" data-toggle="modal"    data-target="#showDmodal" 
                                            data-dcnoff = "{{ $order->dcn }}"
                                            data-grnoff = "{{ $order->inload->grn }}"
                                            data-warehouseoff = "{{ $order->inload->warehouse->w_name ?? 'NULL' }}"
                                            data-productoff= "{{ $order->product->name ?? 'NULL' }}"
                                            data-quantityoff = "{{ $order->quantity  }}"
                                            data-remarksoff = "{{ $order->remarks }}"
                                            data-statusoff = "{{ $order->status }}"
                                            {{-- data-vehicleoff = "{{ $order->vehicle_no }}" --}}
                                            {{-- data-typeoff = "{{ $order->vehicle_type }}" --}}
                                            {{-- data-driveroff = "{{ $order->driver_name }}" --}}
                                            data-orderoff = "{{ $order->order_type }}"
                                            data-consigneeoff = "{{ $order->consignee->name ?? 'NULL' }}"
                                            data-addressoff = "{{ $order->consignee->address ?? 'NULL' }}"
                                            data-personoff = "{{ $order->consignee->pic ?? 'NULL' }}"
                                            data-contactoff = "{{ $order->consignee->contact ?? 'NULL' }}">  {{ $order->dcn }}
                                        </a>
                                    </td>
                                    <td> 
                                        <a class="label label-sm label-danger nocursor" style="font-size: 18px">
                                            {{ $order->inload->grn }}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm" style="font-size: 16px">
                                            <a class="nocursor">{{ $order->product->name ?? 'NULL' }}</a>
                                        </span>
                                    </td>
                                    <td>{{ $order->created_at->format('j M Y') }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->consignee->name }}</td>
                                    <td>
                                        @if($order->status == "Pending")
                                            <span class="label label-sm label-warning" style="font-size: 14px">{{ $order->status }}</span>
                                            @elseif($order->status == "Loaded")
                                            <span class="label label-sm label-info" style="font-size: 14px">{{ $order->status }}</span>
                                            @elseif($order->status == "On The Way")
                                            <span class="label label-sm label-primary" style="font-size: 14px">{{ $order->status }}</span>
                                            @elseif($order->status == "Delivered")
                                            <span class="label label-sm label-success" style="font-size: 14px">{{ $order->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('cust.offOneOthers') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ encrypt($order->id) }}">
                                            <button class="btn btn-md blue hidden-print margin-bottom-5">Print</button>
                                        </form>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <form method="GET" action="{{ route('cust.offAllOthers') }}">
                <input type="hidden" name="customer_id" value="{{ Auth::guard('customers')->user()->id }}">
                <button class="btn btn-lg blue hidden-print" >Print</button>
            </form>
            
            

            

            {{--  --}}          {{--  --}}
            {{--  --}}          {{--  --}}


            {{--  --}}          {{--  --}}
            {{--  --}}          {{--  --}}

            
            {{--  --}}          {{--  --}}
            {{--  --}}          {{--  --}}

            
            {{--  --}}          {{--  --}}
            {{--  --}}          {{--  --}}

            
            {{--  --}}          {{--  --}}
            {{--  --}}          {{--  --}}


            

            {{-- Show Dispatch Data Modal  --}}
            
            <div id="showDmodal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title"><strong><u>Details</u></strong></h3>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" style="padding: 20px;">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Delivery Order</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="dcnoff" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Against GRN</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="grnoff" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Product</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="productoff" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Warehouse</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="warehouseoff" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Quantity</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="quantityoff" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Remarks</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="remarksoff" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Status</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="statusoff" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Vehicle Number</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="vehicleoff" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Vehicle Type</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="typeoff" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Driver Name</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="driveroff" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Order Type</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="orderoff" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Consignee Name</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="consigneeoff" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Address</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="addressoff" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong></strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" id="addressoff" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Person In Charge</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="personoff" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Contact</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="contactoff" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                {{-- <input type="button" class="btn btn-primary" value="Cancel" data-dismiss="modal"> --}}
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Show Dispatch Data Modal Ends --}}



            {{--  --}}          {{--  --}}
            {{--  --}}          {{--  --}}


            {{--  --}}          {{--  --}}
            {{--  --}}          {{--  --}}

            
            {{--  --}}          {{--  --}}
            {{--  --}}          {{--  --}}

            
            {{--  --}}          {{--  --}}
            {{--  --}}          {{--  --}}

            
            {{--  --}}          {{--  --}}
            {{--  --}}          {{--  --}}






                    


                {{-- start  model --}}
                <div class="modal fade in" id="addmodel1" tabindex="-1" role="basic" aria-hidden="true" style=" padding-right: 16px;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Request For Dispatch Item</h4>
                            </div>
                            <div class="modal-body" > 

                                <form class="form-horizontal" method="POST" action="{{ route('order_offload.store') }}" >


                                    {{ csrf_field() }}

                                    
                                    <input type="hidden" name="in_Id" id="in_Id">

                                    <div class="form-group{{$errors->has('inload_id') ? ' has-error' : '' }}">
                                        <label for="inload_id" class="col-md-4 control-label">Order</label>
                                        <div class="col-md-6">

                                            {!! Form::select('inload_id', $inloads , null, ['placeholder' => 'Select a Order...', 'class'=>'form-control colSelect', 'name'=>'inload_id', 'id'=>'orderSelect' ])!!}
                                            @if ($errors->has('inload_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('inload_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="product_id" class="col-md-4 control-label">Product</label>
                                        <div class="col-md-6">
                                            <input type="text" id="productText" class="form-control" disabled>
                                            <input type="hidden" id="productId" name="product_id">
                                        </div>
                                        @if ($errors->has('product_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('product_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>



                                    <div class="form-group">
                                        <label for="quantity" class="col-md-4 control-label">Quantity Available</label>
                                        <div class="col-md-6">
                                            <input id="quantityD" type="number" min="0" class="form-control" disabled>

                                            @if ($errors->has('quantity'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('quantity') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="quantity" class="col-md-4 control-label">Quantity</label>
                                        <div class="col-md-6">
                                            <input id="quantitydemand" type="number" min="0" class="form-control" name="quantity" >

                                            @if ($errors->has('quantity'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('quantity') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    {{-- <div class="form-group">
                                        <label for="vehicle_no" class="col-md-4 control-label">Vehicle Number</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="vehicle_no" >
                                        </div>
                                        @if ($errors->has('vehicle_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('vehicle_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="vehicle_type" class="col-md-4 control-label">Vehicle Type</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="vehicle_type" required>
                                        </div>
                                        @if ($errors->has('vehicle_type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('vehicle_type') }}</strong>
                                        </span>
                                        @endif

                                    </div>

                                    <div class="form-group{{ $errors->has('driver_name') ? ' has-error' : '' }}">
                                        <label for="driver_name" class="col-md-4 control-label">Driver Name</label>
                                        <div class="col-md-6">
                                            <input id="driver_name" type="text" class="form-control" name="driver_name" required>
                                        </div>
                                        @if ($errors->has('driver_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('driver_name') }}</strong>
                                        </span>
                                        @endif
                                    </div> --}}

                                    <div class="form-group{{ $errors->has('order_type') ? ' has-error' : '' }}">
                                        <label for="order_type" class="col-md-4 control-label">Order Type</label>
                                        <div class="col-md-6">
                                            <select id="order_type_select" class="form-control" name="order_type" required>
                                                <option value="" disabled selected>Select Order Type</option>
                                                <option value="Very Urgent">Very Urgent</option>
                                                <option value="Same Day">Same Day</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Time Specific">Time Specific</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('order_type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('order_type') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                
                                    <div id="orderDateTime">
                                        <div class="form-group">
                                            <label for="sp_time" class="col-md-4 control-label">Time</label>
                                            <div class="col-md-6">
                                                <input id="sp_date" type="time" class="form-control" name="sp_time" disabled=true>
                                                @if ($errors->has('sp_time'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('sp_time') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="sp_date" class="col-md-4 control-label">Date</label>
                                            <div class="col-md-6">
                                                <input id="sp_time" type="date" class="form-control" name="sp_date" disabled=true>
                                                @if ($errors->has('sp_date'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('sp_date') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('consignee_id') ? ' has-error' : '' }}">
                                        <label for="consignee_id" class="col-md-4 control-label">Consignee</label>
                                        <div class="col-md-6">
                                            {!! Form::select('consignee_id', $consignee , null, ['placeholder' => 'Select a Consignee...', 'class'=>'form-control colSelect_2', 'name'=>'consignee_id', 'id'=>'consignee_id' ])!!}
                                        </div>
                                        @if ($errors->has('consignee_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('consignee_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
                                        <div class="col-md-6">
                                            <input type="hidden"  class="form-control" name="customer_id" value="{{ Auth::id() }}" required>
                                        </div>
                                        @if ($errors->has('customer_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('customer_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>




                                    <div class="form-group">
                                        <div class="col-md-2 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary" id="submitButton">
                                                Register
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
                            </div>
                        </div>
                    </div>

</div>
</div>






</div>


                                
                                @endsection


                                @section('script')

                                <script type="text/javascript">

                                    
                                    $('select.colSelect option:first').attr('disabled', true);
                                    $('select.colSelect_2 option:first').attr('disabled', true);
                                    $('select.colSelect_1 option:first').attr('disabled', true);
                                    $('.nocursor').css({"cursor":"default",'text-decoration': 'none'});
                                 
                        // jQuery('#productSelect').on('input propertychange select change', function() {
                        //     //console.log($('#warehouseByLocation').val());;
                        //     console.log('Product');
                        //     console.log($('#productSelect').val());
                        //     $.ajax({
                        //         type: 'POST',
                        //         url: '/admin/product/quantity',
                        //         data: {
                        //             '_token': $('input[name=_token]').val(),
                        //             'id' :$('#productSelect').val(),
                        //         },

                        //         success: function(response) {
                        //             var data = JSON.parse(response,true);
                        //             console.log('Product Response');
                        //             console.log(response);
                        //             console.log('Product Data');
                        //             console.log(data)
                        //             console.log('quantity');
                        //             console.log(data['quantity']);
                        //             console.log(data.length);



                        //             $('#available_quantity').val(data);
                        //             $("#available_quantity").attr({
                        //                 "max" : data,
                        //                 "min" : 0        
                        //             });
                        //         },
                        //         error : function(error) {
                        //                         // $('#no_of_space').val(7);
                        //                         $('#available_quantity').val('99999');

                        //                     }

                        //                 });

                        // });
                        
                        // jQuery('#quantity').on('input propertychange paste', function() {
                        //     console.log('demand');
                        //     console.log($('#quantity').val());
                        //     console.log('avail');
                        //     console.log($('#available_quantity').val());
                        //     var demand = $('#quantity').val();
                        //     var avail  = $('#available_quantity').val();
                        //     if (+demand > +avail) 
                        //     {
                        //         console.log('if')
                        //         $('#submitButton').hide();
                        //     }
                        //     else
                        //     {
                        //         $('#submitButton').show();
                        //     }
                        // });
                        $('#orderDateTime').slideUp();
                        $(document).on('click', '#order_type_select', function() {
                            // console.log('Enter Combo');
                            if ($('#order_type_select').val() == 'Time Specific' ) {
                                // console.log('Enter Value');
                                $('#orderDateTime').slideDown();
                                $('#sp_date').prop('disabled', false);
                                $('#sp_time').prop('disabled', false);
                            }
                            else {
                                $('#orderDateTime').slideUp();
                                $('#sp_date').prop('disabled', true);
                                $('#sp_time').prop('disabled', true);
                            }
                        });;








                        //get product NOW
                jQuery('#orderSelect').on('input propertychange select change', function() {
                            //console.log($('#warehouseByLocation').val());;
                            console.log('Order Id');
                            console.log($('#orderSelect').val());

                            $('#in_Id').val($('#orderSelect').val());
                            $.ajax({
                                type: 'POST',
                                url: '/order/product',
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id' :$('#orderSelect').val(),
                                },

                                success: function(response) {
                                        // $('#no_of_space').val(8);
                                        var data = JSON.parse(response,true);
                                        console.log('Product Response');
                                        console.log(response);
                                        console.log('Product Data');
                                        console.log(data)
                                        console.log(data['p_id']);
                                        console.log(data.length);


                                        $('#productId').val(data['p_id']);
                                        $('#productText').val(data['name']);
                                        
                                    },
                                    error : function(error) {
                                                // $('#no_of_space').val(7);
                                                $('#productText').val('999999');
                                            }

                                        });

                        });

                //quantity of order
                jQuery('#orderSelect').on('input propertychange select change', function() {
                            console.log('Order Id');
                            console.log($('#orderSelect').val());
                            $.ajax({
                                type: 'POST',
                                url: '/order/quantity',
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id' :$('#orderSelect').val(),
                                },

                                success: function(response) {
                                        var data = JSON.parse(response,true);
                                        console.log('Product Response');
                                        console.log(response);
                                        console.log('Product Data');
                                        console.log(data)
                                        console.log('quantity');
                                        console.log(data['quantity']);
                                        console.log(data.length);


                                        
                                        $('#quantityD').val(data);
                                        $("#quantitydemand").attr({
                                            "max" : data, 
                                            "min" : 0        
                                        });
                                    },
                                    error : function(error) {
                                                // $('#no_of_space').val(7);
                                                $('#quantity').val('99999');

                                            }

                                        });

                        });
               

                         // if quantity is more than available
                         jQuery('#quantitydemand').on('input propertychange paste', function() {
                            console.log('demand');
                            console.log($('#quantitydemand').val());
                            console.log('avail');
                            console.log($('#quantity').val());
                            var demand = $('#quantitydemand').val();
                            var avail  = $('#quantity').val();
                            if (+demand > +avail) 
                            {
                                console.log('if')
                                $('#submitButton').hide();
                            }
                            else
                            {
                                $('#submitButton').show();
                            }
                        });


                         jQuery('#locationWarehouse').on('input propertychange paste', function() {
                            console.log($('#locationWarehouse').val());;
                            $.ajax({
                                type: 'POST',
                                url: '/warehouse_location/',
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'city':$('#locationWarehouse').val(),
                                },
                                success: function(response) {
                                    console.log(response);
                                    var data = JSON.parse(response,true);


                                    console.log(data.length);

                                    var html ='<option disabled selected value="">Warehouse Loaded</option>';
                                    for (var i = 0; i < data.length; i++) {
                                                    //console.log(data[i]['warehouse_location']);
                                                    html += "<option value="+ data[i]['w_id'] +">"  + data[i]['w_name']+"</option>";

                                                }
                                                
                                                $('#warehouseByLocation').html(html);
                                            },
                                            error : function(error) {
                                                $('#warehouseByLocation').val('b');
                                            }

                                        });

                        });


                         //set values for show inventory form
                                    $(document).on('click', '.showmodal', function()
                                    {
                                        console.log('Hello Inventory');
                                        $('#productDtl').val($(this).data('productdtl'));
                                        $('#grnDtl').val($(this).data('grndtl'));
                                        $('#warehouseDtl').val($(this).data('warehousedtl'));
                                        $('#quantityDtl').val($(this).data('quantitydtl'));
                                        $('#remarksDtl').val($(this).data('remarksdtl'));
                                        $('#statusDtl').val($(this).data('statusdtl'));
                                        $('#vehicleDtl').val($(this).data('vehicledtl'));
                                        $('#typeDtl').val($(this).data('typedtl'));
                                        $('#driverDtl').val($(this).data('driverdtl'));
                                        $('#cnicDtl').val($(this).data('cnicdtl'));
                                    });
                                    //set values for show dispatch form
                                    $(document).on('click', '.showDmodal', function()
                                    {
                                        console.log('Hello Dispatch');
                                        $('#grnoff').val($(this).data('grnoff'));
                                        $('#warehouseoff').val($(this).data('warehouseoff'));
                                        $('#dcnoff').val($(this).data('dcnoff'));
                                        $('#productoff').val($(this).data('productoff'));
                                        $('#quantityoff').val($(this).data('quantityoff'));
                                        $('#remarksoff').val($(this).data('remarksoff'));
                                        $('#statusoff').val($(this).data('statusoff'));
                                        // $('#vehicleoff').val($(this).data('vehicleoff'));
                                        // $('#typeoff').val($(this).data('typeoff'));
                                        // $('#driveroff').val($(this).data('driveroff'));
                                        $('#orderoff').val($(this).data('orderoff'));
                                        $('#consigneeoff').val($(this).data('consigneeoff'));
                                        $('#personoff').val($(this).data('personoff'));
                                        $('#addressoff').val($(this).data('addressoff'));
                                        $('#contactoff').val($(this).data('contactoff'));
                                    });

                    </script>

                    @endsection