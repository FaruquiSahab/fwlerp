@extends('layouts.dashboard')
@section('Title') Distributor @endsection
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
                       </tr>
                     </thead>
                     <tbody >
                       @foreach($customs as $key => $custom)
                       <tr>
                         <td>{{ $custom->warehouse->warehouse->w_name }}</td>
                         <td>{{ $custom->product->name }}</td>
                         <td>{{ $custom->p_quantity }}</td>
                         <td>
                           <img src="data:image/png;base64, {{ DNS1D::getBarcodePNG(strval($custom->qrcode),'C93' )}}" height="30" width="250" >
                         </td>
                         <td>{{ $custom->status }}</td>
                         <td>{{ $custom->person->personal_info_person_name ?? 'NULL' }}</td>
                         <td>{{ $custom->head->name ?? 'NULL' }}</td>
                         <td>{{ $custom->vehicle->vehicle->vehicle_name ?? 'NULL' }}</td>
                         <td>{{ $custom->distribution->distribution->customer_name ?? 'NULL' }}</td>
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