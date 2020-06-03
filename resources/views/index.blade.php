<?php //session_start() ;

include 'addings/header.php';
include_once(app_path().'\config\config.php');
  ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>index</title>
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
        <br/>
        <div class="container" style="margin-left:230px;margin-top:50px;">
              <div class="container">         
            <h3 class="text-center text-bold">View Electioneering Result</h3>
             </div><br/>
            <ul class="collapsible">
        <li>
          <div class="collapsible-header"><i class="material-icons">find_in_page</i>Search Score Per Polling Unit</div>
          <div class="collapsible-body">
<!--              <div class="container">-->
      <div class="row">
      <div class="input-field col s3">
         <select id="select_state" onchange="onchangeStates('locals','select_state')">
         <option value="" disabled selected>Choose the States(Delta)</option>  
              </select>
            </div>
          <div class=" input-field col s3">
              <select id="lga" onchange="onchangeLocal('lga','lga')">
                  
                  </select>
            </div> 
           <div class="input-field col s3">
                <select id="pollingunit">
                  
                  </select>
                  </div> 
           <div class="input-field col s3">
               <a href="javascript:void(0);" class="btn waves-effect waves-light mybtn2 uk-animation-shake" 
                  name="action" onclick="displaypollingunit('displaypollingunit','pollingunit')">find
                  <i class="material-icons right">find_in_page</i>
                  </a>
                  </div> 
               </div>
<!--                </div>-->
              <div class="container">
            <table class="centered striped" id="pollresult" style="">
               
            </table>
        </div>
          </div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">place</i>Search Any LGA for Total Polling Unit Result</div>
          <div class="collapsible-body">
               <div class="row">
          <div class=" ui fluid search col s4">
              <div class=" ui icon input">
                  <input class="prompt" type="text" placeholder="Search polling unit at a go..." id="pol2" onkeyup="viewresult()"/>
                <i class="search icon"></i>
              </div>
                   </div> 
                    <div class="input-field col s4">
               <a href="javascript:void(0);" class="btn waves-effect waves-light mybtn2 uk-animation-shake" name="action" onclick="displaypollingunitresult('displaypollingunit')">search
                  <i class="material-icons right">find_in_page</i>
                  </a>
                  </div> 
           </div> 
              <div class="container">
            <table class="centered striped" id="pollresult2" style="">
               
            </table>
                </div>
            </div>
        </li>
          </ul>
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
              $('.sidenav').sidenav();
             var elem = document.querySelector('.collapsible');
                    var instance = M.Collapsible.init(elem, {
                      accordion: true
                         });
        // dynamically load  the states  
         //$('.ui.search').search({source:viewresult()});
           getStates() ;
             $('#lga').formSelect() ;
             $('#pollingunit').formSelect() ;
              }
         );
        </script>
    </body>
     
</html>
