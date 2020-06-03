<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Timing
 *
 * @ORM\Table(name="timing")
 * @ORM\Entity
 */
class Timing
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
     * @var string
     *
     * @ORM\Column(name="timing", type="string", length=255, nullable=false)
     */
    private $timing;

    public function getTiming(): ?string
    {
        return $this->timing;
    }

    public function setTiming(string $timing): self
    {
        $this->timing = $timing;

        return $this;
    }

    public function getId(): ?Pricing
    {
        return $this->id;
    }

    public function setId(?Pricing $id): self
    {
        $this->id = $id;

        return $this;
    }

public function __toString()
{
 return (string) $this->getTiming();
}

}
