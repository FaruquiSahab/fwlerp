@extends('layouts.dashboard')
@section('Title') Warehouse Management @endsection
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
                                        <th>Client</th>
                                        <th>Sales Person</th>
                                        <th>Warehouse</th>
                                        <th>No of Shelves</th>
                                        <th>Duration</th>
                                        <th>Amount</th>
                                        <th>Rate/Day</th>
                                        <th>Rate/Space</th>
                                        <th>BarCode</th>
                                        <th>Company</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                   @foreach($managements as $key => $manage)
                                   <tr>
                                    <td>{{ $manage->client->name ?? 'NULL' }}</td>
                                    <td>{{ $manage->employee->name ?? 'NULL' }}</td>
                                    <td>{{ $manage->warehouse->w_name ?? 'NULL' }}</td>
                                    <td>{{ $manage->no_of_shelves }}</td>
                                    <td>{{ $manage->duration }}</td>
                                    <td>{{ $manage->amount }}</td>
                                    <td>{{ $manage->rate_per_day }}</td>
                                    <td>{{ $manage->rate_per_space }}</td>
                                    <td>{{ $manage->qrcode }}</td>
                                    <td>{{ $manage->company->corporate_name ?? 'NULL' }}</td>
                                    <td>{{ $manage->contract_type }}</td>
                                    <td>
                                     <a href="" class="btn btn-icon-only red delete-club-button"data-id="{{ $manage->wm_id }}" title="Delete" data-toggle="modal" data-target="#deletemodal">
                                        <i class="fa fa-close"></i>
                                    </a>
                                    <a href="" class="btn btn-icon-only yellow editmodal"data-toggle="modal" data-target="#addmodel1" data-id="{{ $manage->wm_id }}"
                                        data-client_id="{{ $manage->client_id }}"
                                        data-sales_person_id="{{  $manage->sales_person_id }}"
                                        data-w_id="{{ $manage->w_id }}"
                                        data-no_of_shelves="{{  $manage->no_of_shelves }}"
                                        data-duration="{{ $manage->duration }}"
                                        data-amount="{{$manage->amount}}"
                                        data-rate_per_day="{{ $manage->rate_per_day }}"
                                        data-rate_per_space="{{ $manage->rate_per_space }}"
                                        data-qrcode="{{ $manage->qrcode }}"
                                        data-company_id="{{ $manage->company_id }}"
                                        data-contract_type="{{ $manage->contract_type }}">
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
                                Are u sure u want to delete the Bill?
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
                            <i class="fa fa-bill"></i>Update Warehouse Management </div>
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

                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="wm_id" id="wm_id">
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">
                                                    Client
                                                </label>
                                                <div class="col-md-9">

                                                    {{-- <input type="text" class="form-control" name="client_id" id="client_id" > --}}

                                                    {!! Form::select('client_id', $client , null, ['placeholder' => 'Select a Client...', 'class'=>'form-control', 'name'=>'client_id', 'id'=>'client_id'])!!}
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">
                                                    Sales Person
                                                </label>
                                                <div class="col-md-9">
                                                    
                                                    {{-- <input type="text" class="form-control" name="sales_person_id" id="sales_person_id" > --}}

                                                    {!! Form::select('sales_person_id', $employee , null, ['placeholder' => 'Select a Employee...', 'class'=>'form-control', 'name'=>'sales_person_id', 'id'=>'sales_person_id'])!!}
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">
                                                    Warehouse
                                                </label>
                                                <div class="col-md-9">
                                                    
                                                    {{-- <input type="text" class="form-control" name="w_id" id="w_id" > --}}

                                                    {!! Form::select('w_id', $warehouse , null, ['placeholder' => 'Select a Warehouse...', 'class'=>'form-control', 'name'=>'w_id', 'id'=>'w_id'])!!}
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">
                                                    Shelves
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="number" class="form-control" name="no_of_shelves" id="no_of_shelves" >
                                                </div>
                                            </div>
                                        </div>


                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Duration</label>
                                                <div class="col-md-9">
                                                    <input type="number" class="form-control" name="duration" id="duration" >
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Amount</label>
                                                <div class="col-md-9">
                                                    <input type="number" class="form-control" name="amount" id="amount" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Rate/Day</label>
                                                <div class="col-md-9">
                                                    <input type="number" class="form-control" name="rate_per_day" id="rate_per_day" >
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Rate/Space </label>
                                                <div class="col-md-9">
                                                    <input type="number" class="form-control" name="rate_per_space" id="rate_per_space" >
                                                </div>
                                            </div>
                                        </div>                                        

                                        

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Company</label>
                                                <div class="col-md-9">
                                                    {{-- <input type="text" class="form-control" name="company_id" id="company_id" > --}}

                                                    {!! Form::select('company_id', $company , null, ['placeholder' => 'Select a Company...', 'class'=>'form-control', 'name'=>'company_id', 'id'=>'company_id'])!!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Type</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="contract_type" id="contract_type" >
                                                </div>
                                            </div>
                                        </div>



                                        <!--/span-->
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
                            <h4 class="modal-title">Warehouse Management</h4>
                        </div>
                        <div class="modal-body" > 

                            <form class="form-horizontal" method="POST" action="{{ route('management.store') }}" >
                                

                                {{ csrf_field() }}
                                
                                <div class="form-group{{$errors->has('client_id') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Client</label>
                                    <div class="col-md-6">

                                        {!! Form::select('client_id', $client , null, ['placeholder' => 'Select a Client...', 'class'=>'form-control', 'name'=>'client_id'])!!}
                                        @if ($errors->has('client_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('client_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('sales_person_id') ? ' has-error' : '' }}">
                                    <label for="sales_person_id" class="col-md-4 control-label">Sales Person</label>

                                    <div class="col-md-6">
                                        {{-- <input id="sales_person_id" type="text" class="form-control" name="sales_person_id" value="{{ old('sales_person_id') }}" required> --}}
                                        {!! Form::select('sales_person_id', $employee , null, ['placeholder' => 'Select a Employee...', 'class'=>'form-control', 'name'=>'sales_person_id'])!!}

                                        @if ($errors->has('	sales_person_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('	sales_person_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{$errors->has('w_id') ? ' has-error' : '' }}">
                                    <label for="w_id" class="col-md-4 control-label">Warehouse</label>

                                    <div class="col-md-6">
                                        {{-- <input id="w_id" type="text" class="form-control" name="w_id" value="{{ old('w_id') }}" required> --}}

                                        {!! Form::select('w_id', $warehouse , null, ['placeholder' => 'Select a Warehouse...', 'class'=>'form-control', 'name'=>'w_id'])!!}

                                        @if ($errors->has('w_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('w_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('no_of_shelves') ? ' has-error' : '' }}">
                                    <label for="no_of_shelves" class="col-md-4 control-label">Shelves</label>

                                    <div class="col-md-6">
                                        <input id="	no_of_shelves" type="number" class="form-control" name="no_of_shelves" required>

                                        @if ($errors->has('no_of_shelves'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_of_shelves') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="duration" class="col-md-4 control-label">Duration</label>

                                    <div class="col-md-6">
                                        <input id="duration" type="number" class="form-control" name="duration" required>
                                    </div>

                                    @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                    @endif
                                </div>



                                <div class="form-group">
                                    <label for="amount" class="col-md-4 control-label">Amount</label>

                                    <div class="col-md-6">
                                        <input id="amount" type="number" class="form-control" name="amount" required>
                                    </div>
                                    
                                    @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                


                                <div class="form-group">
                                    <label for="rate_per_day" class="col-md-4 control-label">Rate/Day</label>

                                    <div class="col-md-6">
                                        <input id="rate_per_day" type="number" class="form-control" name="rate_per_day" required>
                                    </div>
                                    
                                    @if ($errors->has('rate_per_day'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rate_per_day') }}</strong>
                                    </span>
                                    @endif
                                    
                                </div>


                                <div class="form-group">
                                    <label for="rate_per_space" class="col-md-4 control-label">Rate/Space</label>

                                    <div class="col-md-6">
                                        <input id="rate_per_space" type="number" class="form-control" name="rate_per_space" required>
                                    </div>
                                    
                                    @if ($errors->has('rate_per_space'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rate_per_space') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label for="company_id" class="col-md-4 control-label">Company</label>

                                    <div class="col-md-6">
                                        {{-- <input id="company_id" type="text" class="form-control" name="company_id" required> --}}
                                        {!! Form::select('company_id', $company , null, ['placeholder' => 'Select a Company...', 'class'=>'form-control', 'name'=>'company_id'])!!}
                                    </div>

                                    
                                    @if ($errors->has('company_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="contract_type" class="col-md-4 control-label">Type</label>

                                    <div class="col-md-6">
                                        <input id="contract_type
                                        " type="text" class="form-control" name="contract_type" required>
                                    </div>
                                    
                                    @if ($errors->has('contract_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contract_type') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                

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
                                  $(document).on('click', '.editmodal', function() {
                                    
                                    $('#wm_id').val($(this).data('id'));
                                    $('#client_id').val($(this).data('client_id'));
                                    $('#sales_person_id').val($(this).data('sales_person_id'));
                                    $('#w_id').val($(this).data('w_id'));
                                    $('#no_of_shelves').val($(this).data('no_of_shelves'));
                                    $('#duration').val($(this).data('duration'));
                                    $('#amount').val($(this).data('amount'));
                                    $('#rate_per_day').val($(this).data('rate_per_day'));
                                    $('#rate_per_space').val($(this).data('rate_per_space'));
                                    $('#qrcode').val($(this).data('qrcode'));
                                    $('#company_id').val($(this).data('company_id'));
                                    $('#contract_type').val($(this).data('contract_type'));
                                });

                        //warehouse
						//update from warshouse 

                        $('.form-actions').on('click', '.edit', function() {
                            
                            console.log("hello")
                            console.log($('#wm_id').val());
                            $.ajax({
                                type: 'PUT',
                                url: 'management/' + $('#wm_id').val(),
                                data: {
                                   '_token': $('input[name=_token]').val(),
                                   'client_id' :$("#client_id").val(),
                                   'sales_person_id': $('#sales_person_id').val(),
                                   'w_id' : $('#w_id').val(),
                                   'no_of_shelves' : $('#no_of_shelves').val(),
                                   'duration' : $('#duration').val(),
                                   'amount' : $('#amount').val(),
                                   'rate_per_day' : $('#rate_per_day').val(),
                                   'rate_per_space' : $('#rate_per_space').val(),
                                   'qrcode' : $('#qrcode').val(),
                                   'company_id' : $('#company_id').val(),
                                   'contract_type' : $('#contract_type').val(),


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
                                                setTimeout(function(){// wait for 5 secs(2)
                                                             location.reload(); // then reload the page.(3)
                                                         }, 1000);
                                            }
                                        },
                                        error : function(error) {
                                            $('#EditModal').modal('hide');
                                            toastr.error('Errors Updating!', 'Errors Alert', {timeOut: 5000});
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
                                url: 'management/' + $('#deleteid').val(),
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