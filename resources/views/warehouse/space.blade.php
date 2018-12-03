@extends('layouts.dashboard')
@section('Title') Space Utilization @endsection
@section('content')

<div class="container" >
	<div class="row">
    <div class="col-md-12" >
     <!-- BEGIN SAMPLE TABLE PORTLET-->
     <div class="portlet light " style="margin-left: 20px;">
      <div class="portlet-title" >
       <div class="caption">
        <i class="icon-settings font-red"></i>
        <span class="caption-subject font-red sbold uppercase"><b>Space Utilization</b></span>
      </div>
      <div class="portlet-body" id="items">
        <div class="table-scrollable">

         <table class="table table-hover table-light" id="myTable">
          <thead>
            <tr>
              <th>Warehouse</th>
              <th>Total Space</th>
              <th>Free Space</th>
              <th>Last Updated</th>
            </tr>
          </thead>
          <tbody >
           @foreach($warehouse as $info)
            <tr>
              
              <td>{{ $info->w_name }}</td>
              <td>{{ $info->warehouse_space }}</td>
              <td>{{ $info->free_space }}</td>
              <td>{{ $info->updated_at->diffForHumans() }}</td>

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