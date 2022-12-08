<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="{{mix('css/app.css')}}">
      <link rel="stylesheet" href="css/style.css">
      <title>Stock</title>
   </head>
   <body >
    <div id="app">
      <router-view></router-view>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
   </body>
</html>


