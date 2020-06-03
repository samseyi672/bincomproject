<?php //session_start() ;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  include 'addings/header.php';
include_once(app_path().'\config\config.php');
  ?>
<html>
    <head>
        <title>login</title>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet" />
         <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/search.min.css" rel="stylesheet" />
         <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/dropdown.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
         <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.4.6/css/uikit.min.css" rel="stylesheet">
         <link href="css/jquery-ui.css" rel="stylesheet">
    </head>
    <body>
         <div class="container-fluid">
  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
      </div>
    </div></li>
    <li><a href="/index"><i class="material-icons">cloud</i>Electioneering Result</a></li>
    <li><a href="/newpollingunit"><i class="material-icons">cloud</i>Create new Polling Unit</a></li>
    <li><a href="/enterpartyresult"><i class="material-icons">cloud</i>Enter Party Result</a></li>
    
     <li><a href="/logout"><i class="material-icons">cloud</i>Log Out</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
        <div class="container" style="margin-top:50px;">
                       <div class="row">
                           <div class="col s4"></div>
                         <h5  class="text-center"><strong>Create Polling Unit</strong></h5>                
                         <div class="col s4"></div>
                       </div>
                <div class="row">
                <form class="col s12" id="myform">
                  <div class="row">
                       <div class="col s4"></div>
                    <div class="input-field col s4">
                     <select id="select_state" onchange="onchangeStates('locals','select_state')">
                       <option value="" disabled selected>Choose the States(Delta)</option>  
                            </select>
                             </div>
                      <div class="col s4"></div>
                       </div>
                    <div class="row">
                     <div class="col s2"></div>
                    <div class=" input-field col s8">
                      <select id="lga" onchange="onchangeLocal('lga','lga')">
                  
                                </select>
                                 </div>
                          <div class="col s2"></div>
                             </div>
                     <div class="row" style="margin-right:120px;">
                    <div class="col s3"></div>
                    <div class="input-field col s6">
                      <i class="material-icons prefix">name</i>
                      <input id="icon_password" type="text" name="text" class="validate" placeholder="Enter your poll name">
                      <label for="icon_password"></label>
                    </div>
                     <div class="col s3"></div>
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
                        <a href="javascript:void(0);"class="btn waves-effect waves-light pulse mybtn" name="action" onclick="pollcreated()">Create Poll
                          <i class="material-icons right">send</i>
                       </a>
                    </div>
                       <div class="col s4"></div>
                </form>
              </div>
              </div>
            </div>
          <script src="js/jquery-1.12.0.min.js"></script>
      <script src="js/jquery-ui.js"></script>   
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/dropdown.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/search.min.js"></script>        
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.15/lodash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.4.6/js/uikit.min.js"></script>
     <script src="js/pagescript.js"></script>
    
            <script>         
            $(document).ready(()=>{
              $('.myhide').hide();
              $('.sidenav').sidenav();
                getStates() ;
             $('#lga').formSelect() ;
             $('#pollingunit').formSelect() ;
              }
                   );
            </script>
    </body>
</html>






















