//import instance_state from './jsvariables' ;
//import  instance_lga from './jsvariables' ;
function login(){ 
    $('.mybtn').hide() ;
     $('.myhide').show(); 
    $.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
      let form = $('#myform').serialize() ;
     $.ajax({
        type: 'POST',
        url: './login',
        //dataType: 'JSON',
        data:form,
        beforeSend: function () {                
           },
        success: function (html) { 
         //alert(html) ;
         window.location.href='./index' ; 
         
           }
         });
    
}
function StringBuilder(value)
                {
                    this.strings = new Array("");
                    this.append(value);
                }
                // Appends the given value to the end of this instance.
                StringBuilder.prototype.append = function (value)
                {
                    if (value)
                    {
                        this.strings.push(value);
                    }
                };
// Clears the string buffer
                StringBuilder.prototype.clear = function ()
                {
                    this.strings.length = 1;
                };

// Converts this instance to a String.
                StringBuilder.prototype.toString = function ()
                {
                    return this.strings.join("");
                };
function getStates(){
    $.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
        type: 'POST',
        url: './statesdata',
        dataType: 'JSON',
        data:'states=states',
        beforeSend: function () { 
           // alert('going') ;
           },
        success: function (html) { 
            var buider  = new StringBuilder() ;
            var arr = _.toArray(html);
//           _.forIn(html,(e)=>{           
//             console.log(e.state_name +' and '+ e.state_id);
//               }) ; 
           _.forIn(html,(e)=>{
             buider.append(`<option value="${e.state_id}">${e.state_name}</option>`) ;
            // console.log(e.state_id);
               }) ;
             //console.log(buider.toString());
             $('#select_state').empty().append(buider.toString());  
           $('#select_state').formSelect();
           }
         });  
}

function onchangeStates(input,elem){
     //let lga  = document.getElementById('lga').value ;
     var instance = M.FormSelect.getInstance($(`#${elem}`).formSelect());
      //alert(instance.getSelectedValues() + ' and ' +input) ; 
    $.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
        type: 'POST',
        url: './lga',
        dataType: 'JSON',
        data:`${input}=`+instance.getSelectedValues(),
        beforeSend: function () { 
           // alert('going') ;
           },
        success: function (html) { 
            if(_.isEmpty(html)){
             alert('Only delta is Available') ;
                 }
            var buider  = new StringBuilder() ;       
           _.forIn(html,(e)=>{
            buider.append(`<option value="${e.lga_id}">${e.lga_name}</option>`) ;          
               }) ;
            $('#lga').empty().append(buider.toString()) ;
            $('#lga').formSelect() ;
           }
         });   
}
function onchangeLocal(input,elem){
     //let lga  = document.getElementById('lga').value ;
    var instance = M.FormSelect.getInstance($(`#${elem}`).formSelect());
      //alert(instance.getSelectedValues() + ' and ' +input) ; 
    $.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
        type: 'POST',
        url: './pollingunit',
        dataType: 'JSON',
        data:`${input}=`+instance.getSelectedValues(),
        beforeSend: function () { 
           // alert('going') ;
           },
        success: function (html) { 
            if(_.isEmpty(html)){
             alert('The Polling unit is not Available') ;
                 }
            var buider  = new StringBuilder() ;       
           _.forIn(html,(e)=>{
               // console.log(e.polling_unit_name);
            buider.append(`<option value="${e.polling_unit_id}">${e.polling_unit_name}</option>`) ;          
               }) ;
            $('#pollingunit').empty().append(buider.toString()) ;
            $('#pollingunit').formSelect() ;
           }
         });   
}

