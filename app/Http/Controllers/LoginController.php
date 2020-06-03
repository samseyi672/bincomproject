<?php //session_start() ;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB ;

class LoginController extends Controller
{
      const EMAIL  =  'test@gmail.com' ;
      const PASSWORD = 'test' ;
   public function processLogin(Request $request){
       //return 'see' ;
           $email = $request->input('email')  ;
           $password = $request->input('password')  ;
           //hashing password 
    if((sha1($password) == sha1(LoginController::PASSWORD)) && LoginController::EMAIL == $email){
          // $_SESSION['name']  = sha1($password) ;
            session(['name' => sha1($password)]);
          // $_SESSION['email']  =  'test$gmail.com' ;
            session(['email' =>  'test$gmail.com']);
               return  'yes'; 
                      }
   }
   public function logout(Request $request){
//       session(['name' => null]);
//        session(['email' => null]);
        $request->session()->flush();
        \Illuminate\Support\Facades\Session::flush();
        \Illuminate\Support\Facades\Auth::logout();
      echo '<script type="text/javascript">
           window.location = "/"
      </script>';
   }
  public function addStatesToPage(Request $request){
      // return 'yes' ;
      $query  = "select * from states" ;
      $states = DB::select($query);
        return json_encode($states)  ;
             }
   public function getLocalGov(Request $request){
         $locals  =  $request->input('locals') ;
      $local = DB::select("select * from lga where state_id= ?",[$locals]) ;
       return json_encode($local)  ; 
            }
   public function getLocalUnit(Request $request){
         $locals  =  $request->input('lga') ;
      $local = DB::select("select * from polling_unit where lga_id= ?",[$locals]) ;
       return json_encode($local)  ; 
            }
    public function displaypollingunit(Request $request){
         $locals  =  $request->input('displaypollingunit') ;
      $local = DB::select("select * from announced_pu_results where polling_unit_uniqueid= ?",[$locals]) ;
       return json_encode($local)  ; 
           }
            public function displaypollingunitresult(Request $request){
         $locals  =  $request->input('displaypollingunit') ;
      $local = DB::select("select p.lga_id,p.polling_unit_number,p.polling_unit_name,l.party_score,l.party_abbreviation,l.polling_unit_uniqueid from polling_unit p join announced_pu_results l on p.polling_unit_id=l.polling_unit_uniqueid where p.lga_id= ?",[$locals]) ;
       return json_encode($local)  ; 
           }
    public function pollingunit(Request $request){
        $pol  =  $request->input('pol') ;
      $local = DB::select("select polling_unit_name from polling_unit where polling_unit_name LIKE '%".$pol."%'",[$pol]) ;
      // $myarray = json_decode(json_encode($local), true); 
       // echo $myarray ;
      return  json_encode($local)  ;  
            }
       public function pollingunit2(Request $request){
           include_once (app_path()."\config\searchdb.php");
        $pol  =  $request->input('pol') ;
      $local = DB::select("select lga_name,lga_id from lga where state_id=25 and lga_name LIKE '%".$pol."%'",[$pol]) ;
      //$myarray = json_decode(json_encode($local), true); 
              searchitems($local)  ; 
            }
}






















