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

<div class="w-4/5 m-auto text-center">
    <div class="border-gray-200 py-15 border-h">
        <h1 class="text-5xl mb-5-5">creer une voiture</h1>
    </div>
</div>
    @if ($errors->any())
        <div class="w-4/5 m-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-1/5 py-4 mb-4 bg-red-500 text-gray-50 rounded-2xl ">
                        {{$error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    
    <div class=" col-md-12 bg-light" >
        <form action="/store" method="POST"
            enctype="multipart/form-data">
             @csrf
            <div class="form-row  myform">
                <div class="mb-3 col-md-6 fs-3">
                    <label for="validationServer01">Marque</label>
                    <input type="text" class="form-control is-valid" name ="marque" id="validationServer01" placeholder="Marque"  required>
                    
                </div>
                <div class="mb-3 col-md-6 fs-3">
                    <label for="validationServer01">Porte</label>
                    <input type="text" class="form-control is-valid" name ="porte" id="validationServer01" placeholder="Porte"  required>
                    
                </div>
                <div class="mb-3 col-md-6 fs-3">
                    <label for="validationServer01">Energie</label>
                    <input type="text" class="form-control is-valid" name ="energie" id="validationServer01" placeholder="Energie"  required>
                    
                </div>
                <div class="mb-3 col-md-6 fs-3">
                    <label for="validationServer01">Boite</label>
                    <input type="text" class="form-control is-valid" name ="boite" id="validationServer01" placeholder="Boite"  required>
                    
                </div>
                <div class="mb-3 col-md-6 fs-3">
                    <label for="validationServer01">Prix</label>
                    <input type="number" class="form-control is-valid" name ="prix" id="validationServer01" placeholder="12000 000"  required>
                    
                </div>
                <div class="mb-3 col-md-6">
                        <textarea name="description" id="" cols="30" rows="10" placeholder="Description ..." class="block w-100  bg-transparent border-b-2 outline-none h-50">
                        </textarea>
                </div>
                <div class="mb-3 col-md-6">
                    <div class=" pt-15">
                        <label  class="flex flex-col items-center px-2 py-3 tracking-wide uppercase border shadow-lg cursor-pointer   border-blue">
                            <span class="mt-2 text-base leading-normal">
                                Selectionner une image 
                            </span>
                            <input type="file" name="image" accept=" image|png, image|jpg , image|jpeg , image|svg" class="hidden">
                        </label>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="sr-only mr-sm-2 fs-3" for="">Categorie</label>
                    <select class="custom-select mr-sm-2 w-100" name="categorie_id" required  >
                        <option selected>choisir...</option>
                        @foreach ($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Creer</button>

            </div>

        </form>
    </div>

