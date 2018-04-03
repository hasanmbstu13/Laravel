<div class="table_new">
  <h4 class="m-b-50 ">Search Results</h4>
</div>
@if(count($all_records) > 0)
   <table id="datatable-responsive"
      class="table table-striped table-bordered dt-responsive nowrap m-t-50" cellspacing="0"
      width="100%">
      <thead>
         <tr>
            <td class="my_checkbox">
               <div class="checkbox checkbox-primary "><input checked="" type="checkbox"><label></label></div>
            </td>
            <th>Allocation Date</th>
            <th>Lead ID </th>
            <th>Location</th>
            <th>Display Location</th>
            <th>Leads Source </th>
            <th>Business Type</th>
            <th>Industry Type </th>
            <th>Price Range </th>
            <th>Placement</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($all_records as $record)
         <tr>
            <td>
               <div class="checkbox checkbox-primary "><input type="checkbox"><label></label></div>
            </td>
            <td>{{ date('Y/m/d', strtotime($record->date))}}</td>
            <td>1</td>
            <td>{{ $record->country }}</td>
            <td>Australia</td>
            <td>Warm</td>
            <td>Retail</td>
            <td>Category1</td>
            <td>0 - 100</td>
            <td>test</td>
         </tr>
        @endforeach
      </tbody>
   </table>
@endif