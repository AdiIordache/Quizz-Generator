<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ValidAnswers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Validanswer controller.
 *
 * @Route("validanswers")
 */
class ValidAnswersController extends Controller
{
    /**
     * Lists all validAnswer entities.
     *
     * @Route("/", name="validanswers_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $validAnswers = $em->getRepository('AppBundle:ValidAnswers')->findAll();

        return $this->render('validanswers/index.html.twig', array(
            'validAnswers' => $validAnswers,
        ));
    }

    /**
     * Creates a new validAnswer entity.
     *
     * @Route("/new", name="validanswers_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $validAnswer = new ValidAnswers();
        $form = $this->createForm('AppBundle\Form\ValidAnswersType', $validAnswer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($validAnswer);
            $em->flush();

            return $this->redirectToRoute('validanswers_show', array('id' => $validAnswer->getId()));
        }

        return $this->render('validanswers/new.html.twig', array(
            'validAnswer' => $validAnswer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a validAnswer entity.
     *
     * @Route("/{id}", name="validanswers_show")
     * @Method("GET")
     */
    public function showAction(ValidAnswers $validAnswer)
    {
        $deleteForm = $this->createDeleteForm($validAnswer);

        return $this->render('validanswers/show.html.twig', array(
            'validAnswer' => $validAnswer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing validAnswer entity.
     *
     * @Route("/{id}/edit", name="validanswers_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ValidAnswers $validAnswer)
    {
        $deleteForm = $this->createDeleteForm($validAnswer);
        $editForm = $this->createForm('AppBundle\Form\ValidAnswersType', $validAnswer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('validanswers_edit', array('id' => $validAnswer->getId()));
        }

        return $this->render('validanswers/edit.html.twig', array(
            'validAnswer' => $validAnswer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a validAnswer entity.
     *
     * @Route("/{id}", name="validanswers_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ValidAnswers $validAnswer)
    {
        $form = $this->createDeleteForm($validAnswer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($validAnswer);
            $em->flush();
        }

        return $this->redirectToRoute('validanswers_index');
    }

    /**
     * Creates a form to delete a validAnswer entity.
     *
     * @param ValidAnswers $validAnswer The validAnswer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ValidAnswers $validAnswer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('validanswers_delete', array('id' => $validAnswer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
