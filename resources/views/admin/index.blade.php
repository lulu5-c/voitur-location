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
@if (session()->has('message'))

            <div class="w-25 h-25 p-1">
                <p class=" p-4 mb-4 border  text-sucess border-rounded">
                    {{session()->get('message')}}
            </p>

            </div>
@endif      
            
            <button class="m-5 rounded" ><a class="nav-link" href="/create">Creer une voiture</a></button>
            <button class="m-5 rounded" ><a class="nav-link" href="/pdf">Telecharger la page</a></button>

            <div class="mb-3 card container-fluid ">
                <div class="mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Liste de voitures</h5>
                        <p class ="card-text">Creer et visualiser des voiture qui s'afficherons sur le site.</p>
                    </div>
                    <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">Voiture</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Description</th>
                        <th scope="col">State</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Prix</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($voitures as $voiture)
                        <tr>
                            <td> <img src="images/{{ $voiture->image}}" alt="" class="rounded-circle logoVoiture"> </td>
                            <td>{{ $voiture->marque }}</td>
                            <td>@if(strlen($voiture->description)>50) 
                                    {{substr($voiture->description,0,50).'...' }}
                                @else
                                    {{ $voiture->description }}
                                @endif
                            </td>
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
                            <td>
                                <div class="d-flex justify-content-between">
                                    <form action="/edit" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$voiture->id }}">
                                        <button type="submit" class="btn btn-sm btn-warning">Edit</button> 
                                    </form>
                                    <form action="/show" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$voiture->id }}">
                                        <button type="submit" class="btn btn-sm btn-info">Show</button> 
                                    </form>
                                    <span class="float-right">
                                        <form action="/delete"
                                            method="POST">
                                            @csrf 
                                            <input type="hidden" name="id" value="{{$voiture->id }}">
                                            <button class="btn btn-sm btn-danger"
                                            type="submit">Delete</button>
                                        </form>
                                    </span >
                                    
                                </div>
                                
                            </td>
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
                        <th scope="col">Marque de la Voiture</th>
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
                                    
                                        @if(empty($user_voiture->restituer) || $user_voiture->restituer == 'Restituer')
                                            <button type="button" class="disabled text-success">{{$user_voiture->restituer}}</button> 
                                        @else
                                            <form action="/confirm-restitue">
                                            <input type="hidden" name="id" value="{{$user_voiture->voiture_id}}">
                                            <input type="hidden" name="restituer" value="Restituer">
                                            <button type="submit" id="bouton" value="En cours" > En cours ...</button>
                                            </form>

                                        
                                        @endif 
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
