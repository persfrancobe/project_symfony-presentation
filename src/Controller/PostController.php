<?php
	/**
	 * Created by PhpStorm.
	 * User: irina
	 * Date: 15-02-19
	 * Time: 13:16
	 */
	
	
	namespace App\Controller;
	
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use App\Entity\Post;
	use App\Form\PostType;
	use Irina\Core\GenericController;
	use Symfony\Component\HttpFoundation\Request;
	
	
	class PostController extends GenericController{
		
		
		public function delete(Post $post, Request $request)
		{
			if ($this->isCsrfTokenValid('delete'.$post->getId(), $request->get('_token'))){
		        $manager = $this->getDoctrine()->getManager();
		        $manager->remove($post);
		        $manager->flush();
				$this->get('session')->getFlashBag()->clear();
		        $this->addFlash('message', "Le post a été bien supprimé");
			}
			return $this->redirectToRoute('app_pages_show', ['id' => 3, 'slug' => 'blog']);
		}
		
		public function add(Request $request)
		{
			$post = new Post();
			$form = $this->createForm(PostType::class, $post);
			$form->handleRequest($request);
			
			if($form->isSubmitted() && $form->isValid()){
				$manager = $this->getDoctrine()->getManager();
				$manager->flush();
				$this->get('session')->getFlashBag()->clear();
		        $this->addFlash('message', "Le post a bien été modifié");

				return $this->redirectToRoute('app_pages_show', ['id' => 3, 'slug' => 'blog']);
			}
			
			return $this->render('posts/add.html.twig',[
				'post'=>$post,
				'form'=>$form->createView()
			]);
		}
		
		public function edit(Post $post, Request $request)
		{
			$form = $this->createForm(PostType::class, $post);
			$form->handleRequest($request);
			if($form->isSubmitted() && $form->isValid()){
				$manager = $this->getDoctrine()->getManager();
				$manager->persist($post);
				$manager->flush();
				$this->get('session')->getFlashBag()->clear();
		        $this->addFlash('message', "Le post a bien été modifié");

				return $this->redirectToRoute('app_pages_show', ['id' => 3, 'slug' => 'blog']);
			}
			return $this->render('posts/edit.html.twig',[
				'post'=>$post,
				'form'=>$form->createView()
			]);
		}
		
		public function index(int $limit = 10){
			$posts = $this->_repository->findBy(
				[],
				['dateCreation' => 'DESC'],
				$limit
			);
			return $this->render('posts/index.html.twig',[
				'posts' => $posts
			]);
		}
		
		public function indexByAuteur(int $id){
			$posts = $this->_repository->findBy(
				['auteur' => $id],
				['titre' => 'DESC']
			);
			return $this->render('posts/liste.html.twig',[
				'posts' => $posts
			]);
		}
		
		public function show(string $slug)
		{
			$post = $this->_repository->findBySlug($slug);
			return $this->render('posts/show.html.twig', [
				'post' => $post
			]);
		}
		
	}