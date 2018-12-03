@extends('layouts.dashboard')
@section('Title') Order Delivery @endsection
@section('content')

                    {{-- Admin login to see customers for their products --}}

<div class="container" >
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<div class="portlet light ">
				<div class="portlet-title" >
					<div class="caption">
						<i class="icon-settings font-red"></i>
						<span class="caption-subject font-red sbold uppercase"><b>Select Customer </b></span><br>
                        <span class="font-red">Select Customer To See Their Product</span>
					</div>
					<div class="actions">
						<div class="btn-group btn-group-devided" data-toggle="buttons">


							<a href="" data-target="#addmodel" data-toggle="modal" class="btn btn-circle btn btn-transparent purple btn-outline btn-sm active" >Add Customer</a>
						</div>
					</div>
                    {{-- <div class="col-md-6">
                        @foreach($customers as $key => $customer)
                            <span class="label label-sm" style="font-size: 25px"><a href="{{ route('head.show',encrypt($customer->id)) }}">{{ $customer->name }}</a></span>
                            <br>
                        @endforeach
                    </div> --}}
					<div class="portlet-body" id="items">
						<div class="table-scrollable">

							<table class="table table-hover table-light " id="myTable">
								<thead>
									<tr>
                                        <th>Customer</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody >
                                   @foreach($customers as $key => $customer)
                                   <tr>
                                    <td class="col-md-12"><span class="label label-sm" style="font-size: 18px"><a href="{{ route('head.customer.product',encrypt($customer->id)) }}">{{ $customer->name }}</a></span></td>
                                    {{-- <td>
                                     <a href="" class="btn btn-icon-only red delete-club-button"data-id="{{ $customer->id }}" title="Delete" data-toggle="modal" data-target="#deletemodal">
                                        <i class="fa fa-close"></i>
                                    </a>
                                    <a href="" class="btn btn-icon-only yellow editmodal"data-toggle="modal" data-target="#addmodel1" data-id="{{ $customer->id }}"
                                        data-name="{{ $customer->name }}"
                                        data-email="{{  $customer->email }}"
                                        data-password="{{ $customer->password }}"
                                        data-contact_no="{{ $customer->contact_no }}"
                                        data-address="{{  $customer->address }}">
                                        <i class="fa fa-edit"></i>
                                     </a>   
                                 </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                

                <!--begin::Delete Modal-->
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                Are you sure you want to delete the ?
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
            </div>
            <!--end::DeleteModal-->

            {{-- start Edit model --}}
            <div class="modal fade in col-md-8" style="margin-left: 25%; margin-top:10px; padding: 20px; " id="addmodel1" tabindex="-1" role="basic" aria-hidden="true" style=" padding-right: 16px;">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bill"></i>Customer Information Update</div>
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
                                            <input type="hidden" class="form-control" name="id" id="id">
                                        </div>
                                    </div>

                                    <div class="form-group{{$errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Name</label>
                                            <div class="col-md-6">
                                                    <input type="text" id="c_name" class="form-control" name="name">
                                                @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="quantity" class="col-md-4 control-label">Email</label>
                                            <div class="col-md-6">
                                                <input  type="email" id="email"  class="form-control" name="email" >

                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="password" class="col-md-4 control-label">Password</label>
                                            <div class="col-md-6">
                                                <input type="password" id="password" class="form-control" name="password" >
                                            </div>
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="contact_no" class="col-md-4 control-label">Contact</label>
                                            <div class="col-md-6">
                                                <input type="text" id="contact_no" class="form-control" name="contact_no" required>
                                            </div>
                                            @if ($errors->has('contact_no'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('contact_no') }}</strong>
                                            </span>
                                            @endif

                                        </div>

                                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                            <label for="address" class="col-md-4 control-label">Address</label>
                                            <div class="col-md-6">
                                                <input id="address" type="text" class="form-control" name="address" required>
                                            </div>
                                            @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="button" id="updateButton" class="btn green edit">Submit</button>
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


                    {{-- start  model --}}
                    <div class="modal fade in" id="addmodel" tabindex="-1" role="basic" aria-hidden="true" style=" padding-right: 16px;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Add Customer</h4>
                                </div>
                                <div class="modal-body" > 

                                    <form class="form-horizontal" method="POST" action="{{ route('admin_customer.store') }}" >


                                        {{ csrf_field() }}


                                        <div class="form-group{{$errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Name</label>
                                            <div class="col-md-6">
                                                    <input type="text" class="form-control" name="name">
                                                @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{$errors->has('acr') ? ' has-error' : '' }}">
                                            <label for="acr" class="col-md-4 control-label">Acronym</label>
                                            <div class="col-md-6">
                                                    <input type="text" class="form-control" name="acr" placeholder="3 Letter Short Form of Name">
                                                @if ($errors->has('acr'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('acr') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="quantity" class="col-md-4 control-label">Email</label>
                                            <div class="col-md-6">
                                                <input  type="email"  class="form-control" name="email" value="" >

                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="password" class="col-md-4 control-label">Password</label>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="password" >
                                            </div>
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="contact_no" class="col-md-4 control-label">Contact</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="contact_no" required>
                                            </div>
                                            @if ($errors->has('contact_no'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('contact_no') }}</strong>
                                            </span>
                                            @endif

                                        </div>

                                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                            <label for="address" class="col-md-4 control-label">Address</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="address" required>
                                            </div>
                                            @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    {{-- <div class="form-group{{ $errors->has('driver_cnic') ? ' has-error' : '' }}">
                                        <label for="driver_cnic" class="col-md-4 control-label">Driver CNIC</label>
                                        <div class="col-md-6">
                                            <input type="number" min="11" max="11" class="form-control" name="driver_cnic" required>
                                        </div>
                                        @if ($errors->has('driver_cnic'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('driver_cnic') }}</strong>
                                        </span>
                                        @endif
                                    </div> --}}


                                    <div class="form-group">
                                        <div class="col-md-2 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
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
                                  $(document).on('click', '.editmodal', function() {

                                    $('#id').val($(this).data('id'));
                                    $('#c_name').val($(this).data('name'))
                                    $('#email').val($(this).data('email'));
                                    $('#password').val($(this).data('password'));
                                    $('#contact_no').val($(this).data('contact_no'));
                                    $('#address').val($(this).data('address'));
                                });

                        //warehouse
						//update from warshouse 

                        $('.form-actions').on('click', '.edit', function() {

                            console.log("hello")
                            console.log($('#id').val());
                            $.ajax({
                                type: 'PUT',
                                url: 'head/update_customer/' + $('#id').val(),
                                data: {
                                   '_token': $('input[name=_token]').val(),
                                   'id': $('#id'),
                                   'name' :$("#c_name").val(),
                                   'email': $('#email').val(),
                                   'password': $('#password'),
                                   'contact_no': $('#contact_no'),
                                   'address': $('#address')

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