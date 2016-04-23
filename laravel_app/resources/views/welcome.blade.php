<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <!-- <link href="resources/assets/css/main.css" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"> 
    <!-- <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css" > -->
    <!-- <link rel="stylesheet" href="<?php echo asset('assets/css/main.css'); ?>" type="text/css" /> -->

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
    <div>
        <?php foreach ($people as $person): ?>
            <li><?= $person; ?></li>
        <?php endforeach ?>
    </div>
    <div>
        <!-- Using blade -->
        <!-- unless is generally equaivalent to if(!empty) -->
        @unless (empty($people))
        There are some people 
        @endunless
        
        @if (!empty($people))
        There are people.
        @endif

        @foreach ($people as $person)
        <li>{{ $person }}</li>
        @endforeach
    </div>
</body>
</html>