function displaypollingunit(input,elem){
    var instance = M.FormSelect.getInstance($(`#${elem}`).formSelect());
      //alert(instance.getSelectedValues() + ' and ' +input) ; 
    $.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     alert($('#mybtn2').text()) ;
     $.ajax({
        type: 'POST',
        url: './displaypollingunit',
        dataType: 'JSON',
        data:`${input}=`+instance.getSelectedValues(),
        beforeSend: function () { 
           // alert('going') ;
           },
        success: function (html) { 
            if(_.isEmpty(html)){
             alert('No party score') ;
                 }
          var buider  = new StringBuilder() ;       
           _.forIn(html,(e)=>{
            // console.log(e.party_score);
          buider.append(`<tr>
                   <td>${e.polling_unit_uniqueid}</td>
                 <td>${e.party_abbreviation}</td>  
                     <td>${e.party_score}</td>) ; 
                        </tr>`) ;
               }) ;
        //sum  it 
        let sum = _.sumBy(html, 
                  (next) => { 
                   //  console.log( next.party_score) ;  
                      return 0+next.party_score ;              
                    });
              console.log('party sum '+ sum);
           $('#pollresult').empty().append(`
                        <thead>
                            <tr>
                         <th>Polling Unit</th>
                         <th>Party Abbreviation</th>
                         <th>Total Party Score</th>
                            </tr>
                         </thead>
                         <tbody>
                       ${buider.toString()}
                      <tr><td></td></td><td></td></td><td>Total:${sum}</td></tr>                    
                       </tbody>
                           `) ;     
           }
         });  
}
function insertpartyscore(input,elem){
   var instance = M.FormSelect.getInstance($(`#${elem}`).formSelect());
      //alert(instance.getSelectedValues() + ' and ' +input) ; 
    $.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
    
     $.ajax({
        type: 'POST',
        url: './displaypollingunit',
        dataType: 'JSON',
        data:`${input}=`+instance.getSelectedValues(),
        beforeSend: function () { 
           // alert('going') ;
           },
        success: function (html) { 
            if(_.isEmpty(html)){
             alert('No party score') ;
                 }
          var buider  = new StringBuilder() ;       
           _.forIn(html,(e)=>{
            // console.log(e.party_score);
             let score = ` <div class="input-field">
                      <i class="material-icons prefix">name</i>
                      <input id="icon_password" type="text" name="${e.party_abbreviation}" class="validate" placeholder="Enter party score">
                      <label for="icon_password"></label>
                    </div>`;
                buider.append('<form id=pollscore>')
          buider.append(`<tr>
                   <td>${e.polling_unit_uniqueid}</td>
                 <td>${e.party_abbreviation}</td>  
                     <td>${score}</td>) ; 
                        </tr>`) ;
                buider.append('</form>')
               }) ;
        //sum  it 
        let sum = _.sumBy(html, 
                  (next) => { 
                   //  console.log( next.party_score) ;  
                      return 0+next.party_score ;              
                    });
          let scorebtn  =` <div class="input-field col s4">
                        <a href="javascript:void(0);"class="btn waves-effect waves-light pulse mybtn" name="action" onclick="score()">Record Score
                          <i class="material-icons right">send</i>
                       </a>
                    </div>` ;
              console.log('party sum '+ sum);
           $('#pollresult').empty().append(`
                        <thead>
                            <tr>
                         <th>Polling Unit</th>
                         <th>Party Abbreviation</th>
                         <th>Total Party Score</th>
                            </tr>
                         </thead>
                         <tbody>
                       ${buider.toString()} 
                   <tr><td></td></td><td></td></td><td>${scorebtn}</td></tr>
                       </tbody>
                           `) ;     
           }
         });    
}
 var searchcontent  = null ;
function viewresult(){
   // console.log('see '+$('#pol2').val());
    //alert($('#pol2').val()) ;
    let pol  = $('#pol2').val()  ;
    $.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
      $.ajax({
        type: 'GET',
        url: './pollingunit2',
        dataType: 'JSON',
        data:'pol='+pol,
        beforeSend: function () { 
           // alert('going') ;
           },
        success: function (html) { 
          //how  to  convert object  to array
          searchcontent  = html ;
          const arr = Object.keys(html).map(key => ({title: html[key].lga_name}));
        //  console.log(arr) ;
            $('.ui.search').search({source:arr});
             },
            async:true
         });
     
}

   function displaypollingunitresult(input){
      // console.log(searchcontent);
       //alert($('#pol2').val());
        var user = _.find(searchcontent, {lga_name:$('#pol2').val()});
        console.log(user) ;
     let lga_id = _.get(user, 'lga_id');  //get the object  of it
    // console.log(lga_id) ;
      $.ajax({
        type: 'POST',
        url: './displaypollingunitresult',
        dataType: 'JSON',
        data:`${input}=`+lga_id,
        beforeSend: function () { 
           // alert('going') ;
           },
        success: function (html) { 
            if(_.isEmpty(html)){
             alert('No party score') ;
                 }
         const withoutDupes = _.uniqBy(html,'polling_unit_name');//
         console.log(withoutDupes) ;
          var buider  = new StringBuilder() ;       
           _.forIn(withoutDupes,(e)=>{
            // console.log(e.party_score);
          buider.append(`<tr>
                   <td>${e.polling_unit_number}</td>
                 <td>${e.polling_unit_name}</td>  
                        </tr>`) ;
                
               }) ;
        //sum  it 
        let sum = _.sumBy(html, 
                  (next) => { 
                   //  console.log( next.party_score) ;  
                      return 0+next.party_score ;              
                    });
              console.log('party sum '+ sum);
           $('#pollresult2').empty().append(`
                        <thead>
                            <tr>
                         <th>Polling Unit Names</th>
                         <th>Polling Unit Number</th>
                            </tr>
                         </thead>
                         <tbody>
                         ${buider.toString()}
                      <tr><td></td></td><td></td></td><td>Total:${sum}</td></tr>                    
                       </tbody>
                           `) ;      
           }
         });      
         }
 function searchdb(url){
      $.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
    let inputvalue = $('#ind_users').val() ;
     url = url+'?pol=' ;
      console.log(inputvalue +' '+ url) ;
    $("#ind_users").autocomplete({
        source: function(request, response){
            $.get(url+inputvalue,{
                term:request.term
                }, function(data){
                $('#ind_users2').val(data[0]['polling_unit_id']);
                response($.map(data, function(item) { 
                    console.log(item.polling_unit_name);
                    return {
                        //label: item.id,
                        value: item.polling_unit_name
                        }
                }))
            }, "json");
        },
        minLength: 2,
        dataType: "json",
        cache: false
    });
}	

function score(){
 alert('done');   
}

function pollcreated(){
   alert('poll created') ;
}
