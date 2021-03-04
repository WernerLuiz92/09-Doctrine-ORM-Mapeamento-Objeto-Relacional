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
     * @OneToMany(targetEntity="Phone", mappedBy="student", cascade={"remove", "persist"})
     */
    private Collection $phones;

    public function __construct()
    {
        $this->phones = new ArrayCollection();
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

    public function getPhonesArray(): array
    {
        $phonesArray = $this
        ->getPhones()
        ->map(function (Phone $phone) {
            return $phone->getFormattedPhone();
        })
        ->toArray();

        return $phonesArray;
    }
}
