<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

            <div class="mb-3 card container-fluid ">
                <div class="mb-3 card w-100">
                    <div class="card-body">
                        <h5 class="card-title">Liste de voitures</h5>
                        <p class ="card-text">Creer et visualiser des voiture qui s'afficherons sur le site.</p>
                    </div>
                    <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col" >Voiture</th>
                        <th scope="col"  >State</th>
                        <th scope="col" >Categorie</th>
                        <th scope="col" >Prix</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($voitures as $voiture)
                        <tr>
                            <td>{{ $voiture->marque }}</td>
                            
                            <td>
                                @if(count($user_voitures)==0 )
                                    Libre
                                @else
                                    @foreach ($user_voitures as $user_voiture )
                                        @if($user_voiture->voiture_id == $voiture->id && ($user_voiture->restituer == '' || $user_voiture->restituer == 'En cours' ) )
                                            Louer
                                        @elseif($user_voiture->voiture_id == $voiture->id &&  $user_voiture->restituer == 'Restituer' )
                                        Libre
                                       
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            <td>     
                            @foreach($categories as $categorie)
                                @if ($categorie->id == $voiture->categorie_id)
                                    {{ $categorie->name }}
                                @endif
                            @endforeach
                            </td>
                            <td> {{ $voiture->prix }} FCFA</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                   
                </div>
        </div>

<div>
  
<div class="mb-3 card container-fluid ">
                <div class="mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Liste des clients qui ont loués de voiture</h5>
                        <p class ="card-text"> Visualiser es clients qui ont loués de voiture et autoriser la restition des voitures louées </p>
                    </div>
                    @if(count($user_voitures)==0)
                    <h3 class="text-warning fs-2">Aucune location pour le moment ...</h3>
                    @else
                    <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">Client</th>
                        <th scope="col">Marque</th>
                        <th scope="col">louer</th>
                        <th scope="col">restituer</th>
                        <th scope="col">Date Louer</th>
                        <th scope="col">Date Rendu</th>
                       

                        </tr>
                    </thead>
                    <tbody>
                       
                        
                            @foreach($user_voitures as $user_voiture)
                            <tr>
                                <td>@foreach($users as $user)
                                        @if ($user->id == $user_voiture->voiture_id)
                                            {{ $user->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $user_voiture->voiture_marque }}</td>
                                <td>{{ $user_voiture->louer }}</td>
                                <td>
                                    
                                     <button type="button" class=" text-success">{{$user_voiture->restituer}}</button> 
                                        
                                </td>
                                <td>{{$user_voiture->dateLocation}}</td>
                                <td>{{$user_voiture->dateRendu}}</td>
                               
                            </tr>
                            @endforeach
                       
                    </tbody>
                    
                    </table>
                    @endif
                </div>
        

</div>
