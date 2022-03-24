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

<h2 class="m-5">Information sur la voiture</h2>
<div class="container d-felx d-flex justify-content-between">

  <div>
    <img src="images/{{ $voiture->image}}" alt=""  width="400" > 
  </div>
  <div class="border w-50 bg-info  font-weight-bold col-sm-6">
      <h2 class=""> Marque:</h2> <span class="text-light fs-4">{{ $voiture->marque }}</span> 
      <h2 class=""> Porte:</h2> <span class="text-light fs-4">{{ $voiture->porte }}</span> 
      <h2 class=""> Energie:</h2> <span class="text-light fs-4">{{ $voiture->energie }}</span> 
      <h2 class=""> Boite:</h2> <span class="text-light fs-4">{{ $voiture->boite }}</span> 

      <h2 class=""> Description:</h2> <p class="text-light fs-4">{{ $voiture->description }}</p>
      <h2 class=""> Categorie </h2><span class="text-light fs-4">@foreach($categories as $categorie)
                                @if ($categorie->id == $voiture->categorie_id)
                                    <td>{{ $categorie->name }}</td>
                                @endif
                            @endforeach</span>
      
    
  </div>
  <diV></diV>
</div>