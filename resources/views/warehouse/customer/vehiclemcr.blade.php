@extends('layouts.dashboard')
@section('Title') Order Delivery @endsection
@section('content')

<div class="container" >
    <div class="row">
        <div class="col-md-10">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet light pehlatable ">
                <div class="portlet-title" >
                    <div class="caption">
                        <i class="icon-settings font-red"></i>
                        <span class="caption-subject font-red sbold uppercase"><b>Line Haul Vehicle</b></span><br>
                    </div>
                    <br>
                    <div class="static">
                                <div class="form-group{{ $errors->has('mcr_no') ? ' has-error' : '' }}">
                                    <label for="mcr_no" class="col-md-2 control-label"><legend>MCR Number.</legend></label>
                                    <div class="col-md-2">
                                        <select class="form-control m" name="mcr_no">
                                            <option value="" selected="selected">Select a MCR</option>
                                            @foreach($mcrs as $value)
                                                <option value="{{ $value->mcr_id }}">{{ $value->mcr_no }}/{{ $value->vendor->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="mcr_no" class="form-control" name="mcr_no" required> --}}
                                        @if ($errors->has('mcr_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mcr_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('vehicle_no') ? ' has-error' : '' }}">
                                    <label for="vehicle_no" class="col-md-2 control-label"><legend>Vehicle No.</legend></label>
                                    <div class="col-md-2">
                                        <select class="form-control v" name="vehicle_no">
                                            <option selected="selected">Select a Vehicle</option>
                                            @foreach($vehicles as $value)
                                                <option value="{{ $value->vehicle_ID }}">{{ $value->vehicle_name }}/{{ $value->vehicle_type }}/{{ $value->vehicle_number }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="vehicle_no" class="form-control" name="vehicle_no" required> --}}
                                        @if ($errors->has('vehicle_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('vehicle_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <button class="btn btn-success" id="next">Next</button>
                            </div>
                    <div class="portlet-body hidden" id="items">
                      <div class="table-scrollable">
                            
                    <form method="POST" action="{{ route('submitassignvehicle') }}">
                        {{ csrf_field() }}
                         <table class="table table-hover table-light" id="myTable1">
                            <thead>
                                <tr>
                                    <th>DC Number</th>
                                    <th>C/N</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach($selected as $key => $order)
                                
                                <tr>
                                    <td data-id={{ $order->id }}>{{ $order->dcn }}</td>
                                    <td>
                                        <input type="text" class="form-control c" name="cn_no[]">
                                    <td>
                                        {{-- <form >
                                            {{ csrf_field() }}
                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                            <input type="hidden" name="unique" value="{{ $unique }}">
                                            <input type="hidden" name="mcr_no" value="">
                                            <input type="hidden" name="vehicle_no" value="">
                                            <input type="hidden" name="cn_no">
                                            <button class="btn btn-success submitButton">Submit</button>
                                        </form> --}}
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @foreach($selected as $order)
                        <input type="hidden" name="order_id[]" value="{{ $order->id }}">
                    @endforeach
                    <input type="hidden" name="unique" value="{{ $unique }}">
                    <input type="hidden" name="mcr_no" value="">
                    <input type="hidden" name="vehicle_no" value="">
                    <button class="btn btn-success">button</button>
                            </form>
                                </div>
                            </div>
                            {{-- <div id="formMain">
                                <form id="assign" method="POST" action="{{ route('checking') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="unique" value="{{ $unique }}">
                                    <input type="hidden" name="mcr" value="">
                                    <input type="hidden" name="vehicle_no" value="">
                                    <input type="hidden" name="cnt" value="" id="cnt">
                                    <button id="ass_vhcl" class="btn btn-lg hidden-print" >Assign Vehicle </button>
                                </form>
                                <strong>
                                    Yaha Se Kaam krna ha &#9989;<br>
                                    kis table ma data save hoga &#9989;<br>
                                    or ye input kese agay forward hngy <br>
                                </strong>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    @endsection


    @section('script')

        <script type="text/javascript">
            $( document ).ajaxComplete(function() {
                $("select option[value='']:selected").attr('disabled',true); });
            // $('select.m option:first').attr('disabled', true);
            // $('select.v option:first').attr('disabled', true);
            // $('select.c option:first').attr('disabled', true);
            // $('#items').slideUp();
            $('table').dataTable({searching:false, info:false});
          $('select[name$=mcr_no]').on('change click',function()
          {
            $('input[name$=mcr_no]').val($(this).val());
          });

          $('select[name$=vehicle_no]').on('change click',function()
          {
            $('input[name$=vehicle_no]').val($(this).val());
          });

          $('input[name$=cn_no]').on('change paste click',function()
          {
            $('input[name$=cn_no]').val($(this).val());
          });
          // 
          $('#next').on('click',function()
            {
                // $('.static').slideUp();
                // $('#items').slideDown();
                $('#items').removeClass('hidden');
      });


$('.submitButton').click(function()
{
        console.log('Clicked');
        // console.log($(this).data('id'));
        $.ajax({

            type: 'POST',
            url: '{{ route('submitassignvehicle') }}',
            data: 
            {
                '_token': $('input[name=_token]').val(),                
                'order_id1':$('input[name=order_id]').val(),
                'mcr_no1':$('input[name=mcr_no]').val(),
                'cn_no1':$('input[name=cn_no]').val(),
                'vehicle_no1':$('input[name=vehicle_no]').val(),
            },
            success : function(response) 
            {
                // console.log('Success');
                // $(this).closest('tr').addClass('hidden');
            },
            error : function(error)
            {
                
            }
        });
});

        </script>

    @endsection