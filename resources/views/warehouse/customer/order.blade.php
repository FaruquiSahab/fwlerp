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
						<span class="caption-subject font-red sbold uppercase"><b>Pending Intra-City Distributions</b></span>
					</div>
                    {{-- <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a href=""  data-target="#addmodel2" data-toggle="modal" class="btn btn-circle btn btn-transparent purple btn-outline  btn-sm active" >Add To Warehouse </a>
                        </div>
                    </div> --}}

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
                                    <th>Option</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach($ordersoffintra as $key => $order)
                               <tr>
                                <td>
                                    <a class="label label-sm label-success showDmodalintra" style="font-size: 18px" data-toggle="modal" data-target="#showDmodal" 
                                    data-dcnintra = "{{ $order->dcn }}"
                                    data-grnintra = "{{ $order->grn }}"
                                    data-warehouseintra = "{{ $order->w_name ?? 'NULL' }}"
                                    data-productintra= "{{ $order->p_name ?? 'NULL' }}"
                                    data-quantityintra = "{{ $order->o_quantity  }}"
                                    data-orderintra = "{{ $order->o_order_type }}"
                                    data-consigneeintra = "{{ $order->cn_name ?? 'NULL' }}"
                                    data-addressintra = "{{ $order->cn_address ?? 'NULL' }}"
                                    data-personintra = "{{ $order->cn_pic ?? 'NULL' }}"
                                    data-contactintra = "{{ $order->cn_contact ?? 'NULL' }}"> {{ $order->dcn }}
                                        </a>
                                    </td>
                                {{-- <td>
                                    <a class="label label-sm label-danger nocursor" style="font-size: 18px">
                                        {{ $order->inload->grn }}
                                    </a>
                                </td> --}}
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
                                <td>
                                    <form action="{{ route('head.pickorder') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ encrypt($order->id) }}">
                                        <button class="btn btn-md hidden-print margin-bottom-5">Pick Order</button>
                                    </form> 
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('head.offOneIntra') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ encrypt($order->id) }}">
                                        <input type="hidden" name="c_id" value="{{ encrypt($order->c_id)?? 'Nil' }}">
                                        <button class="btn btn-md blue hidden-print margin-bottom-5">Print</button>
                                    </form>
                                </td>

                                    {{-- <td>
                                       <a href="" class="btn btn-icon-only red delete-club-button"
                                    data-id="{{ $order->id }}"
                                     title="Delete" data-toggle="modal" data-target="#deletemodal">
                                        <i class="fa fa-close"></i>
                                    </a>
                                    <a href="" class="btn btn-icon-only yellow editmodal"data-toggle="modal" data-target="#addmodel1" data-id="{{ $order->id }}"">
                                        <i   class="fa fa-edit"></i>
                                    </a>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <form method="GET" action="{{ route('head.offAllIntra') }}">
                    {{-- <input type="hidden" name="c_id" value="{{ encrypt($order->c_id) }}"> --}}
                    <button class="btn btn-lg blue hidden-print" >Print</button>
                </form>


            {{--  --}}

            {{--  --}}

            {{--  --}}

            {{--  --}}

            {{--  --}}
            
           {{-- Show Data Modal  --}}
            
            <div id="showDmodal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title"><strong><u>Details Intra-City</u></strong></h3>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" style="padding: 20px;">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Delivery Order</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="dcnintra" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Against GRN</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="grnintra" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Product</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="productintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Warehouse</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="warehouseintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Quantity</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="quantityintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Remarks</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="remarksintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Status</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="statusintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Order Type</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="orderintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Consignee Name</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="consigneeintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Address</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="addressintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong></strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" id="addressintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Person In Charge</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="personintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Contact</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="contactintra" class="form-control" readonly >
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






                {{-- start Edit model --}}
            <div class="modal fade in col-md-8" style="margin-left: 25%; margin-top:10px; padding: 20px; " id="addmodel" tabindex="-1" role="basic" aria-hidden="true" style=" padding-right: 16px;">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bill"></i>Recieve Report</div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body " >


                            <form  class="form-horizontal" style="padding: 20px;" enctype="multipart/form-data">


                                {{ csrf_field() }}
                                <div class="form-body">


                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="id" id="r_id">
                                            <input type="hidden" class="form-control" name="customer_id" id="cust_id">
                                            <input type="hidden" class="form-control" name="product_id" id="prod_id">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">Remarks</label>
                                                <div class="col-md-9">
                                                <input type="text" maxlength="40" class="form-control" name="remarks" id="remarksR" required >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">Quantity Recieved</label>
                                                <div class="col-md-9">
                                                    <input type="number" class="form-control" name="av_quantity" id="quantityR" min=0 required >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">Status</label>
                                                <div class="col-md-9">
                                                <select class="form-control" placeholder="Select Status" name="status" id="statusR" required >
                                                        <option>Rejected</option>
                                                        <option>Accepted</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">Seal Status</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="sealStatus" id="sealStatusR" required >
                                                        <option>Sealed</option>
                                                        <option>Broken</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="button" class="btn green editR">Submit</button>
                                                        <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>
                                        </div>
                                    </div>
                                </form>
                                    
                                </div>
                            </div>
                        </div>
                        {{-- end edit model --}}
            </div>
        </div>
        {{-- end  model --}}















                                                    {{--  In load Form  --}}



        <div class="modal fade in col-md-8" style="margin-left: 25%; margin-top:10px; padding: 20px; " id="addmodel2" tabindex="-1" role="basic" aria-hidden="true" style=" padding-right: 16px;">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bill"></i>Add New Item To Warehouse</div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body " >


                            <form class="form-horizontal" method="POST" action="{{ route('recieve.store') }}" >


            {{ csrf_field() }}

        
        <div class="col-md-6">
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
    </div>
    
        <div class="col-md-6">
            <div class="form-group{{$errors->has('customer_id') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label"><strong>Customer</strong></label>
                <div class="col-md-6">
                    {!! Form::select('customer_id', $customer , null, ['class'=>'form-control', 'id'=>'customerSelect', 'readonly'])!!}
                    @if ($errors->has('customer_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('customer_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>


    <div class="col-md-6">
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
    </div>


        <div class="col-md-6">
            <div class="form-group{{$errors->has('product_id') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label"><strong>Product</strong></label>
                <div class="col-md-6">

                    {!! Form::select('product_id', $product , null, ['placeholder' => 'Select a Product...', 'class'=>'form-control', 'name'=>'product_id', 'id'=>'productSelect' ,'required'])!!}
                    @if ($errors->has('product_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('product_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>



                                    {{-- <div class="form-group">
                                    <label for="" class="col-md-4 control-label"><strong>Available Quantity</strong></label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" id="available_quantity" disabled >
                                        </div>
                                        @if ($errors->has(''))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('') }}</strong>
                                        </span>
                                        @endif
                                    </div> --}}


                                <div class="col-md-6">    
                                    <div class="form-group">
                                        <label for="quantity" class="col-md-4 control-label"><strong>Quantity</strong></label>
                                        <div class="col-md-6">
                                            <input id="quantity" type="number" min="0" class="form-control" name="quantity" required>

                                            @if ($errors->has('quantity'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('quantity') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="vehicle_no" class="col-md-4 control-label"><strong>Vehicle Number</strong></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="vehicle_no" >
                                        </div>
                                        @if ($errors->has('vehicle_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('vehicle_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="vehicle_type" class="col-md-4 control-label"><strong>Vehicle Type</strong></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="vehicle_type" required>
                                        </div>
                                        @if ($errors->has('vehicle_type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('vehicle_type') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('driver_name') ? ' has-error' : '' }}">
                                        <label for="driver_name" class="col-md-4 control-label"><strong>Driver Name</strong></label>
                                        <div class="col-md-6">
                                            <input id="driver_name" type="text" class="form-control" name="driver_name" required>
                                        </div>
                                        @if ($errors->has('driver_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('driver_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('driver_cnic') ? ' has-error' : '' }}">
                                        <label for="driver_cnic" class="col-md-4 control-label"><strong>Driver CNICs</strong></label>
                                        <div class="col-md-6">
                                            <input type="number" maxlength="11"  class="form-control" name="driver_cnic" required>
                                        </div>
                                        @if ($errors->has('driver_cnic'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('driver_cnic') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                    
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
                                        <label for="" class="col-md-4 control-label"><strong>Remarks</strong></label>
                                        <div class="col-md-6">
                                            <input id="remarks" type="text" class="form-control" name="remarks" required>
                                        </div>
                                        @if ($errors->has('remarks'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('remarks') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('driver_name') ? ' has-error' : '' }}">
                                        <label for="" class="col-md-4 control-label"><strong>Seal</strong></label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="sealStatus" id="" required >
                                                <option>Sealed</option>
                                                <option>Broken</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('sealStatus'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sealStatus') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                    <div class="form-group">                                        
                                                <div class="row">
                                                    <div class="col-md-offset-5 col-md-9">
                                                    <button id="submitButton" type="submit" class="btn green editR">Submit</button>
                                                        <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>                                            
                                            <div class="col-md-6"> </div>
                                    </div>
                                </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

</div>
</div>
                                            {{-- inload form end --}}












































    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title" >
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase"><b>Pending Inter-City Distributions</b></span>
                </div>
                {{-- <div class="actions">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <a href=""  data-target="#addmodel3" data-toggle="modal" class="btn btn-circle btn btn-transparent purple btn-outline  btn-sm active" >Request Dispatch</a>
                    </div>
                </div> --}}
                
                <div class="portlet-body" id="items">
                    <div class="table-scrollable">

                        <table class="table table-hover table-light" id="myTable">
                            <thead>
                                <tr>
                                    <th>DC Number</th>
                                    <th>Customer</th>
                                    <th>Stock Location</th>
                                    <th>Packing</th>
                                    <th>Quantity</th>
                                    <th>Delivered Point</th>
                                    <th>Nature</th>
                                    <th>Option</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach($ordersoffinter as $key => $order)
                               <tr>
                                <td>
                                    <a class="label label-sm label-success showDmodalinter" style="font-size: 18px" data-toggle="modal"    data-target="#showDmodalinter" 
                                    data-dcninter = "{{ $order->dcn }}"
                                    data-grninter = "{{ $order->grn }}"
                                    data-warehouseinter = "{{ $order->w_name ?? 'NULL' }}"
                                    data-productinter= "{{ $order->p_name ?? 'NULL' }}"
                                    data-quantityinter = "{{ $order->o_quantity  }}"
                                    data-orderinter = "{{ $order->o_order_type }}"
                                    data-consigneeinter = "{{ $order->cn_name ?? 'NULL' }}"
                                    data-addressinter = "{{ $order->cn_address ?? 'NULL' }}"
                                    data-personinter = "{{ $order->cn_pic ?? 'NULL' }}"
                                    data-contactinter = "{{ $order->cn_contact ?? 'NULL' }}">  {{ $order->dcn }}
                                        </a>
                                    </td>
                                {{-- <td>
                                    <a class="label label-sm label-danger nocursor" style="font-size: 18px">
                                        {{ $order->inload->grn }}
                                    </a>
                                </td> --}}
                                <td>
                                    <span class="label label-sm" style="font-size: 16px">
                                        <a class="nocursor">{{ $order->c_name ?? 'NULL' }}</a>
                                    </span>
                                </td>
                                <td class="uppercase">{{ $order->w_location  }}</td>

                                <td>{{ $order->p_packing }}</td>
                                <td>{{ $order->o_quantity }}</td>
                                <td class="uppercase">{{ $order->cn_location }}</td>
                                <td>{{ $order->o_order_type }}</td>
                                <td>
                                    <form action="{{ route('head.pickorderI') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ encrypt($order->id) }}">
                                        <button class="btn btn-md hidden-print margin-bottom-5">Pick Order</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('head.offOneInter') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ encrypt($order->id) }}">
                                        <input type="hidden" name="c_id" value="{{ encrypt($order->c_id) }}">
                                        <button class="btn btn-md blue hidden-print margin-bottom-5">Print</button>
                                    </form>
                                </td>

                                    {{-- <td>
                                       <a href="" class="btn btn-icon-only red delete-club-button"
                                    data-id="{{ $order->id }}"
                                     title="Delete" data-toggle="modal" data-target="#deletemodal">
                                        <i class="fa fa-close"></i>
                                    </a>
                                    <a href="" class="btn btn-icon-only yellow editmodal"data-toggle="modal" data-target="#addmodel1" data-id="{{ $order->id }}"">
                                        <i   class="fa fa-edit"></i>
                                    </a>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <form method="GET" action="{{ route('head.offAllInter') }}">
                <input type="hidden" name="c_id" value="{{ encrypt($order->c_id) }}">
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
            
            <div id="showDmodalinter" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title"><strong><u>Details Inter-City</u></strong></h3>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" style="padding: 20px;">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Delivery Order</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="dcninter" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Against GRN</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="grninter" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Product</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="productinter" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Warehouse</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="warehouseinter" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Quantity</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="quantityinter" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Order Type</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="orderinter" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Consignee Name</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="consigneeinter" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Address</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="addressinter" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong></strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" id="addressinter" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Person In Charge</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="personinter" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Contact</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="contactinter" class="form-control" readonly >
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





            {{-- start Edit model --}}
            <div class="modal fade in col-md-8" style="margin-left: 25%; margin-top:10px; padding: 20px; " id="addmodel1" tabindex="-1" role="basic" aria-hidden="true" style=" padding-right: 16px;">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bill"></i>Dispatch Report</div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body " >


                            <form  class="form-horizontal" style="padding: 20px;" enctype="multipart/form-data">


                                {{ csrf_field() }}
                                <div class="form-body">
                                    {{-- <h3 class="form-section">Person Info</h3> --}}


                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="id" id="d_id">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">Remarks</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="remarks" id="remarksD" maxlength="140" required >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">Quantity Dispatch</label>
                                                <div class="col-md-9">
                                                    <input type="number" class="form-control" name="av_quantity" id="quantityD" min=0 required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">Status</label>
                                                <div class="col-md-9">
                                                <select class="form-control" placeholder="Select Status" name="status" id="statusD" required >
                                                        <option value="in_transit">In Transit</option>
                                                        <option value="on_the_way">On The Way</option>
                                                        <option value="delivered">Delivered</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="button" class="btn green editD">Submit</button>
                                                        <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>
                                        </div>
                                    </div>

                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Price</label>
                                                <div class="col-md-9">
                                                    <input type="number" class="form-control" name="price" id="price" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Description</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="description" id="description" >
                                                </div>
                                            </div>
                                        </div> --}}
                                </form>
                                    
                                </div>
                            </div>
                        </div>
                        {{-- end edit model --}}



        </div>
    </div>
    {{-- end  model --}}




                                                    {{-- form offload start --}}




        <div class="modal fade in col-md-8" style="margin-left: 25%; margin-top:10px; padding: 20px; " id="addmodel3" tabindex="-1" role="basic" aria-hidden="true" style=" padding-right: 16px;">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bill"></i>Dispatch</div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body " >


                            <form class="form-horizontal" method="POST" action="{{ route('dispatch.store') }}" >


    {{ csrf_field() }}


    <input type="hidden" name="in_Id" id="in_Id">

    <div class="col-md-6">
    <div class="form-group{{$errors->has('inload_id') ? ' has-error' : '' }}">
        <label for="inload_id" class="col-md-4 control-label">GRN</label>
        <div class="col-md-6">

            {!! Form::select('inload_id', $inload , null, ['placeholder' => 'Select GRN...', 'class'=>'form-control', 'name'=>'inload_id', 'id'=>'orderSelect', 'required' ])!!}
            @if ($errors->has('inload_id'))
            <span clas56="help-block">
                <strong>{{ $errors->first('inload_id') }}</strong>
            </span>
            @endif
        </div>
    </div>
    </div>

    <div class="col-md-6">
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
    </div>

    <div class="col-md-6">
    <div class="form-group">
        <label for="customer_id" class="col-md-4 control-label">Customer</label>
        <div class="col-md-6">
            <input id="customerText" type="Text" class="form-control" disabled>
            <input type="hidden" id="customerId" name="customer_id" >
            @if ($errors->has('quantity'))
            <span class="help-block">
                <strong>{{ $errors->first('quantity') }}</strong>
            </span>
            @endif
        </div>
    </div>
    </div>


                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quantity" class="col-md-4 control-label">Quantity Available</label>
                                        <div class="col-md-6">
                                            <input id="quantityDF" type="number" min="0" class="form-control" disabled>

                                            @if ($errors->has('quantity'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('quantity') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quantity" class="col-md-4 control-label">Quantity</label>
                                        <div class="col-md-6">
                                            <input id="quantitydemand" type="number" min="0" class="form-control" name="quantity" required >

                                            @if ($errors->has('quantity'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('quantity') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>

                                    
                                <div class="col-md-6">
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
                                </div>
                                
                                    <div id="orderDateTime">
                                        <div class="col-md-6">
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
                                        </div>

                                        
                                    <div class="col-md-6">
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
                                </div>

                                    <div class="col-md-6">
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
                                </div>


                                    
                                    <div class="form-group">
                                        <div class="col-md-2 ">
                                            <button type="submit" class="btn btn-primary" id="submitButtonD">
                                                Register
                                            </button>
                                        </div>
                                        <div class="col-md-3 ">
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



                                                    {{-- form offload  end --}}






</div>

@endsection


@section('script')

<script type="text/javascript">


        //set values for show inventory form
        $(document).on('click', '.showDmodalintra', function()
        {
            console.log('Hello Inventory');
            $('#grnintra').val($(this).data('grnintra'));
            $('#warehouseintra').val($(this).data('warehouseintra'));
            $('#dcnintra').val($(this).data('dcnintra'));
            $('#productintra').val($(this).data('productintra'));
            $('#quantityintra').val($(this).data('quantityintra'));
            $('#remarksintra').val($(this).data('remarksintra'));
            $('#statusintra').val($(this).data('statusintra'));
            $('#orderintra').val($(this).data('orderintra'));
            $('#consigneeintra').val($(this).data('consigneeintra'));
            $('#personintra').val($(this).data('personintra'));
            $('#addressintra').val($(this).data('addressintra'));
            $('#contactintra').val($(this).data('contactintra'));
        });
        //set values for show dispatch form
        $(document).on('click', '.showDmodalinter', function()
        {
            console.log('Hello Dispatch');
            $('#grnoffinter').val($(this).data('grninter'));
            $('#warehouseinter').val($(this).data('warehouseinter'));
            $('#dcninter').val($(this).data('dcninter'));
            $('#productinter').val($(this).data('productinter'));
            $('#quantityinter').val($(this).data('quantityinter'));
            $('#remarksinter').val($(this).data('remarksinter'));
            $('#statusinter').val($(this).data('statusinter'));
            $('#orderinter').val($(this).data('orderinter'));
            $('#consigneeinter').val($(this).data('consigneeinter'));
            $('#personinter').val($(this).data('personinter'));
            $('#addressinter').val($(this).data('addressinter'));
            $('#contactinter').val($(this).data('contactinter'));
        });

        $(document).on('click', '.editmodalR', function() {

            $('#r_id').val($(this).data('id'));
            $('#statusR').val($(this).data('statusR'));
            $('#quantityR').val($(this).data('av_quantity'));
            $('#sealStatusR').val($(this).data('sealStatusR'));
            $('#remarksR').val($(this).data('remarksR'));
            $('#cust_id').val($(this).data('customer_id'));
            $('#prod_id').val($(this).data('product_id'));
            
        });

        $('select.colSelect option:first').attr('disabled', true);
        $('select.colSelect_2 option:first').attr('disabled', true);
        $('select.colSelect_1 option:first').attr('disabled', true);
        $('.nocursor').css({"cursor":"default",'text-decoration': 'none'});


        $('#orderDateTime').slideUp();
        $(document).on('click', '#order_type_select', function() {

            if ($('#order_type_select').val() == 'Time Specific' )
            {
                $('#orderDateTime').slideDown();
                $('#sp_date').prop('disabled', false);
                $('#sp_time').prop('disabled', false);
            }
            else
            {
                $('#orderDateTime').slideUp();
                $('#sp_date').prop('disabled', true);
                $('#sp_time').prop('disabled', true);
            }
        });;


        $('.form-actions').on('click', '.editR', function() {

            console.log("helloR")
            $.ajax({
                type: 'POST',
                url: 'changeIn/' + $('#r_id').val(),
                data: {
                   '_token': $('input[name=_token]').val(),
                   'status' :$("#statusR").val(),
                   'remarks' :$("#remarksR").val(),
                   'sealStatus' :$("#sealStatusR").val(),
                   'av_quantity' : $('#quantityR').val(),
                   'customer_id' : $('#cust_id').val(),
                   'product_id' : $('#prod_id').val(),
               },
               success: function(data) {
                console.log(data);
                if(data!='success'){

                    if(document.getElementById('#editdanger')==null) {
                        jQuery('.editdanger .alert-danger').show();
                        jQuery('.editdanger .alert-danger').append('<p>'+'Please Fill All the required Fields!'+'</p>');
                    } else {

                    }


                }else if(data=='success'){
                    console.log(data);
                    jQuery('.editdanger .alert-danger').hide();
                    $('#addmodel1').modal('hide');

                    toastr.success('Successfully Updated!', 'Success Alert', {timeOut: 5000});
                    setTimeout(function()
                    {
                        location.reload(); 
                    }, 1000);
                }
            },
            error : function(error) {
                $('#EditModal').modal('hide');
                toastr.error('Errors Updating!', 'Errors Alert', {timeOut: 5000});
            }
        });
        });

        //Dispatch
        //
        //
        $(document).on('click', '.editmodalD', function() {
            console.log('Hello');
            console.log($(this).data('d_id'));
            $('#d_id').val($(this).data('d_id'));
            $('#statusD').val($(this).data('statusD'));
            $('#quantityD').val($(this).data('quantity'));
            $('#statusD').val($(this).data('sealStatusD'));
            $('#remarksD').val($(this).data('remarksD'));
        });


        $('.form-actions').on('click', '.editD', function() {

            console.log("helloD")
            console.log($('#d_id').val())
            $.ajax({
                type: 'POST',
                url: 'changeOff/' + $('#d_id').val(),
                data: {
                   '_token': $('input[name=_token]').val(),
                   'status' :$("#statusD").val(),
                   'remarks' :$("#remarksD").val(),
                   'sealStatus' :$("#sealStatusD").val(),
                   'quantity' : $('#quantityD').val(),
               },
               success: function(data) {
                console.log(data);
                if(data!='success'){

                    if(document.getElementById('#editdanger')==null) {
                        jQuery('.editdanger .alert-danger').show();
                        jQuery('.editdanger .alert-danger').append('<p>'+'Please Fill All the required Fields!'+'</p>');
                    } else {

                    }


                }else if(data=='success'){
                    console.log(data);
                    jQuery('.editdanger .alert-danger').hide();
                    $('#addmodel1').modal('hide');

                    toastr.success('Successfully Updated!', 'Success Alert', {timeOut: 5000});
                    setTimeout(function()
                    {
                        location.reload(); 
                    }, 1000);
                }
            },
            error : function(error) {
                $('#EditModal').modal('hide');
                toastr.error('Errors Updating!', 'Errors Alert', {timeOut: 5000});
            }
        });
        });


        jQuery('#customerSelect').on('input propertychange select change', function() {
                            //console.log($('#warehouseByLocation').val());;
                            console.log('Customer Id');
                            console.log($('#customerSelect').val());

                            $('#cu_Id').val($('#customerSelect').val());
                            $.ajax({
                                type: 'POST',
                                url: 'head/customer/product',
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id' :$('#customerSelect').val(),
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


                                        var html ='<option>Products Loaded</option>';
                                        for (var i = 0; i < data.length; i++) 
                                        {
                                            //console.log(data[i]['warehouse_location']);
                                            html += "<option value="+ data[i]['p_id'] +">"  + data[i]['name']+"</option>";
                                        }
                                                
                                        $('#productByCustomer').html(html);
                                        
                                    },
                                    error : function(error) {
                                                // $('#no_of_space').val(7);
                                                $('#productText').val('999999');
                                            }

                                        });

                        });
                        jQuery('#productByCustomer').on('input propertychange select change', function() {
                            //console.log($('#warehouseByLocation').val());;
                            console.log('Product Id');
                            console.log($('#productByCustomer').val());

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



                        //quantity for inload
            // jQuery('#productSelect').on('input propertychange select change', function() {
            //                 //console.log($('#warehouseByLocation').val());;
            //                 console.log('Product');
            //                 console.log($('#productSelect').val());
            //                 $.ajax({
            //                     type: 'POST',
            //                     url: '/warehouse/head/product/quantity',
            //                     data: {
            //                         '_token': $('input[name=_token]').val(),
            //                         'id' :$('#productSelect').val(),
            //                     },

            //                     success: function(response) {
            //                         var data = JSON.parse(response,true);
            //                         console.log('Product Response');
            //                         console.log(response);
            //                         console.log('Product Data');
            //                         console.log(data)
            //                         console.log('quantity');
            //                         console.log(data['quantity']);
            //                         console.log(data.length);



            //                         $('#available_quantity').val(data);
            //                         $("#available_quantity").attr({
            //                             "max" : data,
            //                             "min" : 0        
            //                         });
            //                     },
            //                     error : function(error) {
            //                                     // $('#no_of_space').val(7);
            //                                     $('#available_quantity').val('99999');

            //                                 }

            //                             });

            //             });

            // jQuery('#quantity').on('input propertychange paste', function() {
            //                 console.log('demand');
            //                 console.log($('#quantity').val());
            //                 console.log('avail');
            //                 console.log($('#available_quantity').val());
            //                 var demand = $('#quantity').val();
            //                 var avail  = $('#available_quantity').val();
            //                 if (+demand > +avail) 
            //                 {
            //                     console.log('if')
            //                     $('#submitButton').hide();
            //                 }
            //                 else
            //                 {
            //                     $('#submitButton').show();
            //                 }
            //             });


            //get product NOW
                jQuery('#orderSelect').on('input propertychange select change', function() {
                            //console.log($('#warehouseByLocation').val());;
                            console.log('Order Id');
                            console.log($('#orderSelect').val());

                            $('#in_Id').val($('#orderSelect').val());
                            $.ajax({
                                type: 'POST',
                                url: '/warehouse/head/order/product',
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

            //get customer NOW
                jQuery('#orderSelect').on('input propertychange select change', function() {
                            //console.log($('#warehouseByLocation').val());;
                            console.log('Order Id');
                            console.log($('#orderSelect').val());

                            $('#in_Id').val($('#orderSelect').val());
                            $.ajax({
                                type: 'POST',
                                url: '/warehouse/head/order/customer',
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id' :$('#orderSelect').val(),
                                },

                                success: function(response) {
                                    var data = JSON.parse(response,true);
                                    console.log('Customer Response');
                                    console.log(response);
                                    console.log('Customer Data');
                                    console.log(data)
                                    console.log(data['id']);
                                    console.log(data.length);


                                    $('#customerId').val(data['id']);
                                    $('#customerText').val(data['name']);

                                },
                                error : function(error) {
                                                // $('#no_of_space').val(7);
                                                $('#productText').val('999999');
                                            }

                                        });

                        });



                //quantity of order
                jQuery('#orderSelect').on('input propertychange select change', function() {
                            //console.log($('#warehouseByLocation').val());;
                            console.log('Order Id');
                            console.log($('#orderSelect').val());
                            $.ajax({
                                type: 'POST',
                                url: '/warehouse/head/order/quantity',
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



                                    $('#quantityDF').val(data);
                                    $("#quantitydemand").attr({
                                        "max" : data, 
                                        "min" : 0        
                                    });
                                },
                                error : function(error) {
                                                // $('#no_of_space').val(7);
                                                $('#quantityDF').val('99999');

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
                            var avail  = $('#quantityDF').val();
                            if (+demand > +avail) 
                            {
                                console.log('if')
                                $('#submitButtonD').hide();
                            }
                            else
                            {
                                $('#submitButtonD').show();
                            }
                        });
</script>

@endsection