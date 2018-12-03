@extends('layouts.dashboard')
@section('Title') Order Delivery @endsection
@section('content')
<div class="caption">
    <i class="icon-settings font-red"></i>
    <span class="caption-subject font-red sbold uppercase"><b>Order Dispatch</b></span>
</div>
<form class="form-horizontal" method="POST" action="{{ route('dispatch.store') }}" >


    {{ csrf_field() }}


    <input type="hidden" name="in_Id" id="in_Id">

    <div class="form-group{{$errors->has('inload_id') ? ' has-error' : '' }}">
        <label for="inload_id" class="col-md-4 control-label">GRN</label>
        <div class="col-md-6">

            {!! Form::select('inload_id', $inload , null, ['placeholder' => 'Select GRN...', 'class'=>'form-control', 'name'=>'inload_id', 'id'=>'orderSelect' ])!!}
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
            <input type="hidden" id="customerId" name="customer_id">
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
                                            <input id="quantity" type="number" min="0" class="form-control" disabled>

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




                                @endsection


                                @section('script')

                                <script type="text/javascript">
                                  $(document).on('click', '.editmodal', function() {

                                    $('#id').val($(this).data('id'));
                                });

                        //warehouse
                        //update from warshouse 

                        $('.form-actions').on('click', '.edit', function() {

                            console.log("hello")
                            console.log($('#id').val());
                            $.ajax({
                                type: 'PUT',
                                url: 'temp/' + $('#id').val(),
                                data: {
                                 '_token': $('input[name=_token]').val(),

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

                                    toastr.success('Successfully Updated Bill!', 'Success Alert', {timeOut: 5000});
                                                setTimeout(function(){// wait for 5 secs(2)
                                                             location.reload(); // then reload the page.(3)
                                                         }, 1000);
                                            }
                                        },
                                        error : function(error) {
                                            $('#EditModal').modal('hide');
                                            toastr.error('Errors Updating Bill!', 'Errors Alert', {timeOut: 5000});
                                        }
                                    });
                        });




                        $(document).on('click', '.delete-club-button', function() {
                            $('#deleteid').val($(this).data('id'));
                        });
                        $(document).on('click', '#showtoast', function() {
                            console.log($('#deleteid').val());
                            $.ajax({
                                type: 'DELETE',
                                url: 'temp/' + $('#deleteid').val(),
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                },
                                success: function(reponse) {
                                    $('#deletemodal').modal('hide');
                                    console.log(reponse);
                                    
                                    toastr.success('Successfully Deleted!', 'Success Alert', {timeOut: 5000});
                                                setTimeout(function(){// wait for 5 secs(2)
                                                             location.reload(); // then reload the page.(3)
                                                         }, 1000);
                                                
                                            },
                                            error : function(error) { 
                                                $('#deletemodal').modal('hide');
                                                toastr.error('Error in Deletion!', 'Errors Alert', {timeOut: 5000});
                                            }

                                        });
                        });


                //get product NOW
                jQuery('#orderSelect').on('input propertychange select change', function() {
                            //console.log($('#warehouseByLocation').val());;
                            console.log('Order Id');
                            console.log($('#orderSelect').val());

                            $('#in_Id').val($('#orderSelect').val());
                            $.ajax({
                                type: 'POST',
                                url: 'head/order/product',
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
                                url: 'head/order/customer',
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
                                url: 'head/order/quantity',
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



                                    $('#quantity').val(data);
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
                //pkgs of order
                // jQuery('#orderSelect').on('input propertychange select change', function() {
                //             //console.log($('#warehouseByLocation').val());;
                //             console.log('Order Id');
                //             console.log($('#orderSelect').val());
                //             $.ajax({
                //                 type: 'POST',
                //                 url: '/order/pkgs',
                //                 data: {
                //                     '_token': $('input[name=_token]').val(),
                //                     'id' :$('#orderSelect').val(),
                //                 },

                //                 success: function(response) {
                //                         // $('#no_of_space').val(8);
                //                         var data = JSON.parse(response,true);
                //                         // console.log('Product Response');
                //                         // console.log(response);
                //                         // console.log('Product Data');
                //                         // console.log(data)
                //                         // console.log('pkgs');
                //                         // console.log(data['no_of_pkgs']);
                //                         // console.log(data.length);



                //                         $('#cartans').val(data);
                //                         $("#cartansDemand").attr({
                //                             "max" : data, 
                //                             "min" : 0        
                //                         });

                //                     },
                //                     error : function(error) {
                //                                 // $('#no_of_space').val(7);
                //                                 $('#cartans').val('999999');
                //                             }

                //                         });

                //         });

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



                        // if cartans is more than available
                        // jQuery('#cartansDemand').on('input propertychange paste', function() {
                        //     console.log('demand');
                        //     console.log($('#cartansDemand').val());
                        //     console.log('avail');
                        //     console.log($('#cartans').val());
                        //     var demand = $('#cartansDemand').val();
                        //     var avail  = $('#cartans').val();
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



                    </script>

                    @endsection