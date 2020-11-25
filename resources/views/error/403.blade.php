<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  {{-- @import url('https://fonts.googleapis.com/css?family=Lobster|Open+Sans'); --}}
<style>
body{
  background: url(https://i.imgur.com/faFcxS1.png);
  background-color: #3E3E3E
    animation: scroll 70s infinite linear;
  font-family: "Open Sans", sans-serif;
  color: white;
}
@keyframes scroll{
  from {background-position: 0 0;}
  to {background-position: 100% 0;}
}
.logo{
  margin-left: auto;
  margin-right: auto;
  font-family: lobster;
  font-size: 120px;
  text-align: center;
}
.error{
  margin-left: auto;
  margin-right: auto;
  text-align: center;
  font-size: 40px;
  background: rgba(0,0,0,.3);
  width:240px;
  border-radius:2px;
}
.error2{
  margin-left: auto;
  margin-right: auto;
  text-align: center;
  background: rgba(0,0,0,.3);
  width: 300px;
  padding:10px;
  border-radius:2px;
}
a:link, a:visited, a:active{
  color: white;
  text-decoration: none;
}
.options{
    background: rgba(0,0,0,.3);
  width:100px;
  margin-right: auto;
  margin-left: auto;
  padding:10px;
  border-radius:2px;
}
back:hover{
  text-shadow: 0px 0px 10px #3498db;
}
</style>
</head>
<body>
<div class="logo">
  Reality
</div>
  <br>
<div class="error">
  Error 403!
</div>
<br>
<div class="error2">
  You don't have permission to view this resource!</div>
  <br>
<div class="options" align="center">
  <a class="btn btn-dark" href="{{ route('hoso.index') }}"><i class="fa fa-undo mr-2"></i>Go Back</a>
</div>
</html>
  