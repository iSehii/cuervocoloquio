<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Asegúrate de tener jQuery cargado -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Behuse - {{$Titulo}}</title>
@if(session('oscuro') !== null && session('oscuro') == true)
    <link id="miEstilo" rel="stylesheet" href="{{ asset('/css/oscuro/Layout.css') }}">
@else
    <link id="miEstilo" rel="stylesheet" href="{{ asset('/css/Layout.css') }}">
@endif
<script src="{{ asset('js/Layouts/preferencias.js') }}"></script>
<link rel="shortcut icon" href="{{ asset('/imagenes/behuse-logos/favicon.ico')}}" type="image/x-icon">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-XW9F8F1MVS');
</script>