@extends('layouts.dashboard')
@section('Title') Time Utilization @endsection
@section('content')

<div class="container" >
	<div class="row">
    <div class="col-md-12" >
     <!-- BEGIN SAMPLE TABLE PORTLET-->
     <div class="portlet light " style="margin-left: 20px;">
      <div class="portlet-title" >
       <div class="caption">
        <i class="icon-settings font-red"></i>
        <span class="caption-subject font-red sbold uppercase"><b>Time Utilization</b></span>
      </div>
      <div class="portlet-body" id="items">
        <div class="table-scrollable">

         <table class="table table-hover table-light" id="myTable">
          <thead>
            <tr>
              <th>Warehouse</th>
              <th>Product</th>
              <th>Status</th>
              <th>Distribution</th>
              <th>Time In</th>
              <th>Time Accept</th>
              <th>Time Delivered</th>
            </tr>
          </thead>
          <tbody >
           @foreach($warehouse as $info)
            <tr>
              
              <td>{{ $info->warehouse->warehouse->w_name ?? 'NULL' }}</td>
              <td>{{ $info->product->name ?? 'NULL' }}</td>
              <td>{{ $info->status }}</td>
              <td>{{ $info->dm_id }}</td>
              <td>{{ $info->updated_at->diffForHumans() }}</td>
              <td>{{ \Carbon\Carbon::parse($info->distribution->distribution->accept_status_time)->diffForHumans() }}</td>
              <td>{{ \Carbon\Carbon::parse($info->distribution->distribution->delivered_status_time)->diffForHumans() }}</td>
              

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