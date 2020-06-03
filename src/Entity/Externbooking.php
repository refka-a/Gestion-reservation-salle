<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Externbooking
 *
 * @ORM\Table(name="externbooking", indexes={@ORM\Index(name="idsalle", columns={"id_salle"}), @ORM\Index(name="idtiming", columns={"id_timing"}), @ORM\Index(name="idbeneficiary", columns={"id_beneficiary"})})
 * @ORM\Entity
 */
class Externbooking
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
     * @ORM\Column(name="Raison_social", type="string", length=255, nullable=false)
     */
    private $raisonSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="string", length=1000, nullable=false)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_tel", type="integer", nullable=false)
     */
    private $numeroTel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="datetime", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="datetime", nullable=false)
     */
    private $datefin;

    /**
     * @var \Timing
     *
     * @ORM\ManyToOne(targetEntity="Timing")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_timing", referencedColumnName="id")
     * })
     */
    private $idTiming;

    /**
     * @var \Beneficiary
     *
     * @ORM\ManyToOne(targetEntity="Beneficiary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_beneficiary", referencedColumnName="id")
     * })
     */
    private $idBeneficiary;

    /**
     * @var \Salle
     *
     * @ORM\ManyToOne(targetEntity="Salle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_salle", referencedColumnName="id")
     * })
     */
    private $idSalle;
     /**
     * @var \Hours
     *
     * @ORM\ManyToOne(targetEntity="Hours")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_hours", referencedColumnName="id", nullable=true)
     * })
     */
    private $idHours;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonSocial(): ?string
    {
        return $this->raisonSocial;
    }

    public function setRaisonSocial(string $raisonSocial): self
    {
        $this->raisonSocial = $raisonSocial;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumeroTel(): ?int
    {
        return $this->numeroTel;
    }

    public function setNumeroTel(int $numeroTel): self
    {
        $this->numeroTel = $numeroTel;

        return $this;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(\DateTimeInterface $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDatefin(\DateTimeInterface $datefin): self
    {
        $this->datefin = $datefin;

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

    public function getIdSalle(): ?Salle
    {
        return $this->idSalle;
    }

    public function setIdSalle(?Salle $idSalle): self
    {
        $this->idSalle = $idSalle;

        return $this;
    }

    public function getIdHours(): ?Hours
    {
        return $this->idHours;
    }

    public function setIdHours(?Hours $idHours): self
    {
        $this->idHours = $idHours;

        return $this;
    }


}
