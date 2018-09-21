<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <body>
        <div class="content">
            <h1>Test Api</h1>
            @foreach ($users as $user)
                Nom: {{ $user->username }}
                Mot de Passe: {{ $user->password }}
            @endforeach
            
        </div>
    </body>
</html>
