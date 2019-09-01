<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StudentAnswers
 *
 * @ORM\Table(name="student_answers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Student_AnswersRepository")
 */
class StudentAnswers
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
     * @var \DateTime
     *
     * @ORM\Column(name="Date_of_Answer", type="datetime")
     */
    private $dateOfAnswer;

    /**
     * @var string
     *
     * @ORM\Column(name="Comments", type="string", length=255)
     */
    private $comments;

    /**
     * @var string
     *
     * @ORM\Column(name="Satisfactory_YN", type="string", length=1)
     */
    private $satisfactoryYN;

    /**
     * @var string
     *
     * @ORM\Column(name="Student_Answer_Text", type="string", length=255)
     */
    private $studentAnswerText;

    /**
     * @var string
     *
     * @ORM\Column(name="Other_Details", type="string", length=255)
     */
    private $otherDetails;

    /**
     * @ORM\ManyToOne(targetEntity="Students", inversedBy="student_answers")
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     */
    private $student;

    /**
     * @var QuestionsXExams
     *
     * @ORM\ManyToOne(targetEntity="QuestionsXExams")
     * @ORM\JoinColumn(name="question_exam_id", referencedColumnName="id")
     */
    private $questionToExam;


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
     * @return QuestionsXExams
     */
    public function getQuestionToExam()
    {
        return $this->questionToExam;
    }

    /**
     * @param QuestionsXExams $questionToExam
     * @return StudentAnswers
     */
    public function setQuestionToExam($questionToExam)
    {
        $this->questionToExam = $questionToExam;
        return $this;
    }

    /**
     * @return Exam
     */
    public function getExam()
    {
        return $this->getQuestionToExam()->getExam();
    }

    /**
     * @return Question
     */
    public function getQuestion()
    {
        return $this->getQuestionToExam()->getQuestion();
    }

    /**
     * Set dateOfAnswer
     *
     * @param \DateTime $dateOfAnswer
     *
     * @return StudentAnswers
     */
    public function setDateOfAnswer($dateOfAnswer)
    {
        $this->dateOfAnswer = $dateOfAnswer;

        return $this;
    }

    /**
     * Get dateOfAnswer
     *
     * @return \DateTime
     */
    public function getDateOfAnswer()
    {
        return $this->dateOfAnswer;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return StudentAnswers
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set satisfactoryYN
     *
     * @param string $satisfactoryYN
     *
     * @return StudentAnswers
     */
    public function setSatisfactoryYN($satisfactoryYN)
    {
        $this->satisfactoryYN = $satisfactoryYN;

        return $this;
    }

    /**
     * Get satisfactoryYN
     *
     * @return string
     */
    public function getSatisfactoryYN()
    {
        return $this->satisfactoryYN;
    }

    /**
     * Set studentAnswerText
     *
     * @param string $studentAnswerText
     *
     * @return StudentAnswers
     */
    public function setStudentAnswerText($studentAnswerText)
    {
        $this->studentAnswerText = $studentAnswerText;

        return $this;
    }

    /**
     * Get studentAnswerText
     *
     * @return string
     */
    public function getStudentAnswerText()
    {
        return $this->studentAnswerText;
    }

    /**
     * Set otherDetails
     *
     * @param string $otherDetails
     *
     * @return StudentAnswers
     */
    public function setOtherDetails($otherDetails)
    {
        $this->otherDetails = $otherDetails;

        return $this;
    }

    /**
     * Get otherDetails
     *
     * @return string
     */
    public function getOtherDetails()
    {
        return $this->otherDetails;
    }

    /**
     * @return mixed
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @param mixed $student
     */
    public function setStudent($student)
    {
        $this->student = $student;
    }

}

