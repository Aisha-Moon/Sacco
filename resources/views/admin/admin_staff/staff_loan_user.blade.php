@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Loan User List</h1>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('layouts._message')
            <div class="card">
                <div class="card-body">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Loan Types</th>
                                <th>Loan Plan</th>
                                <th>Loan Amount</th>
                                <th>Purpose</th>
                                <th>Created Date</th>
                                <th>Updated Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getRecord as $value)
                            <tr>
                                <th scope="row">{{$value->id}}</th>
                                <td>{{$value->name}} {{$value->last_name}} {{$value->surname}}</td>
                                <td>{{$value->type_name}}</td>
                                <td>{{$value->months}}</td>
                                <td>{{$value->loan_amount}}</td>
                                <td>{{$value->purpose}}</td>
                                <td>{{ (date('d-m-Y',strtotime($value->created_at))) }}</td>
                                <td>{{ (date('d-m-Y',strtotime($value->updated_at))) }}</td>
    
                                <td>
                                    <a href="{{ url('staff/loan_user/delete/'.$value->id) }}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
     
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
