<?php

namespace AppBundle\Controller;

use AppBundle\Entity\StudentAssesments;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Studentassesment controller.
 *
 * @Route("studentassesments")
 */
class StudentAssesmentsController extends Controller
{
    /**
     * Lists all studentAssesment entities.
     *
     * @Route("/", name="studentassesments_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $studentAssesments = $em->getRepository('AppBundle:StudentAssesments')->findAll();

        return $this->render('studentassesments/index.html.twig', array(
            'studentAssesments' => $studentAssesments,
        ));
    }

    /**
     * Creates a new studentAssesment entity.
     *
     * @Route("/new", name="studentassesments_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $studentAssesment = new StudentAssesments();
        $form = $this->createForm('AppBundle\Form\StudentAssesmentsType', $studentAssesment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($studentAssesment);
            $em->flush();

            return $this->redirectToRoute('studentassesments_show', array('id' => $studentAssesment->getId()));
        }

        return $this->render('studentassesments/new.html.twig', array(
            'studentAssesment' => $studentAssesment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a studentAssesment entity.
     *
     * @Route("/{id}", name="studentassesments_show")
     * @Method("GET")
     */
    public function showAction(StudentAssesments $studentAssesment)
    {
        $deleteForm = $this->createDeleteForm($studentAssesment);

        return $this->render('studentassesments/show.html.twig', array(
            'studentAssesment' => $studentAssesment,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing studentAssesment entity.
     *
     * @Route("/{id}/edit", name="studentassesments_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, StudentAssesments $studentAssesment)
    {
        $deleteForm = $this->createDeleteForm($studentAssesment);
        $editForm = $this->createForm('AppBundle\Form\StudentAssesmentsType', $studentAssesment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('studentassesments_edit', array('id' => $studentAssesment->getId()));
        }

        return $this->render('studentassesments/edit.html.twig', array(
            'studentAssesment' => $studentAssesment,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a studentAssesment entity.
     *
     * @Route("/{id}", name="studentassesments_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, StudentAssesments $studentAssesment)
    {
        $form = $this->createDeleteForm($studentAssesment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($studentAssesment);
            $em->flush();
        }

        return $this->redirectToRoute('studentassesments_index');
    }

    /**
     * Creates a form to delete a studentAssesment entity.
     *
     * @param StudentAssesments $studentAssesment The studentAssesment entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(StudentAssesments $studentAssesment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('studentassesments_delete', array('id' => $studentAssesment->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
