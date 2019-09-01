<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Questions
 *
 * @ORM\Table(name="questions")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
 */
class Question
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
     * @var string
     *
     * @ORM\Column(name="Question_Text", type="string", length=255)
     */
    private $questionText;

    /**
     * @var string
     *
     * @ORM\Column(name="Other_Details", type="string", length=255)
     */
    private $otherDetails;

    /**
     * @var QuestionsXExams[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="QuestionsXExams", mappedBy="question")
     */
    private $questionToExams;

    /**
     * @var ArrayCollection|Exam[] $exams
     */
    private $exams;

    /**
     * @var ArrayCollection|ValidAnswers[]
     *
     * @ORM\OneToMany(targetEntity="ValidAnswers", mappedBy="question")
     */
    private $valid_answer;

    public function __construct()
    {
        $this->questionToExams = new ArrayCollection();
        $this->valid_answer = new ArrayCollection();
        $this->exams = new ArrayCollection();

    }

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
     * Set questionText
     *
     * @param string $questionText
     *
     * @return Question
     */
    public function setQuestionText($questionText)
    {
        $this->questionText = $questionText;

        return $this;
    }

    /**
     * Get questionText
     *
     * @return string
     */
    public function getQuestionText()
    {
        return $this->questionText;
    }

    /**
     * Set otherDetails
     *
     * @param string $otherDetails
     *
     * @return Question
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
     * @return QuestionsXExams[]|ArrayCollection
     */
    public function getQuestionToExams()
    {
        return $this->questionToExams;
    }

    /**
     * @param QuestionsXExams $questionToExams
     */
    public function setQuestionToExams($questionToExams)
    {
        $this->questionToExams = $questionToExams;
    }

    /**
     * @return ArrayCollection|Exam[]
     */
    public function getExams()
    {
        $this->exams->clear();
        dump($this->getQuestionToExams());
        foreach ($this->getQuestionToExams() as $questionMapping) {
            $this->exams->add($questionMapping->getExam());
        }

        return $this->exams;
    }

    /**
     * @return m
     */
    public function getValidAnswear()
    {
        return $this->valid_answer;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->questionText;
    }

    /**
     * @return mixed
     */
    public function getValidAnswer()
    {
        return $this->valid_answer;
    }

    /**
     * @param mixed $valid_answer
     */
    public function setValidAnswer($valid_answer)
    {
        $this->valid_answer = $valid_answer;
    }

}

