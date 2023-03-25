<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php echo("Hello World") ?>
    <br>
    @foreach ($myphone as $item)
       <h2> {{ $item }} </h2><br>
    @endforeach
</body>
</html>