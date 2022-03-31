<?php
/*
*Controller c'est l'hertière
*Contolleur de base qui va charger le model et la view
*/

class Controller {

  //Chargement du modèle (données) dans BDD
  //param c'est le nom du modèle
  public function model($model){
    //Donner le chemin vers le fichier et retourne le modèl
    //on ressort de l'index.php(public)
    require_once '../app/models/'.$model.'.php';
    //Instancier la class(dans model) nouvel Objet(mettre en action)
    return new $model;
  }

  //Chargement de la vue ()
  //Il faut faire une vérification parceque la vue peut ne pas exister
  public function view($view, $data=[]){
    if(file_exists('../app/views/'.$view.'.php')){
      require_once '../app/views/'.$view.'.php';
    }
    else{
      die('La vue n\'existe pas');
    }
  }
}
