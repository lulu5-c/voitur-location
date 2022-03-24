
@extends('layouts.app')

@section('content')

@if(count($user_voitures) == 0)
<h5 class="text-warning m-3">Vous n'avez encore rien louer pour pouvoir restituer.</h5>
@else

<table class="table caption-top">
  <caption>{{$i=1;}} Liste de location</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Voiture</th>
      <th scope="col">Louer</th>
      <th scope="col">Nombre</th>
      <th scope="col">Restituer</th>
    </tr>
  </thead>
  <tbody>
      
   
    
        @foreach($user_voitures as $user_voiture)
        <tr>
        <th scope="row">{{$i}}</th>
        <td>
        @foreach($voitures as $voiture)
          @if($voiture->id == $user_voiture->voiture_id)
            @foreach($categories as $categorie )
                                                                        
                                                                       @if ( $categorie->id == $voiture->categorie_id  )
                                                                            {{ $categorie->name}}
                                                                        @endif 
                                                                        @endforeach</td> <h6 class="d-none">{{$i++;}}</h6>
                                                                        @endif
                                                                        @endforeach
        
         <td>{{$user_voiture->louer}}</td>
         <td>{{$user_voiture->nombre}}</td> 
        <td>
            
            @if(!empty($user_voiture->restituer))
                <button type="button" class="disabled">{{$user_voiture->restituer}}</button> 
            @else
            <form action="/restitue">
            <input type="hidden" name="id" value="{{$user_voiture->id}}">
            <input type="hidden" name="restituer" value="En cours">
            <button type="submit" id="bouton"  value="Non" > Non</button>
            <h6 class="text-danger">cliquez sur le bouton pour restituer</h6>
            </form>
            
            @endif </td>
        </tr>
        @endforeach
   
  </tbody>
</table>
@endif
@endsection
