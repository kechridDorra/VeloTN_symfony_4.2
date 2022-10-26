<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use App\Entity\User1;
use App\Form\User1Type;
use Symfony\Component\HttpFoundation\Request;


use App\Repository\ProduitRepository;
use App\Entity\Produit;
use App\Form\EvenementType;
use App\Repository\CommandeRepository;
use App\Entity\Commande;
use App\Repository\VeloRepository;
use App\Entity\Velo;
use App\Repository\LocationRepository;
use App\Entity\Location;
use App\Repository\EvenementRepository;
use App\Entity\Evenement;
use App\Repository\ParticipationRepository;
use App\Entity\Participation;


class AdminController extends AbstractController
{

	
	/**
	 * @Route("admin_user_show/{id}", name="admin_user_show", methods={"GET"})
	 */
	public function user_show(User1 $user): Response
	{
		return $this->render('admin/user/user_show.html.twig', [
			'user' => $user,
		]);
	}
	/**
	 * @Route("admin_user_edit/{id}", name="admin_user_edit", methods={"GET","POST"})
	 */
	public function user_edit(Request $request, User1 $user): Response
	{
		$form = $this->createForm(User1Type::class, $user);
		$form->handleRequest($request);
		
		if ($form->isSubmitted() && $form->isValid()) {
			$this->getDoctrine()->getManager()->flush();
			
			return $this->redirectToRoute('list_user_admin');
		}
		
		return $this->render('admin/user/user_edit.html.twig', [
			'user' => $user,
			'form' => $form->createView(),
		]);
	}
	
	/**
	 * @Route("/admin_user_new", name="admin_user_new", methods={"GET","POST"})
	 */
	 public function new_user(Request $request): Response
	{
		$user = new User1();
		$form = $this->createForm(User1Type::class, $user);
		$form->handleRequest($request);
		
		if ($form->isSubmitted() && $form->isValid()) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($user);
			$entityManager->flush();
			
			return $this->redirectToRoute('user_index');
		}
		
		return $this->render('user/new.html.twig', [
			'user' => $user,
			'form' => $form->createView(),
		]);
	}
	/**
	 * @Route("admin_user_delete/{id}", name="admin_user_delete", methods={"POST"})
	 */
	public function user_delete(Request $request, User1 $user): Response
	{
		if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->remove($user);
			$entityManager->flush();
		}
		
		return $this->redirectToRoute('list_user_admin');
	}
	
	

	
	/**
	 * @Route("admin_velo_show/{id}", name="adminvelo_show", methods={"GET"})
	 */
	public function show(Velo $velo): Response
	{
		return $this->render('admin/velo_show.html.twig', [
			'velo' => $velo,
		]);
	}
	
	

	/**
	 * @Route("/evenement_show/{id}", name="admin_evenement_show", methods={"GET"})
	 */
	public function evenement_show(Evenement $evenement): Response
	{
		return $this->render('admin/evenement/evenement_show.html.twig', [
			'evenement' => $evenement,
		]);
	}
	/**
	 * @Route("/evenement_new", name="admin_evenement_new", methods={"GET","POST"})
	 */
	public function new(Request $request): Response
	{
		$evenement = new Evenement();
		$form = $this->createForm(EvenementType::class, $evenement);
		$form->handleRequest($request);
		
		if ($form->isSubmitted() && $form->isValid()) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($evenement);
			$entityManager->flush();
			
			return $this->redirectToRoute('admin_evenement_list');
		}
		
		return $this->render('admin/evenement/evenement_new.html.twig', [
			'evenement' => $evenement,
			'form' => $form->createView(),
		]);
	}
	/**
	 * @Route("evenement_edit/{id}/edit", name="admin_evenement_edit", methods={"GET","POST"})
	 */
	public function edit(Request $request, Evenement $evenement): Response
	{
		$form = $this->createForm(EvenementType::class, $evenement);
		$form->handleRequest($request);
		
		if ($form->isSubmitted() && $form->isValid()) {
			$this->getDoctrine()->getManager()->flush();
			
			return $this->redirectToRoute('admin_evenement_list');
		}
		
		return $this->render('admin/evenement/evenement_edit.html.twig', [
			'evenement' => $evenement,
			'form' => $form->createView(),
		]);
	}
	
	/**
	 * @Route("evenement_delete/{id}", name="admin_evenement_delete", methods={"POST"})
	 */
	public function delete(Request $request, Evenement $evenement): Response
	{
		if ($this->isCsrfTokenValid('delete'.$evenement->getId(), $request->request->get('_token'))) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->remove($evenement);
			$entityManager->flush();
		}
		return $this->redirectToRoute('admin_evenement_list');
	}



	
}
