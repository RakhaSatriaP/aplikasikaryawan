@extends('layouts.app')
@section('content')
<h1>Employee</h1>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('superadmin.employee.create') }}" class="btn rounded-pill btn-primary waves-effect waves-light" type=" button">
                        Tambah Pegawai
                    </a>
                </div>
                <table class="table table-bordered" id="table-employee">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Department</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Address</th>
                            <th>Bank</th>
                            <th>Bank Number</th>
                            <th>Salary(Rp)</th>
                            <th>Status</th>
                            <th>Action</th>
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
    let table = $('#table-employee').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 25,
        fixedHeader: true,
        responsive: true,
        ajax: "{{ route('superadmin.employee.list') }}",
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
                data: 'email',
                name: 'email'
            },
            {
                data: 'phone',
                name: 'phone'
            },
            {
                data: 'department',
                name: 'department'
            },
            {
                data: 'start_date',
                name: 'start_date'
            },
            {
                data: 'end_date',
                name: 'end_date'
            },
            {
                data: 'address',
                name: 'address'
            },
            {
                data: 'bank',
                name: 'bank'
            },
            {
                data: 'bank_number',
                name: 'bank_number'
            },
            {
                data: 'Salary',
                name: 'Salary'
            },
            {
                data: 'status',
                name: 'status',
                
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                
            }
        ]
    });
    table.buttons().container().appendTo('#table-employee_wrapper .col-md-6:eq(0)');
</script>
@endsection