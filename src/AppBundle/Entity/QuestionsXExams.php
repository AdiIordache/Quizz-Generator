<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questions_in_Exams
 *
 * @ORM\Entity
 * @ORM\Table(name="questions_in_exams")
 */
class QuestionsXExams
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Exam
     *
     * @ORM\ManyToOne(targetEntity="Exam", inversedBy="examToQuestions")
     * @ORM\JoinColumn(name="exam_id", referencedColumnName="id")
     */
    private $exam;

    /**
     * @var Question
     *
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="questionToExams")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */
    private $question;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Exam
     */
    public function getExam()
    {
        return $this->exam;
    }

    /**
     * @param Exam $exam
     * @return QuestionsXExams
     */
    public function setExam($exam)
    {
        $this->exam = $exam;
        return $this;
    }

    /**
     * @return Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param Question $question
     * @return QuestionsXExams
     */
    public function setQuestion($question)
    {
        $this->question = $question;
        return $this;
    }

}

