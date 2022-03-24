@extends('layouts.app')

@section('content')
<div id="carouselExampleDark" class="carousel carousel-dark slide h-25" data-bs-ride="carousel">
  
<div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <div class="carousel-inner">
    <div class="mt-5 color-media position-absolute Roboto my-title">
       <span class="color-shams my-title">Shams</span>  MOTO 
       <h4 class="text-uppercase subtitle text-light">LOCATION DE VOITURE</h6>
    </div>
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="images/v4.jpg" style="height:450px;" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class=" text-uppercase mySlide">First slide label</h5>
        <p class="font-italic slider-info">Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="images/m1.jpg" style="height:450px;" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class=" text-uppercase mySlide">Second slide label</h5>
        <p class="font-italic slider-info">Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/m2.jpg "  style="height:450px;" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class=" text-uppercase mySlide">Third slide label</h5>
        <p class="font-italic slider-info">Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div id="Apropos">
  <div class="color-shams who mt-1">
    <div class="about-title"> <span class="color-media ">NOTRE</span>  ENTREPRISE<br>
    </div>
    <img src="images/Fichier 2.png" class="line" width="150px" alt="">
  </div>
  <div class="mt-2 d-flex ">
      <div class=" bg-info divider"></div>
      <div class="ml-2 text-dark col-sm-5 fade-in fs-2 " id="who-explain">
          <strong>SHAMS MOTO</strong> Depuis 1973, Transautomobile vend hors taxes et exporte,
           vers le pays de votre choix, tous types de véhicules 4x4 & SUV, >Pick-up, Bus, 
           Camions & engins et équipements divers ... tant en versions tropicales qu’européennes, 
           en conduite à gauche (LHD) ou conduite à droite (RHD). Transautomobile s’occupe également
            de la transformation en ambulance ou véhicules blindés et founi un service de transport 
            et un service pièces détachées...
. 
      </div>
      <div class="col-sm-5 d-none d-sm-block">
        <img src="images/18384535_l.jpg" class="mt-1 w-100 " id="who-image" height="300" alt="">
      </div>
  </div>
</div>
<div >
    <p>
    </p>
</div>
<div class="about-title color-shams who"> Voici notre collection de voiture<br>
@if(!Auth::check())
<h2 class="fs-2 ml-5 text-danger">Veillez vous connecter pour pourvoir louer nos voitures .</h2>
@endif
</div>
<div class="container  mt-5">
    <div class="row">
    @foreach($categories as $categorie)
    <div class="text-uppercase subtitle fs-3 mt-2"> {{ $categorie->name }}<br></div>
    <div class="myline"></div>
        @foreach($voitures as $voiture )
          @if ( $voiture->categorie_id == $categorie->id )
            <div class="card m-3" style="width: 18rem;">
                <img src="images/{{$voiture->image}}" class="card-img-top"  alt="...">
                <div class="card-body">
                    <h5 class="card-title text-primary"> {{ $voiture->marque }}
                                        </h5>
                    <p class="card-text">{{$voiture->description}}</p>
                    <h3 class="text-primary ">{{$voiture->prix}} FCFA </h3>
                </div>
            </div>
            @endif
        @endforeach
      @endforeach
  </div>
  </div>
  <div class="color-shams who">
  <span class="color-media ">NOS</span>  PARTENAIRES <br>
  <img src="images/Fichier 3.png" alt=""> <br>
</div>
<section id="partenaire">
      <div class="container mt-2 w-75">
          <div class="row ">
              <div class="mt-1 col-sm-4">
                   <a href="#" class="thumbnail"  target="_blank"><img src="images/logo1.jpg"  alt=""></a>
              </div>
              <div class="mt-1 col-sm-4">
                  <a href="#" class="thumbnail" target="_blank"><img src="images/logo2.png"  alt=""></a>
             </div>
             <div class="mt-1 col-sm-4">
                <a href="#" class="thumbnail" target="_blank"> <img src="images/logo3.png"  alt=""></a>
            </div>
            <div class="mt-1 col-sm-4">
              <a href="#" class="thumbnail" target="_blank"><img src="images/logo4.jpg"  alt=""></a>
                
              </div>
              <div class="mt-1 col-sm-4">
                  <a href="#" class="thumbnail" target="_blank"><img src="images/logo5.jpg"  alt=""></a>
                    
              </div>
              <div class="mt-1 col-sm-4">
                  <a href="#" class="thumbnail" target="_blank"><img src="images/logo6.jpg"  alt=""></a>
                    
              </div>
          </div>
      </div>
  </section>
@endsection

