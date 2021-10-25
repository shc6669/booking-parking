@extends('layouts.app')

@section('page-title', 'Orders')
@section('page-heading', 'Orders')

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        Orders
    </li>
@stop

@section('content')

@include('partials.messages')

<div class="card">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover" id="orders-table-wrapper">
                        <thead class="thead-dark">
                            <tr>
                                <th class="min-width-5"></th>
                                <th class="min-width-80">@lang('User')</th>
                                <th class="min-width-80">@lang('Restaurant')</th>
                                <th class="min-width-80">@lang('Total Payment')</th>
                                <th class="min-width-30">@lang('Status')</th>
                                <th class="min-width-10">@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
    <script type="text/javascript">
        DataTableElement = $('#orders-table-wrapper');
        TableColumns = [
            {data: "DT_RowIndex", orderable:false, filter: false, searchable: false},
            {data: "fullname", name:"fullname", orderable:false, filter: false},
            {data: "restaurant", name:"restaurant", orderable:false, filter: false},
            {data: "total_payment", name:"total_payment", orderable:false, filter: false},
            {data: "status", name:"status", orderable:false, filter: false},
            {data: "action", name: "action",orderable: false, searchable: false}
        ];
        
        var Datatable = {
            "init" : function(){
                dtcategory = {
                    /*destroy: true,*/
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route("get.data-orders") }}',
                    columns: TableColumns,
                    columnDefs: [{
                        targets: 0,
                        searchable: false,
                        className: 'dt-body-center'                        
                    }],
                    responsive:!0, lengthMenu:[[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],pageLength:15,
                }; DataTableElement.DataTable(dtcategory);
            }
        };
        
        $(document).ready(function(){
            // ...
            Datatable.init();
        });
    </script>
@stop