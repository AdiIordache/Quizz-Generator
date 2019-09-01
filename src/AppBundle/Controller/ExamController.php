<?php

namespace AppBundle\Controller;
use Symfony\Component\Form\FormTypeInterface;
use AppBundle\Entity\Exam;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Exam controller.
 *
 * @Route("exam")
 */
class ExamController extends Controller
{
    /**
     * Lists all exam entities.
     *
     * @Route("/", name="exam_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $exams = $em->getRepository('AppBundle:Exam')->findAll();

        return $this->render('exam/index.html.twig', array(
            'exams' => $exams,
        ));
    }

    /**
     * Creates a new exam entity.
     *
     * @Route("/new", name="exam_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $exam = new Exam();
        $form = $this->createForm('AppBundle\Form\ExamType', $exam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($exam);
            $em->flush();

            return $this->redirectToRoute('exam_show', array('id' => $exam->getId()));
        }

        return $this->render('exam/new.html.twig', array(
            'exam' => $exam,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a exam entity.
     *
     * @Route("/{id}", name="exam_show")
     * @Method("GET")
     */
    public function showAction(Exam $exam)
    {
        $deleteForm = $this->createDeleteForm($exam);

        return $this->render('exam/show.html.twig', array(
            'exam' => $exam,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing exam entity.
     *
     * @Route("/{id}/edit", name="exam_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Exam $exam)
    {
        $deleteForm = $this->createDeleteForm($exam);
        $editForm = $this->createForm('AppBundle\Form\ExamType', $exam);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('exam_edit', array('id' => $exam->getId()));
        }

        return $this->render('exam/edit.html.twig', array(
            'exam' => $exam,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a exam entity.
     *
     * @Route("/{id}", name="exam_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Exam $exam)
    {
        $form = $this->createDeleteForm($exam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($exam);
            $em->flush();
        }

        return $this->redirectToRoute('exam_index');
    }

    /**
     * Creates a form to delete a exam entity.
     *
     * @param Exam $exam The exam entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Exam $exam)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('exam_delete', array('id' => $exam->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
