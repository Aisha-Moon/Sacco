@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Loan Types List</h1>
    </div>
    <section class="section">
        <div class="row">
          <div class="col-lg-12">
           @include('layouts._message')
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"> <a href="{{ url('admin/loan_types/add') }}" class="btn btn-primary">Add Loan Types</a></h5>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type Name</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($getRecord as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->type_name }}</td>
                            <td>{{ $value->description }}</td>
                            <td>{{ (date('d-m-Y',strtotime($value->created_at))) }}</td>
                            <td>{{ (date('d-m-Y',strtotime($value->updated_at))) }}</td>
                            <td>
                                <a href="{{ url('admin/loan_types/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ url('admin/loan_types/delete/'.$value->id) }}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
             </div>
         </div>
      </div>
    </div>
  </section>
@endsection
