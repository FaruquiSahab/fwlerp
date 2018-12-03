@extends('layouts.dashboard')
@section('Title') Customers @endsection
@section('content')

                    {{-- Admin See customer products --}}

<div class="container" >
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<div class="portlet light ">
				<div class="portlet-title" >
					<div class="caption">
						<i class="icon-settings font-red"></i>
						<span class="caption-subject font-red sbold uppercase"><b>Products of {{ $customers[0]->name }}</b></span>
					</div>
					<div class="actions">
						<div class="btn-group btn-group-devided" data-toggle="buttons">


							<a href="" data-target="#addmodel" data-toggle="modal" class="btn btn-circle btn btn-transparent purple btn-outline btn-sm active" >Add Product</a>
						</div>
					</div>
					<div class="portlet-body" id="items">
						<div class="table-scrollable">

							<table class="table table-hover table-light " id="myTable">
								<thead>
                                    <tr>
                                        <th>Name</th>
                                        {{-- <th>Quantity</th> --}}
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Packing</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody >
                                   @foreach($products as $key => $product)
                                   <tr>
                                    
                                    <td><span class="label label-sm" style="font-size: 18px"><a>{{ $product->name }}</a></span></td>
                                    {{-- <td>
                                        {{ $product->quantity }}
                                        <a href="" class="btn btn-icon-only blue quantitymodal"data-toggle="modal"
                                            data-target="#incQuantityModel"
                                            data-id="{{ $product->p_id }}">
                                            <i   class="fa fa-plus"></i>
                                        </a>
                                    </td> --}}
                                    <td>{{ $product->type }}</td>
                                    <td>{{ $product->price }}</td>

                                    {{-- //Working QR Code --}}
                                    {{-- <td> <img src="data:image/png;base64, {{ DNS1D::getBarcodePNG(strval($product->p_id),'C93' )}}" height="30" width="250" > </td> --}}
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->packing }}</td>
                                    {{-- <td>
                                         <a href="" class="btn btn-icon-only red delete-club-button"data-id="{{ $product->p_id }}" title="Delete" data-toggle="modal" data-target="#deletemodal">
                                            <i class="fa fa-close"></i>
                                        </a>
                                        <a href="" class="btn btn-icon-only yellow editmodal"data-toggle="modal" data-target="#addmodel1"
                                            data-id="{{ $product->p_id }}"
                                            data-name="{{ $product->name }}"
                                            data-company="{{  $product->company }}"
                                            data-quantity="{{ $product->quantity }}"
                                            data-type="{{ $product->type }}"
                                            data-price="{{  $product->price }}"
                                            data-qrcode="{{ $product->qrcode }}"
                                            data-description="{{$product->description}}"
                                            data-packing="{{ $product->packing }}">
                                            <i   class="fa fa-edit"></i>
                                        </a>
                                    </td> --}}
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{--Add Quantity Modal  --}}
            {{-- <div id="incQuantityModel" class="modal" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Add Inventory</h5>
                  </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('product.quantity') }}"  class="form-horizontal" style="padding: 20px;" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" id="pro_id" name="p_id">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label col-md-3">Add Quantity</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="quantity" required>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary">
                        </form>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div> --}}
            {{-- End Add Quantity Modal --}}

                <!--begin::Delete Modal-->
            {{-- <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Warning
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>
                                Are You Sure You Want To Delete ?
                            </h5>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="deleteid" name="">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Cancel
                            </button>
                            <button type="button" id="showtoast"  class="btn btn-danger delete" data-dismiss="modal">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--end::DeleteModal-->

            {{-- start Edit model --}}
            {{-- <div class="modal fade in col-md-8" style="margin-left: 25%; margin-top:10px; padding: 20px; " id="addmodel1" tabindex="-1" role="basic" aria-hidden="true" style=" padding-right: 16px;">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bill"></i>Product Update</div>
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
                                            <input type="hidden" class="form-control" name="p_id" id="p_id">
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">
                                                    Name
                                                </label>
                                                <div class="col-md-9">

                                                    <input type="text" class="form-control" name="name" id="name" >
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">
                                                    Company
                                                </label>
                                                <div class="col-md-9">
                                                    
                                                    <input type="text" class="form-control" name="company" id="company" >
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">
                                                    Quantity

                                                </label>
                                                <div class="col-md-9">
                                                    
                                                    <input type="number" class="form-control" name="quantity" id="quantity" >
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">Type</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="type" id="type" >
                                                </div>
                                            </div>
                                        </div>


                                        
                                        <div class="col-md-6">
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
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Packing</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="packing" id="packing" >
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="button" class="btn green edit">Submit</button>
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
                        </div> --}}
                        {{-- end edit model --}}
                    </div>
                </div>
                    {{-- end  model --}}


                    {{-- start  model --}}
                    <div class="modal fade in" id="addmodel" tabindex="-1" role="basic" aria-hidden="true" style=" padding-right: 16px;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Add Product</h4>
                                </div>
                                <div class="modal-body" > 

                                    <form class="form-horizontal" method="POST" action="{{ route('product.store') }}" >

                                {{ csrf_field() }}
                                
                                <div class="form-group{{$errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                    <div class="form-group{{$errors->has('customer_id') ? ' has-error' : '' }}">
                                        <label for="customer_id" class="col-md-4 control-label">Customer</label>
                                        <div class="col-md-6">

                                            {!! Form::select('customer_id',$customer, null, ['class'=>'form-control',]) !!}
                                            {{-- <input type="text" value="{{ $customer->id }}" name="customer_id">
                                            <input type="text" value="{{ $customer->name }}"> --}}
                                            @if ($errors->has('customer_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('customer_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                
                               {{--  <div class="form-group{{$errors->has('company') ? ' has-error' : '' }}">
                                    <label for="company" class="col-md-4 control-label">Company</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="company" value="{{ old('company') }}" required>

                                        @if ($errors->has('company'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div> --}}
                                

                                <div class="form-group{{$errors->has('quantity') ? ' has-error' : '' }}">
                                    <label for="quantity" class="col-md-4 control-label">Quantity</label>

                                    <div class="col-md-6">
                                        <input id="quantity" type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" required>

                                        @if ($errors->has('quantity'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('quantity') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="type" class="col-md-4 control-label">Type</label>

                                    <div class="col-md-6">
                                        <input id=" type" type="text" class="form-control" name="type" required>

                                        @if ($errors->has('type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="price" class="col-md-4 control-label">Price</label>

                                    <div class="col-md-6">
                                        <input id="price" type="number" class="form-control" name="price" required>
                                    </div>

                                    @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                
                                <div class="form-group">
                                    <label for="description" class="col-md-4 control-label">Description</label>

                                    <div class="col-md-6">
                                        <input id="description" type="text" class="form-control" name="description" required>
                                    </div>
                                    
                                    @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="packing" class="col-md-4 control-label">Packing</label>
                                    <div class="col-md-6">
                                        <input id="packing" type="text" class="form-control" name="packing" required>
                                    </div>
                                    @if ($errors->has('packing'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('packing') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                {{-- <div class="form-group">
                                    <label for="weight" class="col-md-4 control-label">Weight</label>
                                    <div class="col-md-6">
                                        <input id="weight" type="number" class="form-control" name="weight" required>
                                    </div>
                                    @if ($errors->has('weight'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="length" class="col-md-4 control-label">Length</label>
                                    <div class="col-md-6">
                                        <input id="length" type="number" class="form-control" name="length" required>
                                    </div>
                                    @if ($errors->has('length'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('length') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="width" class="col-md-4 control-label">Width</label>
                                    <div class="col-md-6">
                                        <input id="width" type="number" class="form-control" name="width" required>
                                    </div>
                                    @if ($errors->has('width'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('width') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="height" class="col-md-4 control-label">Height</label>
                                    <div class="col-md-6">
                                        <input id="height" type="number" class="form-control" name="height" required>
                                    </div>
                                    @if ($errors->has('height'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                    @endif
                                </div> --}}


                                <div class="form-group">
                                    <div class="col-md-2 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Proceed
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
                                            <!-- /.modal-content 
                                        </div>
                                        <!-- /.modal-dialog -->
                                    {{-- </div>
                                    </div> --}}
                                    {{-- end  model --}}


                                </div>
                                
                                @endsection


                                @section('script')

                                <script type="text/javascript">

                                    $(document).on('click', '.quantitymodal', function() {
                                    
                                    $('#pro_id').val($(this).data('id'));
                                });


                                  $(document).on('click', '.editmodal', function() {
                                    
                                    $('#p_id').val($(this).data('id'));
                                    $('#name').val($(this).data('name'));
                                    $('#company').val($(this).data('company'));
                                    $('#quantity').val($(this).data('quantity'));
                                    $('#type').val($(this).data('type'));
                                    $('#price').val($(this).data('price'));
                                    $('#qrcode').val($(this).data('qrcode'));
                                    $('#description').val($(this).data('description'));
                                    $('#packing').val($(this).data('packing'));
                                });

                        //warehouse
						//update from warshouse 

                        $('.form-actions').on('click', '.edit', function() {

                            console.log("hello")
                            console.log($('#p_id').val());
                            $.ajax({
                                type: 'PUT',
                                url: '/admin/product/' + $('#p_id').val(),
                                data: {
                                   '_token': $('input[name=_token]').val(),
                                   'name' :$("#name").val(),
                                   'company': $('#company').val(),
                                   'quantity' : $('#quantity').val(),
                                   'type' : $('#type').val(),
                                   'price' : $('#price').val(),
                                   'qrcode' : $('#qrcode').val(),
                                   'description' : $('#description').val(),
                                   'packing' : $('#packing').val(),
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
                                url: 'product/' + $('#deleteid').val(),
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

                    //     Array.prototype.forEach.call(document.body.querySelectorAll("*[data-mask]"), applyDataMask);

                    //     function applyDataMask(field) {
                    //         var mask = field.dataset.mask.split('');

                    //     // For now, this just strips everything that's not a number
                    //     function stripMask(maskedData) {
                    //         function isDigit(char) {
                    //             return /\d/.test(char);
                    //         }
                    //         return maskedData.split('').filter(isDigit);
                    //     }

                    //     // Replace `_` characters with characters from `data`
                    //     function applyMask(data) {
                    //         return mask.map(function(char) {
                    //             if (char != '_') return char;
                    //             if (data.length == 0) return char;
                    //             return data.shift();
                    //         }).join('')
                    //     }

                    //     function reapplyMask(data) {
                    //         return applyMask(stripMask(data));
                    //     }

                    //     function changed() {   
                    //         var oldStart = field.selectionStart;
                    //         var oldEnd = field.selectionEnd;

                    //         field.value = reapplyMask(field.value);

                    //         field.selectionStart = oldStart;
                    //         field.selectionEnd = oldEnd;
                    //     }

                    //     field.addEventListener('click', changed)
                    //     field.addEventListener('keyup', changed)
                    // }
                    </script>

                    @endsection