<?php
	/**
	 * TagControlleur
	 */
	
	
	namespace App\Controller;
	
	use ieps\Core\GenericController;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; //chargement des methodes , comme render()
	
	//use Symfony\Component\HttpFoundation\Response; //pour etablir la commande ECHO
	use App\Entity\Tag;
	
	
	class TagController extends GenericController
	{
		

		
		public function indexAction(int $limit = 10){
			$tags = $this->_repository->findBy(
				[],
				[],
				$limit
			);
			return $this->render('tag/index.html.twig',[
				'tags' => $tags
			]);
		}
		
	}