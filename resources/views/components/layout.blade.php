<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/7a12a15939.js" crossorigin="anonymous"></script>
    <script src="{{ mix('js/app.js') }}"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>The Aulab Post</title>
</head>
<body>

    <div class="background-img">  
        <x-navbar />


            {{$slot}}



    


        <x-footer />
    </div>
    
</body>
</html>