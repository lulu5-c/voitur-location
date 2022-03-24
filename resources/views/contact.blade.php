

@extends('layouts.app')

@section('content')
  
<div class="color-shams who backgroundImage w-100 ">
    <div class=" position-absolute m-5 ">
    <span class="text-center uppercase color-media">Vous avez des questions ?</span><br>
        Nous y répondrons. <br>
    </div>
</div>

<div>
    <div class="m-3 color-shams who ">
        <div class="">
        <span class="color-media ">NOS</span>  COORDONNEES<br>
        </div>
    </div>
    <div class="container">
        
            <ul class="p-2 mt-3 ml-5 list-unstyled d-flex  justify-content-between">
                <li class="w-5 text-secondary"><span ><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#5b9bd5" class="bi bi-envelope-fill " viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                    </svg></span> notavailable_shamsmedia@gmail.com </li>
                <li class="text-secondary"><span class=""><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#5b9bd5" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg></span>+229 98 14 75 12</li>
                <li class="text-secondary"><span class=""><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#5b9bd5" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                </svg></span>Cotonou (Bénin) </li>

            </ul>        
    </div>
</div>
<div class="p-3 text-center color-media">
  <h1 >ECRIVEZ NOUS </h1>
        
</div>

    <div class="container p-5 mb-5 border col-sm-6 contact-form border-primary bg-secondary">
        <form action="/contact" method="post">
        @csrf
            <div class="form-group">
                <label for="nom" class="nom"> Nom</label>
                <input type="text" class="form-control " name="nom"  placeholder="Shams" required="required">
            </div>

            <div class="form-group">
                <label for="prenom" class="prenom"> Prenom</label>
                <input type="text" class="form-control " name="prenom" placeholder="MEDIA" required="required">
            </div>

            <div class="form-group">
                <label for="contact" class="contact">Contact</label>
                <input type="number" class="form-control " name="contact"  required="required">
            </div>

            <div class="form-group">
                <label for="email" class="email">Email </label> 
                <input type="email" class="form-control " name="mail" id="exampleFormControlInput1" placeholder="name@example.com" required="required">
            </div>
            <div class="form-group">
                <label for="message"  class="message text-light">MESSAGE</label>
                <textarea name="message" class="form-control " id=""  rows="5" required></textarea>
            </div>
            <button type="submit" class="p-2 mb-2 btn btn-primary ">Envoyer</button>
        </form>
        @if (session()->has('message'))

            <p class=" p-4 mb-2  text-light  text-success ">
                {{session()->get('message')}}
            </p>
        @endif  
    </div>
<div class="container fluid map">
    <div class="row">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.1827480123334!2d2.4220272142965316!3d6.370391426692777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1023556160c9760f%3A0x8f73c1ddb5fa8fa!2scotonou!5e0!3m2!1sfr!2sbj!4v1646303851962!5m2!1sfr!2sbj"  height="550" style="border:0;" allowfullscreen="" loading="lazy" class="map"></iframe>
    </div>
</div>

@endsection