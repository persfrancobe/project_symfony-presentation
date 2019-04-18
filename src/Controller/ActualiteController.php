<?php
	
	namespace App\Controller;
	
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use App\Entity\Actualite;
	use App\Repository\ActualiteRepository;
	
	class ActualiteController extends AbstractController
	{
		private $_repository;
		
		public function __construct(ActualiteRepository $repository){ //(ActualiteRepository $repository) egal à $repository = new PageRepository
			$this->_repository = $repository;
		}
		
		public function showAction(Actualite $actualite){
			return $this->render('actualites/show.html.twig',[
				'actualite' => $actualite
			]);
		}
		
		public function indexAction(int $limit = 10){
			$actualites = $this->_repository->findBy(
				[],
				['dateCreation' => 'DESC'],
				$limit
			);
			return $this->render('actualites/index.html.twig',[
				'actualites' => $actualites
			]);
		}
		
	}
