@extends('layouts.dashboard')
@section('Title') Barcodes @endsection
@section('content')

<div class="container" >
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title" >
                    <div class="caption">
                        <i class="icon-settings font-red"></i>
                        <span class="caption-subject font-red sbold uppercase"><b>Barcodes</b></span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">


                            <a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-circle btn btn-transparent purple btn-outline  btn-sm active" >Add Barcode(s)</a>
                        </div>
                    </div>
                    <div class="portlet-body" id="items">
                        <div class="table-scrollable">

                            <table class="table table-hover table-light" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>BarCode</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                 @foreach($barcodes as $key => $barcode)
                                 <tr>
                                    <td>{{ $barcode->barcode_status }}</td>
                                    <td>
                                    <img src="../storage/barcode{{ $barcode->id }}.png" alt="Bar Code" height="35" width="190" class="myPrint" }}">
                                    </td>
                                    <td>
                                     <a href="" class="btn btn-icon-only red delete-club-button"data-id="{{ $barcode->id }}" title="Delete" data-toggle="modal" data-target="#deletemodal">
                                        <i class="fa fa-close"></i>
                                    </a>
                                    <a href="" class="btn btn-icon-only yellow editmodal"data-toggle="modal" data-target="#addmodel1" data-id="{{ $barcode->id }}"
                                        data-barcode_status="{{ $barcode->barcode_status }}">
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
                            <i class="fa fa-bill"></i>Update Status </div>
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

                                    <div class="form-group">

                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control" name="id" id="id">
                                        </div>
                                    </div>

                                    <div class="form-group{{$errors->has('barcode_status') ? ' has-error' : '' }}">
                                        <label for="barcode_status" class="col-md-4 control-label">Status</label>

                                        <div class="col-md-6">
                                            <select class="form-control" id="barcode_status">
                                                <option name="barcode_status">Free</option>
                                                <option name="barcode_status">Used</option>
                                            </select>
                                            @if ($errors->has('barcode_status'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('barcode_status') }}</strong>
                                            </span>
                                            @endif
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
                        <h4 class="modal-title">Products</h4>
                    </div>
                    <div class="modal-body" > 

                        <form class="form-horizontal" method="POST" action="{{ route('barcode.store') }}" >

                            {{ csrf_field() }}



                            <div class="form-group">
                                <label for="number" class="col-md-4 control-label">Number</label>

                                <div class="col-md-6" >
                                    {{ Form::selectRange('number', 10, 20, null, ['placeholder' => 'Number of Barcodes', 'name'=>'number', 'class'=>'form-control']) }}
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-2 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Generate
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
                                    $('#barcode_status').val($(this).data('bar_status'));
                                });

                        //warehouse
                        //update from warshouse 

                        $('.form-actions').on('click', '.edit', function() {

                            console.log("hello")
                            console.log($('#id').val());
                            $.ajax({
                                type: 'PUT',
                                url: 'barcode/' + $('#id').val(),
                                data: {
                                   '_token': $('input[name=_token]').val(),
                                   'barcode_status' : $('#barcode_status').val(),
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
                                url: 'barcode/' + $('#deleteid').val(),
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