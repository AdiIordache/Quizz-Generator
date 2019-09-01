<?php

namespace AppBundle\Controller;

use AppBundle\Entity\StudentAnswers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Studentanswer controller.
 *
 * @Route("studentanswers")
 */
class StudentAnswersController extends Controller
{
    /**
     * Lists all studentAnswer entities.
     *
     * @Route("/", name="studentanswers_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $studentAnswers = $em->getRepository('AppBundle:StudentAnswers')->findAll();

        return $this->render('studentanswers/index.html.twig', array(
            'studentAnswers' => $studentAnswers,
        ));
    }

    /**
     * Creates a new studentAnswer entity.
     *
     * @Route("/new", name="studentanswers_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $studentAnswer = new Studentanswers();
        $form = $this->createForm('AppBundle\Form\StudentAnswersType', $studentAnswer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($studentAnswer);
            $em->flush();

            return $this->redirectToRoute('studentanswers_show', array('id' => $studentAnswer->getId()));
        }

        return $this->render('studentanswers/new.html.twig', array(
            'studentAnswer' => $studentAnswer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a studentAnswer entity.
     *
     * @Route("/{id}", name="studentanswers_show")
     * @Method("GET")
     */
    public function showAction(StudentAnswers $studentAnswer)
    {
        $deleteForm = $this->createDeleteForm($studentAnswer);

        return $this->render('studentanswers/show.html.twig', array(
            'studentAnswer' => $studentAnswer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing studentAnswer entity.
     *
     * @Route("/{id}/edit", name="studentanswers_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, StudentAnswers $studentAnswer)
    {
        $deleteForm = $this->createDeleteForm($studentAnswer);
        $editForm = $this->createForm('AppBundle\Form\StudentAnswersType', $studentAnswer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('studentanswers_edit', array('id' => $studentAnswer->getId()));
        }

        return $this->render('studentanswers/edit.html.twig', array(
            'studentAnswer' => $studentAnswer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a studentAnswer entity.
     *
     * @Route("/{id}", name="studentanswers_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, StudentAnswers $studentAnswer)
    {
        $form = $this->createDeleteForm($studentAnswer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($studentAnswer);
            $em->flush();
        }

        return $this->redirectToRoute('studentanswers_index');
    }

    /**
     * Creates a form to delete a studentAnswer entity.
     *
     * @param StudentAnswers $studentAnswer The studentAnswer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(StudentAnswers $studentAnswer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('studentanswers_delete', array('id' => $studentAnswer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
