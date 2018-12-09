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
                        <span class="caption-subject font-red sbold uppercase"><b>Assign Vehicle</b></span>
                    </div>

                    <div class="portlet-body" id="items">
                      <div class="table-scrollable">

                         <table class="table table-hover table-light" id="myTable1">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>DC Number</th>
                                    <th>Customer</th>
                                    <th>Stock Location</th>
                                    <th>Packing</th>
                                    <th>Quantity</th>
                                    <th>Delivered Point</th>
                                    <th>Nature</th>
                                    {{-- <th>Option</th> --}}
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody >
                                @foreach($ordersoff as $key => $order)
                               <tr data-id="{{ $order->id }}">
                                    <td class="check">
                                        <form>
                                            {{ csrf_field() }}                                            
                                            <input type="checkbox" name="" class="form-control" data-id="{{ $order->id }}">
                                        </form>
                                    </td>
                                    <td>
                                        <a class="label label-sm label-success showDmodalintra" style="font-size: 18px" data-toggle="modal"    data-target="#showDmodal" 
                                        data-dcnintra = "{{ $order->dcn }}"
                                        data-grnintra = "{{ $order->grn }}"
                                        data-warehouseintra = "{{ $order->w_name ?? 'NULL' }}"
                                        data-productintra= "{{ $order->p_name ?? 'NULL' }}"
                                        data-quantityintra = "{{ $order->o_quantity  }}"
                                        data-orderintra = "{{ $order->o_order_type }}"
                                        data-consigneeintra = "{{ $order->cn_name ?? 'NULL' }}"
                                        data-addressintra = "{{ $order->cn_address ?? 'NULL' }}"
                                        data-personintra = "{{ $order->cn_pic ?? 'NULL' }}"
                                        data-contactintra = "{{ $order->cn_contact ?? 'NULL' }}"> {{ $order->dcn }}
                                            </a>
                                        </td>
                                    <td>
                                        <span class="label label-sm" style="font-size: 16px">
                                            <a class="nocursor">{{ $order->c_name }}</a>
                                        </span>
                                    </td>
                                    <td class="uppercase">{{ $order->w_location  }}</td>
                                    <td>{{ $order->p_packing }}</td>
                                    <td>{{ $order->o_quantity }}</td>
                                    <td class="uppercase">{{ $order->cn_location }}</td>
                                    <td>{{ $order->o_order_type }}</td>
                                    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                                </div>
                            </div>
                            <div>
                                <form id="assign" method="POST" action="{{ route('vehiclemcr') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="unique" value="{{ $unique }}">
                                    <button id="ass_vhcl" class="btn btn-lg hidden-print" >Assign Vehicle </button>
                                </form>
                            </div>


                            {{--  --}}

            {{--  --}}

            {{--  --}}

            {{--  --}}

            {{--  --}}
            
           {{-- Show Data Modal  --}}
            
            <div id="showDmodal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title"><strong><u>Details Intra-City</u></strong></h3>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" style="padding: 20px;">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Delivery Order</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="dcnintra" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Against GRN</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="grnintra" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Product</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="productintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Warehouse</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="warehouseintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Quantity</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="quantityintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Remarks</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="remarksintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Status</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="statusintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Order Type</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="orderintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Consignee Name</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="consigneeintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Address</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="addressintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong></strong></label>
                                        <div class="col-md-9">
                                            <input type="hidden" id="addressintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Person In Charge</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="personintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3"><strong>Contact</strong></label>
                                        <div class="col-md-9">
                                            <input type="text" id="contactintra" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                                {{-- <input type="button" class="btn btn-primary" value="Cancel" data-dismiss="modal"> --}}
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Show Data Modal Ends --}}

            {{--  --}}

            {{--  --}}

            {{--  --}}

            {{--  --}}

            {{--  --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    @endsection


    @section('script')

    <script type="text/javascript">
        
        // adding hidden input on check
        
        $(document).ready(function(){
            $('input[type="checkbox"]').click(function(){
                if($(this).prop("checked") == true)
                {
                    console.log('checked');
                    console.log($(this).data('id'));
                    $.ajax({
                            
                                type: 'POST',
                                url: '{{ route('head.check') }}',
                                data: 
                                {
                                    '_token': $('input[name=_token]').val(),
                                    'fake_unique' :{{ $unique }},
                                    'order_id':$(this).data('id')
                                },
                                success: function(response) 
                                {
                                    console.log(response);
                                },
                                error : function(error)
                                {
                                }
                            });
                }
                else if($(this).prop("checked") == false)
                {
                    console.log('unchecked');
                    $.ajax({
                            
                                url: '{{ route('head.uncheck') }}',
                                type: 'POST',
                                data: 
                                {
                                    '_token': $('input[name=_token]').val(),
                                    'fake_unique' :{{ $unique }},
                                    'order_id':$(this).data('id')
                                },
                                success: function(response) 
                                {
                                    console.log('Success');
                                    console.log(response);
                                },
                                error : function(error)
                                {
                                    console.log('Error');
                                }
                            });
                }
            });
        });
        //         
        var n = $( "input:checked" ).length;
        if (+n > 0 ) 
        {
            $('#ass_vhcl').slideDown();
        }
        else {
            $('#ass_vhcl').slideUp();
        }
        var countChecked = function()
        {
          var n = $( "input:checked" ).length;
        if (+n > 0 ) 
        {
            $('#ass_vhcl').slideDown();
        }
        else {
            $('#ass_vhcl').slideUp();
        }
          console.log( n + (n === 1 ? " is" : " are") + " checked!" );
        };
        countChecked();
        $( "input[type=checkbox]" ).on( "click", countChecked );

            //set values for show inventory form
        $(document).on('click', '.showDmodalintra', function()
        {
            console.log('Hello Inventory');
            $('#grnintra').val($(this).data('grnintra'));
            $('#warehouseintra').val($(this).data('warehouseintra'));
            $('#dcnintra').val($(this).data('dcnintra'));
            $('#productintra').val($(this).data('productintra'));
            $('#quantityintra').val($(this).data('quantityintra'));
            $('#remarksintra').val($(this).data('remarksintra'));
            $('#statusintra').val($(this).data('statusintra'));
            $('#orderintra').val($(this).data('orderintra'));
            $('#consigneeintra').val($(this).data('consigneeintra'));
            $('#personintra').val($(this).data('personintra'));
            $('#addressintra').val($(this).data('addressintra'));
            $('#contactintra').val($(this).data('contactintra'));
        });
    </script>

    @endsection