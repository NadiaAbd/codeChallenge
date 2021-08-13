@extends('layouts.app')
 
@section('content')
    <div class="row" style="margin-top: 3rem;">
    <div class="col-lg-2"></div>
        <div class="col-lg-8 margin-tb">
            <div class="col-lg-4">
                <h2>Tickets List</h2>
            </div>
            <div class="col-lg-4">
                <a class="btn btn-success" href="{{ route('tickets.create') }}"> Create New Tickets</a>
            </div></div>
        </div>
        <div class="col-lg-2"></div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <div class="row">
   <div class="col-lg-2"></div>
   <div class="col-lg-8">
    <table class="table table-bordered">
        <tr>
            <th>ID Ticket</th>
            <th>Content</th>
            <th>Subject</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->content }}</td>
            <td>{{ $value->subject }}</td>
            <td>{{ \Str::limit($value->description, 100) }}</td>
            <td>
                <form action="{{ route('tickets.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('tickets.show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('tickets.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table> 
    </div>
    <div class="col-lg-2"></div>
    </div> 
    {!! $data->links() !!}      
@endsection
