@extends('acteurs.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('acteurs.create') }}"> Create New Acteur</a>
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
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($acteurs as $acteur)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $acteur->Voornaam }}</td>
            <td>{{ $acteur->Achternaam }}</td>
            <td>
                <form action="{{ route('acteurs.destroy',$acteur->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('acteurs.show',$acteur->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('acteurs.edit',$acteur->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $acteurs->links() !!}
      
@endsection
