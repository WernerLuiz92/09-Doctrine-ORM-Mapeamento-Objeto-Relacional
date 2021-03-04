<?php

namespace Werner\DoctrineORM\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
 */
class Student
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(type="string", nullable=true)
     */
    private string $name;

    /**
     * @OneToMany(targetEntity="Phone", mappedBy="student", cascade={"remove", "persist"}, fetch="EAGER")
     */
    private Collection $phones;

    /**
     * @ManyToMany(targetEntity="Course", mappedBy="students")
     */
    private Collection $courses;

    public function __construct()
    {
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function addPhone(Phone $phone): self
    {
        $this->phones->add($phone);
        $phone->setStudent($this);

        return $this;
    }

    public function getPhones(): Collection
    {
        return $this->phones;
    }

    public function addCourse(Course $course): self
    {
        if ($this->courses->contains($course)) {
            return $this;
        }
        $this->courses->add($course);
        $course->addStudent($this);

        return $this;
    }

    public function getCourses(): Collection
    {
        return $this->courses;
    }
}
