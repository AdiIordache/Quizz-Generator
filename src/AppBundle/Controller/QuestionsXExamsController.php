<?php

namespace AppBundle\Controller;

use AppBundle\Entity\QuestionsXExams;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Questionsxexam controller.
 *
 * @Route("questionsxexams")
 */
class QuestionsXExamsController extends Controller
{
    /**
     * Lists all questionsXExam entities.
     *
     * @Route("/", name="questionsxexams_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $questionsXExams = $em->getRepository('AppBundle:QuestionsXExams')->findAll();

        return $this->render('questionsxexams/index.html.twig', array(
            'questionsXExams' => $questionsXExams,
        ));
    }

    /**
     * Creates a new questionsXExam entity.
     *
     * @Route("/new", name="questionsxexams_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $questionsXExam = new QuestionsXExams();
        $form = $this->createForm('AppBundle\Form\QuestionsXExamsType', $questionsXExam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($questionsXExam);
            $em->flush();

            return $this->redirectToRoute('questionsxexams_show', array('id' => $questionsXExam->getId()));
        }

        return $this->render('questionsxexams/new.html.twig', array(
            'questionsXExam' => $questionsXExam,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a questionsXExam entity.
     *
     * @Route("/{id}", name="questionsxexams_show")
     * @Method("GET")
     */
    public function showAction(QuestionsXExams $questionsXExam)
    {
        $deleteForm = $this->createDeleteForm($questionsXExam);

        return $this->render('questionsxexams/show.html.twig', array(
            'questionsXExam' => $questionsXExam,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing questionsXExam entity.
     *
     * @Route("/{id}/edit", name="questionsxexams_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, QuestionsXExams $questionsXExam)
    {
        $deleteForm = $this->createDeleteForm($questionsXExam);
        $editForm = $this->createForm('AppBundle\Form\QuestionsXExamsType', $questionsXExam);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('questionsxexams_edit', array('id' => $questionsXExam->getId()));
        }

        return $this->render('questionsxexams/edit.html.twig', array(
            'questionsXExam' => $questionsXExam,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a questionsXExam entity.
     *
     * @Route("/{id}", name="questionsxexams_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, QuestionsXExams $questionsXExam)
    {
        $form = $this->createDeleteForm($questionsXExam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($questionsXExam);
            $em->flush();
        }

        return $this->redirectToRoute('questionsxexams_index');
    }

    /**
     * Creates a form to delete a questionsXExam entity.
     *
     * @param QuestionsXExams $questionsXExam The questionsXExam entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(QuestionsXExams $questionsXExam)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('questionsxexams_delete', array('id' => $questionsXExam->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
