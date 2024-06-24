

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Customer Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('customers.create') }}"> Create New Customer</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('customers.index') }}" method="GET">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by Name" value="{{ request()->input('search') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Status</th>
                <th>Company</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $key => $customer)
            <tr>
<td>{{ $key + 1 }}</td>
<td>{{$customer->name}}</td>
<td>{{$customer->address}}</td>
<td>{{$customer->phone}}</td>
<td>{{$customer->email}}</td>
<td>{{$customer->status == 1 ? 'Enabled' : 'Disabled'}} </td>
<td>{{$customer->company}}</td>
<td>
   <a  href="{{route('customers.edit',$customer->id)}}" class="btn btn-warning">edit</a>
   <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?');" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
 
</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $customers->links() !!}
</div>
@endsection

