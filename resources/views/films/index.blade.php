@extends('films.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('films.create') }}"> Create New Film</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Jaar</th>
            <th>Genre</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($films as $film)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $film->Title }}</td>
            <td>{{ $film->Jaar }}</td>
            <td>{{ $film->Genre }}</td>
            <td>
                <form action="{{ route('films.destroy',$film->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('films.show',$film->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('films.edit',$film->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $films->links() !!}
      
@endsection
