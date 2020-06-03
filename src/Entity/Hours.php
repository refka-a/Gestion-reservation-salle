<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hours
 *
 * @ORM\Table(name="hours")
 * @ORM\Entity
 */
class Hours
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="hours", type="integer", nullable=false)
     */
    private $hours;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHours(): ?int
    {
        return $this->hours;
    }

    public function setHours(int $hours): self
    {
        $this->hours = $hours;

        return $this;
    }


}
