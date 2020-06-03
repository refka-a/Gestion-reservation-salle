<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pricing
 *
 * @ORM\Table(name="pricing", indexes={@ORM\Index(name="idsalle", columns={"idsalle"}), @ORM\Index(name="idbeneficiary", columns={"idbeneficiary"}), @ORM\Index(name="idtiming", columns={"idtiming"})})
 * @ORM\Entity
 */
class Pricing
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
     * @var \Timing
     *
     * @ORM\ManyToOne(targetEntity="Timing")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idtiming", referencedColumnName="id")
     * })
     */
    private $idTiming;

    /**
     * @var \Beneficiary
     *
     * @ORM\ManyToOne(targetEntity="Beneficiary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idbeneficiary", referencedColumnName="id")
     * })
     */
    private $idBeneficiary;

    /**
     * @var \Salle
     *
     * @ORM\ManyToOne(targetEntity="Salle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idsalle", referencedColumnName="id")
     * })
     */
    private $idSalle;


    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSalle(): ?Salle
    {
        return $this->idSalle;
    }

    public function setIdSalle(?Salle $idSalle): self
    {
        $this->idSalle = $idSalle;

        return $this;
    }

    public function getIdTiming(): ?Timing
    {
        return $this->idTiming;
    }

    public function setIdTiming(?Timing $idTiming): self
    {
        $this->idTiming = $idTiming;

        return $this;
    }

    public function getIdBeneficiary(): ?Beneficiary
    {
        return $this->idBeneficiary;
    }

    public function setIdBeneficiary(?Beneficiary $idBeneficiary): self
    {
        $this->idBeneficiary = $idBeneficiary;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }


}
