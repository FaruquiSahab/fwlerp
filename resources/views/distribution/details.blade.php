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
            <span class="caption-subject font-red sbold uppercase"><b>Distribution</b></span>
          </div>
          <div class="portlet-body" id="items">
            <div class="table-scrollable">

              <table class="table table-hover table-light" id="myTable">
                <thead>
                  <tr>
                                        <th>Customer Name</th>
                                        <th>Reciever Name</th>
                                        <th>Item</th>
                                        <th>Packing</th>
                                        <th>Station</th>
                                        <th>Vehicle</th>
                                        <th>CN</th>
                                        <th>Charges</th>
                                        <th>Agent</th>
                                        <th>Status</th>
                                        <th>Re Routed</th>
                                    </tr>
                                </thead>
                                <tbody >
                                 @foreach($distributions as $key => $distribution)
                                 <tr>
                                    <td>{{ $distribution->customer_name ?? 'NULL' }}</td>
                                    <td>{{ $distribution->reciever_name ?? 'NULL' }}</td>
                                    <td>{{ $distribution->item ?? 'NULL' }}</td>
                                    <td>{{ $distribution->packing ?? 'NULL' }}</td>
                                    <td>{{ $distribution->station ?? 'NULL' }}</td>
                                    <td>{{ $distribution->vehicle_type ?? 'NULL' }}</td>
                                    <td>{{ $distribution->cn ?? 'NULL' }}</td>
                                    <td>{{ $distribution->charges ?? 'NULL' }}</td>
                                    <td>{{ $distribution->agent_name ?? 'NULL' }}</td>
                                    <td>
                                <span class="label label-sm label-success">{{ trim($distribution->status,"?!") }}</span>
                                    </td>
                                    <td>
                                        @if($distribution->re_routed == 1)
                                        <span class="label label-sm label-warning">Re Routed</span>
                                        @else
                                        <span class="label label-sm label-info">Not Re Routed</span>
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