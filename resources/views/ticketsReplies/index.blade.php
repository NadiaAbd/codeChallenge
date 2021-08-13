@extends('layouts.app')
 
@section('content')
    <div class="row" style="margin-top: 3rem;">
    <div class="col-lg-2"></div>
        <div class="col-lg-8 margin-tb">
            <div class="col-lg-4">
                <h2>Tickets Replies List</h2>
            </div>
            <div class="col-lg-4">
                <a class="btn btn-success" href="{{ route('ticketsReplies.create') }}"> Create New Replies</a>
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
            <th>No Ticket</th>
            <th>Content</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->content }}</td>
            <td>
                <form action="{{ route('ticketsReplies.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('ticketsReplies.show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('ticketsReplies.edit',$value->id) }}">Edit</a>   
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
