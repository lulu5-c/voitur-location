<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
</head>
<body style="background: #e5e5e5; padding: 30px;">
<div style="max-width: 320px; margin: 0 auto; padding: 20px; background: #fff;">

        <h2>Voici le contenu du message</h2>
        <h2>{{ $data['nom'] }}</h2>
        <h2>{{ $data['prenom'] }}</h2>
        <h2>{{ $data['contact'] }}</h2>
        <h2>{{ $data['mail'] }}</h2>
        <div>{{ $data['message'] }}</div>
         <span class="fs-2 mt-5">Sharm MOTO</span>  
    </div>
</body>
</html>