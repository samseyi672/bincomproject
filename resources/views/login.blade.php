<?php //session_start() ;

 ?>
<html>
    <head>
        <title>login</title>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    </head>
    <body>
       
        <div class="container" style="margin-top: 100px;">
                       <div class="row">
                           <div class="col s4"></div>
                         <h5  class="text-center"><strong>Welcome to Bincom Voter System</strong></h5>                
                         <div class="col s4"></div>
                       </div>
                <div class="row">
                <form class="col s12" id="myform">
                  <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix">account_circle</i>
                      <input id="icon_prefix" type="email" name="email" class="validate" placeholder="Enter your Username">
                      <label for="icon_prefix"></label>
                    </div>
                       </div>
                    <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix">https</i>
                      <input id="icon_password" type="password" name="password" class="validate" placeholder="Enter your password">
                      <label for="icon_password"></label>
                    </div>
                    </div>
                    <div class="row justify-content-md-center myhide">                       
                      <div class="preloader-wrapper big active">
                        <div class="spinner-layer spinner-blue-only">
                          <div class="circle-clipper left">
                            <div class="circle"></div>
                          </div><div class="gap-patch">
                            <div class="circle"></div>
                          </div><div class="circle-clipper right">
                            <div class="circle"></div>
                          </div>
                        </div>
                             </div>
                       </div>
                    <div class="row">
                      <div class="col s5"></div>
                    <div class="input-field col s4">
                        <a href="javascript:void(0);"class="btn waves-effect waves-light pulse mybtn"  onclick="login()">Login
                          <i class="material-icons right">send</i>
                       </a>
                    </div>
                       <div class="col s4"></div>
                </form>
              </div>
              </div>
            <script src="js/jquery-1.12.0.min.js"></script>
       <script src="js/pagescript.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
            <script>         
            $(document).ready(()=>{
              $('.myhide').hide();
                   });
            </script>
    </body>
</html>






















