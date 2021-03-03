<?php

namespace Werner\DoctrineORM\Entity;

/**
 * @Entity
 */
class Phone
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private ?int $id;

    /**
     * @Column(type="string", length=2)
     */
    private string $areaCode;

    /**
     * @Column(type="string", length=11)
     */
    private string $number;

    /**
     * @ManyToOne(targetEntity="Student")
     */
    private $student;

    public function __construct(?int $id, string $areaCode, string $number)
    {
        $this->id = $id;
        $this->areaCode = $areaCode;
        $this->number = $number;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getAreaCode(): string
    {
        return $this->areaCode;
    }

    public function setAreaCode(string $areaCode): self
    {
        $this->areaCode = $areaCode;

        return $this;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getFormattedPhone(): string
    {
        $phone = "({$this->areaCode}) {$this->number}";

        return $phone;
    }

    public function getStudent(): Student
    {
        return $this->student;
    }

    public function setStudent(Student $student): self
    {
        $this->student = $student;

        return $this;
    }
}
