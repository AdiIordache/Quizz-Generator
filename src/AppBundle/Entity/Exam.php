<?php

namespace AppBundle\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * Exam
 *
 * @ORM\Table(name="exams")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExamRepository")
 */
class Exam
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
     * @ORM\Column(name="Exam_Date", type="datetime")
     */
    private $examDate;

    /**
     * @var string
     *
     * @ORM\Column(name="Exam_Name", type="string", length=255)
     */
    private $examName;

    /**
     * @var string
     *
     * @ORM\Column(name="Exam_Description", type="string", length=255)
     */
    private $examDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="Other_Details", type="string", length=255)
     */
    private $otherDetails;

    /**
     * @var QuestionsXExams[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="QuestionsXExams", mappedBy="exam")
     */
    private $examToQuestions;

    /**
     * @var ArrayCollection|Question[] $questions
     */
    private $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
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
     * Set examDate
     *
     * @param \DateTime $examDate
     *
     * @return Exam
     */
    public function setExamDate($examDate)
    {
        $this->examDate = $examDate;

        return $this;
    }

    /**
     * Get examDate
     *
     * @return \DateTime
     */
    public function getExamDate()
    {
        return $this->examDate;
    }

    /**
     * Set examName
     *
     * @param string $examName
     *
     * @return Exam
     */
    public function setExamName($examName)
    {
        $this->examName = $examName;

        return $this;
    }

    /**
     * Get examName
     *
     * @return string
     */
    public function getExamName()
    {
        return $this->examName;
    }

    /**
     * Set examDescription
     *
     * @param string $examDescription
     *
     * @return Exam
     */
    public function setExamDescription($examDescription)
    {
        $this->examDescription = $examDescription;

        return $this;
    }

    /**
     * Get examDescription
     *
     * @return string
     */
    public function getExamDescription()
    {
        return $this->examDescription;
    }

    /**
     * Set otherDetails
     *
     * @param string $otherDetails
     *
     * @return Exam
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
     * @return ArrayCollection|QuestionsXExams[]
     */
    public function getExamToQuestions()
    {
        return $this->examToQuestions;
    }
    /**
     * @return ArrayCollection|Exam[]
     */
    public function getQuestions()
    {
        $this->questions->clear();

        foreach ($this->getExamToQuestions() as $examMapping) {
            $this->questions->add($examMapping->getQuestion());
        }

        return $this->questions;
    }


    /**
     * @param QuestionsXExams $examToQuestions
     * @return Exam
     */
    public function setExamToQuestions($examToQuestions)
    {
        $this->examToQuestions = $examToQuestions;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->examName;
    }

}

