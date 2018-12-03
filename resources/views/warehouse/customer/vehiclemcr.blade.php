@extends('layouts.dashboard')
@section('Title') Order Delivery @endsection
@section('content')
<div class="container" >
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet light pehlatable ">
                <div class="portlet-title" >
                    <div class="caption">
                        <i class="icon-settings font-red"></i>
                        <span class="caption-subject font-red sbold uppercase"><b>Assign Vehicle</b></span>
                    </div>

                    <div class="portlet-body" id="items">
                      <div class="table-scrollable">

                         <table class="table table-hover table-light" id="myTable1">
                            <thead>
                                <tr>
                                    <th>DC Number</th>
                                    <th>C/N</th>
                                    <th>Vehicle No.</th>
                                    <th>MCR</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach($selected as $key => $order)
                                <tr>
                                    <td data-id={{ $order->id }}>{{ $order->dcn }}</td>
                                    <td><input type="text" name="cn" class="form-control"></td>
                                    <td><input type="text" name="vehicle_no" class="form-control"></td>
                                    <td><input type="text" name="mcr" class="form-control"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                                </div>
                            </div>
                            <div>
                                <strong>
                                    Yaha Se Kaam krna ha <br>
                                    kis table ma data save hoga <br>
                                    or ye input kese agay forward hngy <br>
                                </strong>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    @endsection


    @section('script')

    <script type="text/javascript">
      $('input[name$=mcr]').on('keyup',function()
      {
        $('input[name$=mcr]').val($(this).val());
      });
      $('input[name$=vehicle_no]').on('keyup',function()
      {
        $('input[name$=vehicle_no]').val($(this).val());
      });
      $('input[name$=cn]').on('keyup',function()
      {
        $('input[name$=cn]').val($(this).val());
      });
    </script>

    @endsection