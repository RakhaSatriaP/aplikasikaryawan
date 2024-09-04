@extends('layouts.app')
@section('content')

<h1>Summary</h1>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered" id="table-summary">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Attendance Date</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Evidance</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    let table = $('#table-summary').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 25,
        fixedHeader: true,
        responsive: true,
        ajax: "{{ route('attendance.list') }}",
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'attendance_date',
                name: 'attendance_date'
            },
            {
                data: 'attendance_status',
                name: 'attendance_status'
            },
            {
                data: 'type',
                name: 'type',
                className: 'text-center'
            },
            {
                data: 'evidance',
                name: 'evidance',
                orderable: false,
                searchable: false,
                className: 'text-center'
            }
        ]
    });
    table.buttons().container().appendTo('#table-employee_wrapper .col-md-6:eq(0)');
</script>
@endsection