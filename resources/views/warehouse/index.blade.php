@extends('layouts.dashboard')
@section('Title') Warehouse @endsection
@section('content')
<div class="container" >
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<div class="portlet light ">
				<div class="portlet-title" >
					<div class="caption">
						<i class="icon-settings font-red"></i>
						<span class="caption-subject font-red sbold uppercase"><b>Warehouse</b></span>
					</div>
					<div class="actions">
						<div class="btn-group btn-group-devided" data-toggle="buttons">


							<a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-circle btn btn-transparent purple btn-outline  btn-sm active" >Add Warehouse</a>
						</div>
					</div>
					<div class="portlet-body" id="items">
						<div class="table-scrollable">

							<table class="table table-hover table-light" id="myTable">
								<thead>
									<tr>
                                        
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Space</th>
                                        <th>Shelves</th>
                                        <th>Free Space</th>
                                        <th>Free Shelves</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                   @foreach($warehouses as $key => $warehouse)
                                   <tr>
                                    
                                    <td><span class="label label-sm label-primary" style="font-size:15px">{{ $warehouse->w_name }}</span></td>
                                    <td class="uppercase">{{ $warehouse->location }}</td>
                                    <td>{{ $warehouse->warehouse_space }}</td>
                                    <td>{{ $warehouse->no_of_shelves }}</td>
                                    <td>{{ $warehouse->free_space }}</td>
                                    <td>{{ $warehouse->free_shelves }}</td>
                                    <td>
                                     {{-- <a href="" class="btn btn-icon-only red delete-club-button"data-id="{{ $warehouse->w_id }}" title="Delete" data-toggle="modal" data-target="#deletemodal">
                                        <i class="fa fa-close"></i>
                                    </a> --}}
                                    <a href="" class="btn btn-icon-only yellow editmodal"data-toggle="modal" data-target="#addmodel1"    data-id="{{ $warehouse->w_id }}"
                                        {{-- data-warehouse_contract="{{  $warehouse->warehouse_contract }}" --}}
                                        data-no_of_shelves="{{  $warehouse->no_of_shelves }}"
                                        data-warehouse_space="{{ $warehouse->warehouse_space }}"
                                        data-user_id="{{ $warehouse->user_id }}"
                                        data-free_space="{{ $warehouse->free_space }}"
                                        data-free_shelves="{{ $warehouse->free_shelves }}"
                                        data-warehouse_rate="{{ $warehouse->warehouse_rate }}">
                                        <i   class="fa fa-edit"></i>
                                    </a>
                                </td>
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
                                Are u sure u want to delete?
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
                            <i class="fa fa-bill"></i><strong>Update Warehouse </strong> </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body " >
                            <!-- BEGIN FORM-->


                            <form  class="form-horizontal" style="padding: 20px;" enctype="multipart/form-data">

                                {{ csrf_field() }}
                                <div class="form-body">
                                    {{-- <h3 class="form-section">Person Info</h3> --}}


                                    <div class="form-group">

                                        <div class="col-md-6">
                                            <input type="hidden" class="form-control" name="w_id" id="w_id">
                                        </div>
                                    </div>

                                    <div class="row">


                                        {{-- <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">
                                                    Contract
                                                </label>
                                                <div class="col-md-9">
                                                    
                                                    <input type="text" class="form-control" name="warehouse_contract" id="warehouse_contract" >
                                                    
                                                </div>
                                            </div>
                                        </div> --}}

                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">
                                                    <strong>Total Space</strong>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="number" class="form-control" name="warehouse_space" id="warehouse_space" >
                                                </div>
                                            </div>
                                        </div>


                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><strong>Total Shelves</strong></label>
                                                <div class="col-md-6">
                                                    <input type="number" class="form-control" name="no_of_shelves" id="no_of_shelves" >
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><strong>Free Space</strong></label>
                                                <div class="col-md-6">
                                                    <input type="number" class="form-control" name="free_space" id="free_space" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><strong>Free Shelves</strong></label>
                                                <div class="col-md-6">
                                                    <input type="number" class="form-control" name="free_shelves" id="free_shelves" >
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><strong>Warehouse Head</strong></label>
                                                <div class="col-md-6">
                                                    {!! Form::select('user_id', $employee , null, ['placeholder' => 'Select a Employee...', 'class'=>'form-control', 'name'=>'user_id', 'id'=>'user_id'])!!}
                                                    {{-- <input type="text" class="form-control" name="user_id" id="user_id" > --}}
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><strong>Rate</strong></label>
                                                <div class="col-md-6">
                                                    <input type="number" class="form-control" name="warehouse_rate" id="warehouse_rate" >
                                                </div>
                                            </div>
                                        </div>



                                        <!--/span-->
                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-offset-6 col-md-9">
                                                        <button type="button" class="btn green edit">Submit</button>
                                                        <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->
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
                            <h4 class="modal-title">Add New Warehouse</h4>
                        </div>
                        <div class="modal-body" > 

                            <form class="form-horizontal" method="POST" action="{{ route('warehouse.store') }}" >
                                

                                {{ csrf_field() }}
                                
                                <div class="form-group{{$errors->has('w_name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Warehouse Name</label>
                                    <div class="col-md-6">
                                        <input id="w_name" type="text" class="form-control" name="w_name" value="{{ old('w_name') }}" required autofocus>

                                        @if ($errors->has('warehouse_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('w_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('warehouse_contract') ? ' has-error' : '' }}">
                                    <label for="warehouse_contract" class="col-md-4 control-label">	Warehouse Contract</label>

                                    <div class="col-md-6">
                                        <input id="warehouse_contract" type="text" class="form-control" name="warehouse_contract" value="{{ old('warehouse_contract') }}" required>

                                        @if ($errors->has('	warehouse_contract'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('	warehouse_contract') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{$errors->has('location') ? ' has-error' : '' }}">
                                    <label for="location" class="col-md-4 control-label">Location</label>

                                    <div class="col-md-6">
                                        <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required>

                                        @if ($errors->has('location'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('warehouse_space') ? ' has-error' : '' }}">
                                    <label for="warehouse_space" class="col-md-4 control-label">Total Space</label>

                                    <div class="col-md-6">
                                        <input id="	warehouse_space" type="number" class="form-control" name="warehouse_space" required>

                                        @if ($errors->has('warehouse_space'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('warehouse_space') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="no_of_shelves" class="col-md-4 control-label">Total Shelves</label>

                                    <div class="col-md-6">
                                        <input id="no_of_shelves" type="number" class="form-control" name="no_of_shelves" required>
                                    </div>

                                    @if ($errors->has('no_of_shelves'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_of_shelves') }}</strong>
                                    </span>
                                    @endif
                                </div>



                                <div class="form-group">
                                    <label for="user_id" class="col-md-4 control-label">Warehouse Head</label>

                                    <div class="col-md-6">
                                        {!! Form::select('user_id', $employee , null, ['placeholder' => 'Select a Employee...', 'class'=>'form-control', 'name'=>'user_id'])!!}
                                        {{-- <input id="user_id" type="text" class="form-control" name="user_id" required> --}}
                                    </div>
                                    
                                    @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                


                                {{-- <div class="form-group">
                                    <label for="free_space" class="col-md-4 control-label">free_space</label>

                                    <div class="col-md-6">
                                        <input id="free_space" type="text" class="form-control" name="free_space" required>
                                    </div>
                                    
                                    @if ($errors->has('free_space'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('free_space') }}</strong>
                                    </span>
                                    @endif
                                    
                                </div> --}}





                                {{-- <div class="form-group">
                                    <label for="free_shelves" class="col-md-4 control-label">free_shelves</label>

                                    <div class="col-md-6">
                                        <input id="free_shelves" type="text" class="form-control" name="free_shelves" required>
                                    </div>
                                    
                                    @if ($errors->has('free_shelves'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('free_shelves') }}</strong>
                                    </span>
                                    @endif
                                </div> --}}



                                {{-- <div class="form-group{{ $errors->has('warehouse_rate') ? ' has-error' : '' }}">
                                    <label for="warehouse_rate" class="col-md-4 control-label">Warehouse Rate</label>

                                    <div class="col-md-6">
                                        <input id="warehouse_rate" type="number" class="form-control" name="warehouse_rate" required>
                                    </div>

                                    @if ($errors->has('warehouse_rate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('warehouse_rate') }}</strong>
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
                                    
                                    $('#w_id').val($(this).data('id'));
                                    $('#w_name').val($(this).data('w_name'));
                                    $('#warehouse_contract').val($(this).data('warehouse_contract'));
                                    $('#location').val($(this).data('location'));
                                    $('#warehouse_space').val($(this).data('warehouse_space'));
                                    $('#no_of_shelves').val($(this).data('no_of_shelves'));
                                    $('#user_id').val($(this).data('user_id'));
                                    $('#free_space').val($(this).data('free_space'));
                                    $('#free_shelves').val($(this).data('free_shelves'));
                                    $('#warehouse_rate').val($(this).data('warehouse_rate'));
                                });

                        //warehouse
						//update from warshouse 

                        $('.form-actions').on('click', '.edit', function() {
                            
                            console.log("hello")
                            console.log($('#w_id').val());
                            $.ajax({
                                type: 'POST',
                                url: 'warehouse/update/' + $('#w_id').val(),
                                data: {
                                   '_token': $('input[name=_token]').val(),
                                   'w_name' :$("#w_name").val(),
                                   'warehouse_contract': $('#warehouse_contract').val(),
                                   'location' : $('#location').val(),
                                   'warehouse_space' : $('#warehouse_space').val(),
                                   'no_of_shelves' : $('#no_of_shelves').val(),
                                   'user_id' : $('#user_id').val(),
                                   'free_space' : $('#free_space').val(),
                                   'free_shelves' : $('#free_shelves').val(),
                                   'warehouse_rate' : $('#warehouse_rate').val(),

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
                                type: 'POST',
                                url: 'warehouse/delete/' + $('#deleteid').val(),
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
                    </script>

                    @endsection