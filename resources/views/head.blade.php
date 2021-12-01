<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{$title}}</title>
{{-- ionic icon --}}
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
{{-- font --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
{{-- <link href="https://fonts.googleapis.com/css2?family=Glory:wght@300&display=swap" rel="stylesheet"> --}}
<link href="https://fonts.googleapis.com/css2?family=Glory:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">

{{-- css --}}
<link rel="stylesheet" href="/template/css/cssreset.css" class="css">
<link rel="stylesheet" href="/template/css/main.css">
<link rel="stylesheet" href="/template/css/posts.css">
<link rel="stylesheet" href="/template/css/postform.css" class="css">
<link rel="stylesheet" href="/template/css/postdetail.css" class="cs">
<link rel="stylesheet" href="/template/css/errorslightbox.css" class="css">
<link rel="stylesheet" href="/template/css/manageposted.css" class="css">
<link rel="stylesheet" href="/template/css/header2.css" class="css">
{{-- favicon --}}
<link rel="apple-touch-icon" sizes="180x180" href="/template/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/template/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/template/favicon/favicon-16x16.png">
<link rel="manifest" href="/template/favicon/site.webmanifest">
{{-- view postForm --}}
@yield('head')
