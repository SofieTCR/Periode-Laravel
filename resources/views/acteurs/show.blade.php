@extends('acteurs.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Acteur</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('acteurs.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Voornaam:</strong>
                {{ $acteur->Voornaam }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Achternaam:</strong>
                {{ $acteur->Achternaam }}
            </div>
        </div>
    </div>
@endsection
