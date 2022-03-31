<?php
//Définir les constantes
//Racine de l'appli


//Accès au chemin absolu
//echo __FILE__.'<br>';

//Le répertoir (sans le nom du fichier)
//echo dirname(__FILE__).'<br>';

//Le répertoir (sans le nom du dossier)
//echo dirname(dirname(__FILE__)).'<br>';

define('APPROOT', dirname(dirname(__FILE__)));

//Racine des Url
define('URLROOT', 'VOTRE_URL');

//Titre du site
define('SITENAME', 'Framework PHP');

//Base de donnée
define('DB_HOST', 'VOTRE_SERVEUR'); //hebergeur
define('DB_NAME', 'VOTRE_NOMBDD');  //nom de la table
define('DB_USER', 'UTILISATEUR');   //
define('DB_PASSWORD', 'VOTRE_MDP');
define('DB_PORT', 3307);
