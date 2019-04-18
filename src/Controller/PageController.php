<?php
	/*
	  ./src/Controller/PageController.php
	*/
namespace App\Controller;
//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Ieps\Core\GenericController;
use App\Entity\Page;
use App\Entity\Post;
use Symfony\Component\HttpFoundation\Request;

class PageController extends GenericController {




    public function indexAction(){
        $pages = $this->_repository->findAll();
        return $this->render('pages/index.html.twig',[
            'pages' => $pages
        ]);
    }
    public function showAction(int $id, Request $request)
    {
        $page=$this->_repository->find($id);
        return $this->render('pages/show.html.twig',[
            'page'=>$page,
            'letter'=>$request->query->get('letter')
        ]);
    }
}