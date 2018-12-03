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


							<a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-circle btn btn-transparent purple btn-outline  btn-sm active" >Allot Temporary Storage</a>
						</div>
					</div>
					<div class="portlet-body" id="items">
						<div class="table-scrollable">

							<table class="table table-hover table-light" id="myTable">
								<thead>
									<tr>

                                        <th>Name</th>
                                        
                                        {{-- <th>Location</th> --}}
                                        {{-- <th>Space</th> --}}
                                        {{-- <th>Shelves</th> --}}
                                        {{-- <th>Warehouse Head</th> --}}
                                        <th>Space Allot</th>
                                        <th>Shelvs Allot</th>
                                        {{-- <th>Rate</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                 @foreach($temp_storage as $key => $temp)
                                 <tr>

                                    <td>{{ $temp->warehouse->w_name ?? 'NULL' }}</td>
                                    
                                    {{-- <td>{{ $temp->location->location_city }}</td> --}}
                                    {{-- <td>{{ $temp->warehouse->warehouse_space }}</td> --}}
                                    {{-- <td>{{ $temp->warehouse->no_of_shelves }}</td> --}}
                                    {{-- <td>{{ $temp->warehouse->employee->name }}</td> --}}
                                    <td>{{ $temp->space_taken }}</td>
                                    <td>{{ $temp->shelves_taken }}</td>
                                    {{-- <td>{{ $temp->warehouse_rate }}</td> --}}
                                    <td>
                                       <a href="" class="btn btn-icon-only red delete-club-button"
                                    data-id="{{ $temp->id }}"
                                    data-w_id= "{{ $temp->warehouse->w_id }}"
                                    data-spaceDelete = "{{ $temp->space_taken }}"
                                    data-shelvesDelete = "{{ $temp->shelves_taken }}"
                                     title="Delete" data-toggle="modal" data-target="#deletemodal">
                                        <i class="fa fa-close"></i>
                                    </a>
                                    {{-- <a href="" class="btn btn-icon-only yellow editmodal"data-toggle="modal" data-target="#addmodel1" data-id="{{ $temp->id }}"
                                        data-w_id = "{{ $temp->warehouse->w_id }}"
                                        data-space_taken="{{ $temp->space_taken }}"
                                        data-shelves_taken="{{  $temp->shelves_taken }}"
                                        data-space="{{  $temp->warehouse->free_space }}"
                                        data-shelves="{{  $temp->warehouse->free_shelves }}">
                                        <i   class="fa fa-edit"></i>
                                    </a> --}}
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
                            <input type="hidden" id="war_id" name="">
                            <input type="hidden" id="spaceDelete" name="">
                            <input type="hidden" id="shelvesDelete" name="">
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
                            <i class="fa fa-bill"></i>Update Warehouse </div>
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
                                            <input type="hidden" class="form-control" name="id" id="id">
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="w_id" id="w_id">
                                        </div>
                                    </div>
            
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">
                                                    Warehouse Space
                                                </label>
                                                <div class="col-md-9">
                                                    <input id="no_of_space_update" type="number" class="form-control" name="no_of_space" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_of_shelves" class="col-md-3 control-label">
                                                    Warehouse Shelves
                                                </label>
                                                <div class="col-md-9">
                                                    <input id="no_of_shelves_update" type="number" class="form-control" name="no_of_shelves" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="row"> --}}
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">
                                                    Space Taken
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="number" class="form-control" name="space_taken" id="space_taken_update" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">
                                                        Shelves Taken
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="number" class="form-control" name="shelves_taken" id="shelves_taken_update">
                                                    </div>
                                                </div>
                                            </div>
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
                                <h4 class="modal-title">Allot Storage</h4>
                            </div>
                            <div class="modal-body" > 

                                <form class="form-horizontal" method="POST" action="{{ route('temp.store') }}" >


                                    {{ csrf_field() }}


                                    <div class="form-group{{$errors->has('location_id') ? ' has-error' : '' }}">
                                        <label for="location_id" class="col-md-4 control-label">Location</label>
                                        <div class="col-md-6">}
                                            <input type="text" id="locationWarehouse" class="form-control" value="Karach">
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
                                            <select class="form-control" id="warehouseByLocation" name="w_id">
                                                <option>Select a Warehouse</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('w_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('w_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>



                                    <div class="form-group{{ $errors->has('no_of_space') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Warehouse Space</label>

                                        <div class="col-md-6">
                                            <input id="no_of_space" type="text" class="form-control" name="no_of_space" disabled>

                                            @if ($errors->has('no_of_space'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_of_space') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="no_of_shelves" class="col-md-4 control-label">No Of Shelves</label>

                                        <div class="col-md-6">
                                            <input id="no_of_shelves" type="text" class="form-control" name="no_of_shelves" disabled>
                                        </div>

                                        @if ($errors->has('no_of_shelves'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_of_shelves') }}</strong>
                                        </span>
                                        @endif
                                    </div>




                                    {{-- space taken --}}
                                    <div class="form-group{{ $errors->has('space_taken') ? ' has-error' : '' }}">
                                        <label for="space_taken" class="col-md-4 control-label">space_taken</label>

                                        <div class="col-md-6">
                                            <input id="space_taken" type="number" class="form-control" name="space_taken" required>
                                        </div>

                                        @if ($errors->has('space_taken'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('space_taken') }}</strong>
                                        </span>
                                        @endif

                                    </div>

                                    {{-- shelve taken --}}
                                    <div class="form-group{{ $errors->has('shelves_taken') ? ' has-error' : '' }}">
                                        <label for="shelves_taken" class="col-md-4 control-label">shelves_taken</label>

                                        <div class="col-md-6">
                                            <input id="shelves_taken" type="number" class="form-control" name="shelves_taken" required>
                                        </div>

                                        @if ($errors->has('shelves_taken'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('shelves_taken') }}</strong>
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
                                    $('#w_id').val($(this).data('w_id'))
                                    $('#no_of_space_update').val($(this).data('space'));
                                    $('#no_of_shelves_update').val($(this).data('shelves'));
                                    $('#space_taken_update').val($(this).data('space_taken'));
                                    $('#shelves_taken_update').val($(this).data('shelves_taken'));
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
                                 'w_id': $('#w_id'),
                                 'shelves_taken' :$("#shelves_taken_update").val(),
                                 'space_taken': $('#space_taken_update').val(),
                                 'space': $('#no_of_space_update'),
                                 'shelves': $('#no_of_shelves_update')

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
                            $('#war_id').val($(this).data('w_id'));
                            $('#spaceDelete').val($(this).data('spaceDelete'));
                            $('#shelvesDelete').val($(this).data('shelvesDelete'));
                        });
                        $(document).on('click', '#showtoast', function() {
                            console.log($('#deleteid').val());
                            $.ajax({
                                type: 'DELETE',
                                url: 'temp/' + $('#deleteid').val(),
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'w_id': $('#war_id').val(),
                                    'space': $('#spaceDelete').val(),
                                    'shelves': $('#shelvesDelete').val(),
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

                        //Warehouse by city
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

                                    var html ='<option>Warehouse Loaded</option>';
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
                //get space

                jQuery('#warehouseByLocation').on('input propertychange select', function() {
                            //console.log($('#warehouseByLocation').val());;
                            console.log('Hello');
                            console.log($('#warehouseByLocation').val());
                            $.ajax({
                                type: 'POST',
                                url: '/warehouse/space',
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id' :$('#warehouseByLocation').val(),
                                },

                                success: function(response) {
                                        // $('#no_of_space').val(8);
                                        var data = JSON.parse(response,true);

                                        console.log(response);
                                        console.log(data[0],['free_space']);
                                        console.log(data.length);


                                        
                                        $('#no_of_space').val(data[0]['free_space']);
                                        
                                    },
                                    error : function(error) {
                                                // $('#no_of_space').val(7);
                                                $('#warehouseByLocation').val('b');
                                            }

                                        });

                        });


    // get shelves

    jQuery('#warehouseByLocation').on('change', function() {
                            //console.log($('#warehouseByLocation').val());;
                            console.log('Hello1');
                            console.log($('#warehouseByLocation').val());
                            $.ajax({
                                type: 'POST',
                                url: '/warehouse/shelve',
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id':$('#warehouseByLocation').val(),
                                },

                                success: function(response) {
                                        // $('#no_of_shelves').val(9);
                                        var data = JSON.parse(response,true);

                                        console.log(data[0],['no_of_shelves']);
                                        console.log(data.length);

                                        
                                        $('#no_of_shelves').val(data[0]['free_shelves']);
                                        
                                    },
                                    error : function(error) {
                                        $('#warehouseByLocation').val('b');
                                    }

                                });

                        });

    // if space is more than available
    jQuery('#space_taken').on('input propertychange paste', function() {
        console.log('demand');
        console.log($('#space_taken').val());
        console.log('avail');
        console.log($('#no_of_space').val());
        var demand = $('#space_taken').val();
        var avail  = $('#no_of_space').val();
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
    // if shelves is more than available
    jQuery('#shelves_taken').on('input propertychange paste', function() {
        console.log('demand');
        console.log($('#shelves_taken').val());
        console.log('avail');
        console.log($('#no_of_shelves').val());
        var demand = $('#shelves_taken').val();
        var avail  = $('#no_of_shelves').val();
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
 // if space is more than available update
    jQuery('#space_taken_update').on('input propertychange paste', function() {
        console.log('demand');
        console.log($('#space_taken_update').val());
        console.log('avail');
        console.log($('#no_of_space_update').val());
        var demand = $('#space_taken_update').val();
        var avail  = $('#no_of_space_update').val();
        if (+demand > +avail) 
        {
            console.log('if')
            $('#updateButton').hide();
        }
        else
        {
            $('#updateButton').show();
        }
    });
    // if shelves is more than available update
    jQuery('#shelves_taken_update').on('input propertychange paste', function() {
        console.log('demand');
        console.log($('#shelves_taken_update').val());
        console.log('avail');
        console.log($('#no_of_shelves_update').val());
        var demand = $('#shelves_taken_update').val();
        var avail  = $('#no_of_shelves_update').val();
        if (+demand > +avail) 
        {
            console.log('if')
            $('#updateButton').hide();
        }
        else
        {
            $('#updateButton').show();
        }
    });
</script>

@endsection