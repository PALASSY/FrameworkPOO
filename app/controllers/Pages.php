<?php
//La class Pages hérite la Class Controller
class Pages extends Controller {

  public function  __construct(){
    //echo 'Pages trouvée';
  }

  public function index(){
    $data = ['title'=>'Bienvenue'];
    $this -> view('pages/index',$data);
  }
  public function contact(){
    $data = ['title'=>'Contactez-nous'];
    $this -> view('pages/contact',$data);
  }
}
