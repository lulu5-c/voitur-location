@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-10" style="width: 30rem;">
            <img src="images/{{$voiture->image}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$voiture->marque}}</h5>
                <p class="card-text">{{$voiture->description}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Porte: {{$voiture->porte}}</li>
                <li class="list-group-item">Energie: {{$voiture->energie}}</li>
                <li class="list-group-item">Boite: {{$voiture->boite}}</li>
                <li class="list-group-item ">Prix: {{$voiture->prix}} FCFA</li>
            </ul>
            <div class="card-body ">
            
                <form action="/valider" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $voiture->id }}">

                        <button type="submit" class="btn btn-primary card-link" >
                            Louer
                                                
                        </button>
                </form>
            </div>
        </div>
    </div>
</div>  
@endsection