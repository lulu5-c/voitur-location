@extends('layouts.app')

@section('content')
@if (session()->has('message'))

            <div class="w-25 h-25 p-1">
                <p class=" p-4 mb-4 border  text-warning border-rounded">
                    {{session()->get('message')}}
            </p>

            </div>
@endif
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <div class="navbar-brand">
    <form action="/cate" method="post">
                            @csrf
                            <label class="sr-only mr-sm-2 fs-3" for="">Categorie</label>
                            <div>
                                <select class="custom-select mr-sm-2 w-100" name="categorie_id" required  >
                                <option selected>Categories...</option>
                                @foreach ($categories as $categorie)
                                <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-sm btn-success">Voir</button> 
                            </div>
                                    </form>
        </div>
    <form action="/search" method="post" class="d-flex">
    @csrf
      <input class="form-control me-2" type="search" placeholder="Description" name="search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>

@if (session()->has('message'))

            <div class="w-25 h-25 p-1">
                <p class=" p-4 mb-4 border  text-sucess border-rounded">
                    {{session()->get('message')}}
            </p>

            </div>
@endif
@if(empty($voitures))
<h5 class="text-warning m-3">Aucune voiture ne correspond.</h5>
@else
<div class="container  mt-5">
<div class="row">
        @foreach($voitures as $voiture )
            <div class="card m-3" style="width: 18rem;">
                <img src="images/{{$voiture->image}}" class="card-img-top"  alt="...">
                <div class="card-body">

                    <h5 class="card-title text-primary"> @foreach($categories as $categorie )
                                        
                                        @if ( $categorie->id == $voiture->categorie_id  )
                                            {{ $categorie->name}}
                                        @endif 
                                        @endforeach</h5>
                    <p class="card-text">{{$voiture->description}}</p>
                    <h3 class="text-primary ">{{$voiture->prix}} FCFA </h3>
                   
                        <form action="/voiture" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $voiture->id }}">

                                <button type="submit" class="btn btn-primary" >
                                    Louer
                                    
                                </button>
                        </form>
                        
                        
                </div>
                                    
             </div>
             @endforeach
     </div>
 </div>
@endif

@endsection