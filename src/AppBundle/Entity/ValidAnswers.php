<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ValidAnswers
 *
 * @ORM\Table(name="valid_answers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Valid_AnswersRepository")
 */
class ValidAnswers
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
     * @ORM\Column(name="Valid_Answer_Text", type="string", length=255)
     */
    private $validAnswerText;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="valid_answer")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */
    private $question;

    /**
     * @ORM\OneToMany(targetEntity="StudentAssesments", mappedBy="valid_answer")
     */
    private $student_assesments;



    public function __construct()
    {
        $this->question = new ArrayCollection();

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
     * Set validAnswerText
     *
     * @param string $validAnswerText
     *
     * @return ValidAnswers
     */
    public function setValidAnswerText($validAnswerText)
    {
        $this->validAnswerText = $validAnswerText;

        return $this;
    }

    /**
     * Get validAnswerText
     *
     * @return string
     */
    public function getValidAnswerText()
    {
        return $this->validAnswerText;
    }

    /**
     * @return mixed
     */
    public function getValidAnswer()
    {
        return $this->student_assesments;
    }

    /**
     * @param mixed $valid_answer
     */
    public function setValidAnswer($valid_answer)
    {
        $this->valid_answer = $valid_answer;
    }

    /**
     * @return mixed
     */
    public function getValidAnswers()
    {
        return $this->student_assesments;
    }

    /**
     * @param mixed $valid_answers
     */
    public function setValidAnswers($valid_answers)
    {
        $this->valid_answers = $valid_answers;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

}

