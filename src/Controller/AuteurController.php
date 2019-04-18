<?php
	
	namespace App\Controller;
	
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use App\Entity\Auteur;
	use App\Repository\AuteurRepository;
	
	class AuteurController extends AbstractController
	{
		private $_repository;
		
		public function __construct(AuteurRepository $repository){
			$this->_repository = $repository;
		}
		
		public function showAction(Auteur $auteur){
			return $this->render('auteurs/show.html.twig',[
				'auteur' => $auteur
			]);
		}
		
		public function indexByLetterAction($letter) {
			$letter = $letter??'A';
			$auteurs = $this->_repository->findByStartLetter($letter);
			return $this->render('auteurs/indexByLetter.html.twig',[
				'auteurs' => $auteurs,
				'letter'  => $letter
			]);
		}
		
	}
