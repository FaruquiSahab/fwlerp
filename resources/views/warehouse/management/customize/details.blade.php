@extends('layouts.dashboard')
@section('Title') Cutomize @endsection
@section('content')

        <div class="container" >
        	<div class="row">
            <div class="col-md-12" >
             <!-- BEGIN SAMPLE TABLE PORTLET-->
             <div class="portlet light " style="margin-left: 20px;">
              <div class="portlet-title" >
               <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase"><b>Customize Warehouse</b></span>
              </div>
              <div class="portlet-body" id="items">
                <div class="table-scrollable">

                     <table class="table table-hover table-light" id="myTable">
                      <thead>
                       <tr>
                        <th>Warehouse M</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>BarCode</th>
                        <th>Status</th>
                        <th>Person</th>
                        <th>Head</th>
                        <th>Vehicle Name</th>
                        <th>Distribution Customer</th>
                        <th>Action</th>
                       </tr>
                     </thead>
                     <tbody >
                       @foreach($customs as $key => $custom)
                       <tr>
                         <td>{{ $custom->warehouse->warehouse->w_name ?? 'NULL' }}</td>
                         <td>{{ $custom->product->name ?? 'NULL' }}</td>
                         <td>{{ $custom->p_quantity }}</td>
                         <td>
                          <img src="data:image/png;base64, {{ DNS1D::getBarcodePNG(strval($custom->qrcode),'C93' )}}" height="30" width="250" >
                         </td>
                         <td>{{ $custom->status }}</td>
                         <td>{{ $custom->person->personal_info_person_name ?? 'NULL' }}</td>
                         <td>{{ $custom->head->name }}</td>
                         <td>{{ $custom->vehicle->vehicle->vehicle_name ?? 'NULL' }}</td>
                         <td>{{ $custom->distribution->distribution->customer_name ?? 'NULL' }}</td>
                         <td>
                          @if($custom->action == 1)
                            <form method="POST" action="/customize_setaction" >
                              {{ csrf_field() }}
                              <input type="hidden" name="cwm_id" value="{{ $custom->cwm_id }}">
                              <button type="submit" class="btn btn-success btn-sm" name="action" value="{{ $custom->action}}">Accept</button>
                            </form>
                          @else
                            <span class="label label-sm label-info">Seen</span>
                          @endif
                         </td>
                       </tr>
                       @endforeach
                     </tbody>
                   </table>
             </div>
           </div>
         </div>
        </div>
        </div> 
        </div>
        </div>


@endsection


@section('script')

@endsection