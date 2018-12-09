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
						<span class="caption-subject font-red sbold uppercase"><b>Order Recieve</b></span>
					</div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a href=""  data-target="#addmodel2" data-toggle="modal" class="btn btn-circle btn btn-transparent purple btn-outline  btn-sm active" >Request Inload</a>
                        </div>
                    </div>

					<div class="portlet-body" id="items">
						<div class="table-scrollable">

							<table class="table table-hover table-light" id="myTable1">
								<thead>
									<tr>
                                        <th>GRN</th>
                                        <th>Item</th>
                                        <th>Item Packing</th>
                                            <th>Units</th>
                                            <th>Unit Available</th>
                                            {{-- <th>Vehicle No</th>
                                            <th>Vehicle Type</th>
                                            <th>Driver</th> --}}
                                            <th>Date</th>
                                            <th>Remarks</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                     @foreach($ordersin as $key => $order)
                                     <tr>
                                        <td><span class="label label-sm label-success blue" style="font-size: 15px">{{ $order->grn }}</span></td>
                                        <td>{{ $order->product->name ?? 'NULL'  }}</td>
                                        <td>{{ $order->product->packing ?? 'NULL'  }}</td>

                                    {{-- <td>{{ $order->no_of_pkgs }}</td>
                                    <td>{{ $order->av_pkgs }}</td> --}}
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->av_quantity }}</td>
                                    {{-- <td>{{ $order->vehicle_no }}</td>
                                    <td>{{ $order->vehicle_type }}</td>
                                    <td>{{ $order->driver_name }}</td> --}}
                                    <td>{{ $order->created_at->format('j F Y') }}</td>
                                    <td>{{ $order->remarks }}</td>
                                    <td>
                                        @if($order->status == "Pending")
                                            {{-- <input type="hidden" name="id" value="{{ $order->id }}">
                                            <input type="hidden" name="customer_id" value="{{ $order->customer_id }}"> --}}
                                            <button class="btn btn-default btn-sm red editmodalR" data-toggle="modal" data-target="#addmodel" data-id="{{ $order->id }}"
                                                data-product_id="{{ $order->product_id }}"
                                                data-customer_id="{{ $order->customer_id }}"
                                                        data-av_quantity"{{ $order->quantity }}"
                                            value="{{ $order->status }}">{{ $order->status }}</button>
                                        
                                        @elseif($order->status == "Accepted")
                                        <span class="label label-sm label-success" style="font-size: 12px">{{ $order->status }}</span>
                                        @elseif($order->status == "Rejected")
                                        <span class="label label-sm label-danger red" style="font-size: 12px">{{ $order->status }}</span>
                                        @else
                                            <button class="btn btn-default btn-sm red editmodalR" data-toggle="modal" data-target="#addmodel" data-id="{{ $order->id }}"
                                                            data-av_quantity"{{ $order->quantity }}"
                                                value="">Pending</button>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('head.inOne') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ encrypt($order->id) }}">
                                            <button class="btn btn-md blue hidden-print margin-bottom-5"  {{-- onclick="javascript:window.print();" --}}" >Print</button>
                                        </form>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <form method="GET" action="{{ route('head.inAll') }}">
                    <button class="btn btn-lg blue hidden-print" >Print</button>
                </form>
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
                                    {{-- <h3 class="form-section">Person Info</h3> --}}


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
                            <i class="fa fa-bill"></i>Recieve</div>
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


            <div class="form-group{{$errors->has('customer_id') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label"><strong>Customer</strong></label>
                <div class="col-md-6">

                    {!! Form::select('customer_id', $customer , null, ['class'=>'form-control', 'id'=>'customerSelect'])!!}
                    @if ($errors->has('customer_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('customer_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>


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


                                    <div class="form-group">
                                    <label for="" class="col-md-4 control-label"><strong>Available Quantity</strong></label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" id="available_quantity" disabled >
                                        </div>
                                        @if ($errors->has(''))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('') }}</strong>
                                        </span>
                                        @endif
                                    </div>


                                    
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

                                    <div class="form-group{{ $errors->has('driver_cnic') ? ' has-error' : '' }}">
                                        <label for="driver_cnic" class="col-md-4 control-label"><strong>Driver CNIC</strong></label>
                                        <div class="col-md-6">
                                            <input type="number" min="11"  class="form-control" name="driver_cnic" required>
                                        </div>
                                        @if ($errors->has('driver_cnic'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('driver_cnic') }}</strong>
                                        </span>
                                        @endif
                                    </div>

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


                                    <div class="form-group">                                        
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
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





















    </div>

    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title" >
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase"><b>Order Dispatch</b></span>
                </div>
                <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a href=""  data-target="#addmodel3" data-toggle="modal" class="btn btn-circle btn btn-transparent purple btn-outline  btn-sm active" >Request Dispatch</a>
                        </div>
                    </div>
                
                <div class="portlet-body" id="items">
                    <div class="table-scrollable">

                        <table class="table table-hover table-light" id="myTable">
                            <thead>
                                <tr>
                                    <th>DC Number</th>
                                    <th>Customer</th>
                                    <th>Item</th>
                                    <th>Item Packing</th>
                                    <th>Units</th>
                                    {{-- <th>Vehicle No</th>
                                    <th>Vehicle Type</th>
                                    <th>Driver</th> --}}
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach($ordersout as $key => $order)
                               <tr>
                                <td><span class="label label-sm label-success blue" style="font-size: 15px">{{ $order->dcn }}</span></td>
                                <td>{{ $order->customer->name}}</td>
                                <td>{{ $order->product->name ?? 'NULL'  }}</td>
                                <td>{{ $order->product->packing ?? 'NULL'  }}</td>

                                <td>{{ $order->quantity }}</td>
                                {{-- <td>{{ $order->vehicle_no }}</td>
                                <td>{{ $order->vehicle_type }}</td>
                                <td>{{ $order->driver_name }}</td> --}}
                                <td>{{ $order->created_at->format('j F Y') }}</td>
                                <td>
                                @if($order->status == "Pending")
                                        <button class="btn btn-default btn-sm red editmodalD" data-toggle="modal" data-target="#addmodel1"
                                            data-d_id="{{ $order->id }}"
                                            data-customer="{{ $order->customer_id }}"
                                            data-quantity="{{ $order->quantity }}"
                                            value="{{ $order->status }}">{{ $order->status }}
                                        </button>
                                    @elseif($order->status == "Accepted")
                                <span class="label label-sm label-success blue" style="font-size: 12px">{{ $order->status }}</span>
                                @else
                                    <button class="btn btn-default btn-sm red editmodalR" data-toggle="modal" data-target="#addmodel1" data-id="{{ $order->id }}"
                                    data-av_quantity"{{ $order->quantity }}"
                                    value="">Pending</button>
                                    @endif
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('head.offOne') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ encrypt($order->id) }}">
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
            <form method="GET" action="{{ route('head.offAll') }}">
                <button class="btn btn-lg blue hidden-print" >Print</button>
            </form>
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
                                                        <option>Accepted</option>
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

    <div class="form-group{{$errors->has('inload_id') ? ' has-error' : '' }}">
        <label for="inload_id" class="col-md-4 control-label">GRN</label>
        <div class="col-md-6">

            {!! Form::select('inload_id', $inload , null, ['placeholder' => 'Select GRN...', 'class'=>'form-control', 'name'=>'inload_id', 'id'=>'orderSelect', 'required' ])!!}
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
    

    {{-- Not Confrm --}}
                                    {{-- <div class="form-group">
                                        <label for="no_of_pkgs" class="col-md-4 control-label">Cartans Available</label>
                                        <div class="col-md-6">
                                            <input id="cartans" type="number" min="0" class="form-control" disabled>
                                        </div>
                                        @if ($errors->has('no_of_pkgs'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_of_pkgs') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="no_of_pkgs" class="col-md-4 control-label">Cartans</label>
                                        <div class="col-md-6">
                                            <input id="cartansDemand" type="number" min="0" class="form-control" name="no_of_pkgs">
                                        </div>
                                        @if ($errors->has('no_of_pkgs'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_of_pkgs') }}</strong>
                                        </span>
                                        @endif
                                    </div> --}}



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


                                    <div class="form-group">
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
                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-2 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary" id="submitButtonD">
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



                                                    {{-- form offload  end --}}






</div>

@endsection


@section('script')

<script type="text/javascript">
        $(document).on('click', '.editmodalR', function() {

            $('#r_id').val($(this).data('id'));
            $('#statusR').val($(this).data('statusR'));
            $('#quantityR').val($(this).data('av_quantity'));
            $('#sealStatusR').val($(this).data('sealStatusR'));
            $('#remarksR').val($(this).data('remarksR'));
            $('#cust_id').val($(this).data('customer_id'));
            $('#prod_id').val($(this).data('product_id'));
            
        });


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

            $('#d_id').val($(this).data('d_id'));
            $('#statusD').val($(this).data('statusD'));
            $('#quantityD').val($(this).data('quantity'));
            $('#sealStatusD').val($(this).data('sealStatusD'));
            $('#remarksD').val($(this).data('remarksD'));
        });


        $('.form-actions').on('click', '.editD', function() {

            console.log("helloD")
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


                        //quantity for inload
            jQuery('#productSelect').on('input propertychange select change', function() {
                            //console.log($('#warehouseByLocation').val());;
                            console.log('Product');
                            console.log($('#productSelect').val());
                            $.ajax({
                                type: 'POST',
                                url: '/warehouse/head/product/quantity',
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id' :$('#productSelect').val(),
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



                                    $('#available_quantity').val(data);
                                    $("#available_quantity").attr({
                                        "max" : data,
                                        "min" : 0        
                                    });
                                },
                                error : function(error) {
                                                // $('#no_of_space').val(7);
                                                $('#available_quantity').val('99999');

                                            }

                                        });

                        });

            jQuery('#quantity').on('input propertychange paste', function() {
                            console.log('demand');
                            console.log($('#quantity').val());
                            console.log('avail');
                            console.log($('#available_quantity').val());
                            var demand = $('#quantity').val();
                            var avail  = $('#available_quantity').val();
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