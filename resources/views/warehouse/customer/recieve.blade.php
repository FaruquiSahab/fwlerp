@extends('layouts.dashboard')
@section('Title') Order Delivery @endsection
@section('content')
<div class="container" >
	<div class="row">
		<div class="caption">
			<i class="icon-settings font-red"></i>
			<span class="caption-subject font-red sbold uppercase"><b>Order</b></span>
		</div>
		<form class="form-horizontal" method="POST" action="{{ route('recieve.store') }}" >


			{{ csrf_field() }}


			<div class="form-group{{$errors->has('customer_id') ? ' has-error' : '' }}">
				<label for="name" class="col-md-4 control-label"><strong>Customer</strong></label>
				<div class="col-md-6">

					{!! Form::select('customer_id', $customer , null, ['placeholder' => 'Select a Customer...', 'class'=>'form-control', 'name'=>'customer_id', 'id'=>'customerSelect'])!!}
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

					{{-- {!! Form::select('product_id', $product , null, ['placeholder' => 'Select a Product...', 'class'=>'form-control', 'name'=>'product_id'])!!} --}}
                    <select name="product_id" id="productByCustomer" class="form-control">
                        <option>Select Product</option>
                    </select>
					@if ($errors->has('product_id'))
					<span class="help-block">
						<strong>{{ $errors->first('product_id') }}</strong>
					</span>
					@endif
				</div>
			</div>

                                    {{-- <div class="form-group">
                                        <label for="no_of_pkgs" class="col-md-4 control-label">Total Cartan</label>
                                        <div class="col-md-6">
                                            <input type="number" min="0" class="form-control" name="no_of_pkgs">
                                        </div>
                                        @if ($errors->has('no_of_pkgs'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_of_pkgs') }}</strong>
                                        </span>
                                        @endif
                                    </div> --}}



                                    <div class="form-group">
                                    	<label for="quantity" class="col-md-4 control-label"><strong>Piece Quantity</strong></label>
                                    	<div class="col-md-6">
                                    		<input id="quantity" type="number" min="0" class="form-control" name="quantity" >

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


                                    <div class="form-group">
                                    	<div class="col-md-2 col-md-offset-4">
                                    		<button type="submit" class="btn btn-primary">
                                    			Register
                                    		</button>
                                    	</div>
                                    	<div class="col-md-6 ">
                                    		
                                    	</div>
                                    </div>
                                </form>
                                @endsection

                    @section('script')

                    <script type="text/javascript">
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
                    </script>

                    @stop
