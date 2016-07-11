<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
	}

	//explained +- in doc/tuto creer une page



    public function contact()
    {
    	echo 'test';
        //traiter le formulaire contact ici...
        //$this->show('default/contact');
    }

}