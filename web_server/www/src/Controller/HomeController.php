<?php
 
namespace App\Controller;

use Yoop\AbstractController;


class HomeController extends AbstractController
{
    public function print() 
    {  
        $calc = '';
        $flag = null;
        $success = null;
        $error = null;
        
        if(isset($_POST['calc']) && !empty($_POST['calc'])) {
            $calc = $_POST['calc'];
            if(preg_match('/[0-9\+\*\(\)\.^]/', $_POST['calc'])) {
                try {
                    $resultat = eval('try{return '.$_POST['calc'].';}catch(\Throwable $e){ throw new \Error($e->getMessage());}');
                    if ($resultat !== false) {
                        if($resultat === "FLAG") {
                            $flag = "Bien joué, le flag est ".$this->getFlag();
                        }
                        else {
                            $success = "Le résultat de votre expression est : ".$resultat;
                        }
                    } else {
                        $error = "Il y a eu une erreur lors de l'évaluation de l'expression.";
                    }
                }
                catch(\Error $e) {
                    $error =  "Oups une erreur est survenue !";
                }
            } else {
                $error =  "Votre commande n'est pas correcte !";
            }
        }
        return $this->render('home', ['calc' => $calc, 'success' => $success, 'error' => $error, 'flag' => $flag??null]);
    }
}