<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Students
 *
 * @ORM\Table(name="students")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StudentsRepository")
 */
class Students
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
     * @ORM\Column(name="First_Name", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="Middle_Name", type="string", length=255)
     */
    private $middleName;

    /**
     * @var string
     *
     * @ORM\Column(name="Last_Name", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="Gender", type="string", length=1)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="Student_Address", type="string", length=255)
     */
    private $studentAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="Email_Adress", type="string", length=255)
     */
    private $emailAdress;

    /**
     * @var string
     *
     * @ORM\Column(name="Cell_Mobile_Phone", type="string", length=255)
     */
    private $cellMobilePhone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Other_Details", type="datetime")
     */
    private $otherDetails;

    /**
     * @ORM\OneToMany(targetEntity="StudentAnswers", mappedBy="student")
     */
    private $student_answers;



    public function __construct()
    {
        $this->student_answers = new ArrayCollection();

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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Students
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     *
     * @return Students
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get middleName
     *
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Students
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Students
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set studentAddress
     *
     * @param string $studentAddress
     *
     * @return Students
     */
    public function setStudentAddress($studentAddress)
    {
        $this->studentAddress = $studentAddress;

        return $this;
    }

    /**
     * Get studentAddress
     *
     * @return string
     */
    public function getStudentAddress()
    {
        return $this->studentAddress;
    }

    /**
     * Set emailAdress
     *
     * @param string $emailAdress
     *
     * @return Students
     */
    public function setEmailAdress($emailAdress)
    {
        $this->emailAdress = $emailAdress;

        return $this;
    }

    /**
     * Get emailAdress
     *
     * @return string
     */
    public function getEmailAdress()
    {
        return $this->emailAdress;
    }

    /**
     * Set cellMobilePhone
     *
     * @param string $cellMobilePhone
     *
     * @return Students
     */
    public function setCellMobilePhone($cellMobilePhone)
    {
        $this->cellMobilePhone = $cellMobilePhone;

        return $this;
    }

    /**
     * Get cellMobilePhone
     *
     * @return string
     */
    public function getCellMobilePhone()
    {
        return $this->cellMobilePhone;
    }

    /**
     * Set otherDetails
     *
     * @param \DateTime $otherDetails
     *
     * @return Students
     */
    public function setOtherDetails($otherDetails)
    {
        $this->otherDetails = $otherDetails;

        return $this;
    }

    /**
     * Get otherDetails
     *
     * @return \DateTime
     */
    public function getOtherDetails()
    {
        return $this->otherDetails;
    }

    /**
     * @return mixed
     */
    public function getStudentAnswers()
    {
        return $this->student_answers;
    }

    /**
     * @param mixed $student_answers
     */
    public function setStudentAnswers($student_answers)
    {
        $this->student_answers = $student_answers;
    }



}

