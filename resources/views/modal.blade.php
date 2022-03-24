@extends('layouts.app')

@section('content')
@if (session()->has('message'))

            <div class="w-25 h-25 p-1">
                <p class=" p-4 mb-4 border  text-sucess border-rounded">
                    {{session()->get('message')}}
            </p>

            </div>
@endif    
            <div class="row justify-content-center">
                    <div class=" col-md-6   border shadow p-3 mb-5 bg-body rounded ">
                    
                    <form action="/modal" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id }}">
                            <input type="hidden" name="voiture_id" value="{{$voiture->id }}" required>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nom:</label>
                                <h5 class=" text-primary form-control"> @foreach($categories as $categorie )
                                                            
                                                            @if ( $categorie->id == $voiture->categorie_id  )
                                                                {{ $categorie->name}}
                                                            @endif 
                                                            @endforeach</h5>
                            </div>
                            <div class="form-group d-none">
                                <label for="recipient-name" class="col-form-label">Marque:</label>
                                <input readonly  type="text" class="form-control " name="marque" id="recipient-name" value=" {{$voiture->marque}}">
                            </div>
                       
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Date Location:</label>
                            <input type="datetime-local" class="form-control" name="dateLocation" id="recipient-name" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input type="number" class="form-control" name="nombre" min="1" max="10" id="recipient-name" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Date du Restitution:</label>
                            <input type="datetime-local" class="form-control" name="dateRendu" id="recipient-name" required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                            <label class="form-check-label" for="flexCheckDefault">
                            J'accepte etre responsable de tout desagrement que la voiture aurait subi une fois entre mes mains et je m'engage a payer tout les frais de reparation
                            </label>
                        </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked required>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Je m'engage a rendre la voiture au temps convenus.
                                </label>
                           </div>  
                           <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked required>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Je suis consciente que le prix de location peut augmenter en fonction du jour.
                                </label>
                           </div>
                           <div class="form-group">
                                <kkiapay-widget amount="{{$voiture->prix}} " 
                                            key="4ff05ec08b4511eca5d0656c2d7c0a43"
                                            url="'images/logo.png'"
                                            position="center"
                                            sandbox="true"
                                            data="Payer Maintenant"
                                            callback="/modal">
                                    </kkiapay-widget>
                                    <h6 class="text-secondary">Apres une location de voiture, si le paiement n'est pas effectuer dans les 24h la voiture peut etre attribuer a une autre personne</h6>
                           </div> 
                           

                        <div class="form-group row">
                            <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Louer</button>
                            </div>
                        </div>
                    </form>
                    </div>
                    
                    </div>
                        
                        
@endsection                                     