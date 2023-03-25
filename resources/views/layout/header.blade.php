<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .active{
        color: red;
    }
</style>
<body>
    <nav>
        <ul style="display:flex; list-style:none">
            <li style="width:10%; ">
                <a href="/" class="{{request()->is('/') ? 'active' : ''}}"> 
                    Home
                </a>
            </li>
            {{--  --}}
            <li style="width:10%">
                <a href="about" class="{{request()->is('about') ? 'active' : ''}}">
                    About
                </a>
            </li>
            {{--  --}}
            
        </ul>
    </nav>
</body>
</html>