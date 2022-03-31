<?php
/*
*Core c'est le noyau de l'app
*Creation les Url et charge le controleur de base
*Gérer le chemin(format) des Url => class/method/params
*/

//Class héritière
class Core{
  protected $currentController = 'Pages'; //class
  protected $currentMethod = 'index';     //methode
  protected $params = [];                 //param

  public function __construct(){
    //$this -> getUrl();
    //print_r => permet d'afficher un tableau / echo ne le permet pas
    //print_r($this -> getUrl());

    //$url ici est un taleau
    $url = $this -> getUrl();

    //On recherche si le controller correspondant au prémier paramètre existe, [0]=>class
    //Ici pour accéder au fichier Pages.php/Posts.php/... il faut se dire que le système sort du fichier index.php(public) pour diriger ici
    //Indique si une variable ne vaut null pas(si il y a de valeur)
    //Si la class existe (le chemin du fichier)+le 1élément dans URL(qui commence par un majuscule)
    if(!is_null($url) && file_exists('../app/controllers/'. ucwords($url[0]). '.php')){
      //Si on le trouve on MAJ l'attribut $currentController
      $this -> currentController = ucwords($url[0]);
      //Ensuite supprimer le 1er param pour utiliser le 2em param
      unset($url[0]);
    }//Fin du if
    //Si on trouve la class, on va require la class(Pages)
    require_once '../app/controllers/'.$this -> currentController. '.php';
    //On instancie(on met en action)
    $this -> currentController = new $this -> currentController;


    //Après instation on cherche la method et les params
    //On recherche si le  deuxième paramètr existe,, [1]=>method
    if(isset($url[1])){
      //On vérifie si le méthode existe dans la class
      if(method_exists($this -> currentController, $url[1])){
        //Si on le trouve on MAJ l'attribut $currentMethod
        $this -> currentMethod = $url[1];
        unset($url[1]);
      }
    }
    //echo $this -> currentMethod;

    //On recherche si autre(s) paramètres existe[2....]=>method
    // Ici l'attribut $params est un tableau
    // array_values => stocke les parmètres dans un tableau
    $this -> params = $url ? array_values($url) : [];
    //Retourne le tableau
    //call_user_func_array — Appelle une fonction de rappel avec les paramètres rassemblés en tableau
    call_user_func_array([$this -> currentController, $this -> currentMethod], $this -> params);

  }


  //Prendre les infos dans Url avec GET
  public function getUrl(){
    if(isset($_GET['url'])){
      //On ne veut pas récupérer les slash
      $url = rtrim($_GET['url'], '/');
      //On ne veut pas les injections SQL(chiffres lettres)
      //sauf les caractères utilisées dans .htaccess
      $url = filter_var($url, FILTER_SANITIZE_URL);
      //On veut récupérer tous les éléménts séparer par les slash
      $url = explode('/', $url);
      return $url;
    }
  }
}
