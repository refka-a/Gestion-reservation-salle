<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Beneficiary
 *
 * @ORM\Table(name="beneficiary")
 * @ORM\Entity
 */
class Beneficiary
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
     * @ORM\Column(name="beneficiary", type="string", length=255, nullable=false)
     */
    private $beneficiary;

    public function getBeneficiary(): ?string
    {
        return $this->beneficiary;
    }

    public function setBeneficiary(string $beneficiary): self
    {
        $this->beneficiary = $beneficiary;

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
 return (string) $this->getBeneficiary();
}



}
