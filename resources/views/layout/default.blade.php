<html>
<head>
    <title>Survei Keefektifan Angkutan Umum Massal</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style>
        /* Define the CSS for responsive map container */
        #map-container {
            position: relative;
            width: 100%;
            padding-bottom: 75%; /* Set the aspect ratio (4:3 for 400px height) */
        }

        #map {
            position: relative;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body style="background-color: rgba(0, 0, 0, 0.65);">

<div class="container" style="margin-top: 5vh;">

    @yield('content')
</div>
</body>

</html>
