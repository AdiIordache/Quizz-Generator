<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StudentAssesments
 *
 * @ORM\Table(name="student_assesments")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Student_AssesmentsRepository")
 */
class StudentAssesments
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
     * @ORM\Column(name="Student_Answer_Text", type="string", length=255)
     */
    private $studentAnswerText;

    /**
     * @var string
     *
     * @ORM\Column(name="Satisfactory_YN", type="string", length=1)
     */
    private $satisfactoryYN;

    /**
     * @var string
     *
     * @ORM\Column(name="Assesment", type="string", length=40)
     */
    private $assesment;

    /**
     * @var string
     *
     * @ORM\Column(name="Other_Details", type="string", length=255)
     */
    private $otherDetails;

    /**
     * @ORM\ManyToOne(targetEntity="ValidAnswers", inversedBy="student_assesments")
     * @ORM\JoinColumn(name="valid_answer_id", referencedColumnName="id")
     */
    private $valid_answer;
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
     * Set studentAnswerText
     *
     * @param string $studentAnswerText
     *
     * @return StudentAssesments
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
     * Set satisfactoryYN
     *
     * @param string $satisfactoryYN
     *
     * @return StudentAssesments
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
     * Set assesment
     *
     * @param string $assesment
     *
     * @return StudentAssesments
     */
    public function setAssesment($assesment)
    {
        $this->assesment = $assesment;

        return $this;
    }

    /**
     * Get assesment
     *
     * @return string
     */
    public function getAssesment()
    {
        return $this->assesment;
    }

    /**
     * Set otherDetails
     *
     * @param string $otherDetails
     *
     * @return StudentAssesments
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
    public function getSudentAssesment()
    {
        return $this->valid_answer;
    }

    /**
     * @param mixed $sudent_assesment
     */
    public function setSudentAssesment($sudent_assesment)
    {
        $this->sudent_assesment = $sudent_assesment;
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
    public function setValidAnswear($valid_answer)
    {
        $this->valid_answear = $valid_answer;
    }

}

