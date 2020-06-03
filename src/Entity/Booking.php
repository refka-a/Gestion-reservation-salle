<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 *
 * @ORM\Table(name="booking", indexes={@ORM\Index(name="IDX_E00CEDDEDC304035", columns={"salle_id"}), @ORM\Index(name="IDX_E00CEDDEA76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class Booking
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
     * @var \Datetime
     *
     * @Assert\Type(
     *      type = "\DateTime",
     *      
     *     
     * )
     * @Assert\GreaterThanOrEqual(
     *      value = "now",
     *      message = "impossible de selectionner une date passé"
     * )
     * @ORM\Column(name="begin_at", type="datetime")
     */
    public $beginAt;

    /**
     * @var \Datetime
     * @Assert\Type(
     *      type = "\DateTime",
     *      
     *     
     * )
     * $beginAt->format('Y-m-d H:i:s');
     * @Assert\Expression("value > this.beginAt")
     * 
     * 
     * @ORM\Column(name="end_at", type="datetime")
     */
    private $endAt;
    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Salle
     *
     * @ORM\ManyToOne(targetEntity="Salle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="salle_id", referencedColumnName="id")
     * })
     */
    private $salle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeginAt(): ?\DateTimeInterface
    {
       // $min->getBeginAt()->format('Y-m-d H:i');
        return $this->beginAt;
    }

    public function setBeginAt(\DateTime $beginAt = null): self
    {
        $this->beginAt = $beginAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(?\DateTimeInterface $endAt): self
    {
        $this->endAt = $endAt;

        return $this;
    }


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $salle): self
    {
        $this->salle = $salle;

        return $this;
    }
public function reverseTransform($beginAt)
    {
        // datetime optional
        if (!$beginAt) {
            return;
        }

        return date_create_from_format('d/m/Y H:i', $beginAt, new \DateTimeZone('Europe/Madrid'));
       if (!$endAt) {
            return;
        }

        return date_create_from_format('d/m/Y H:i', $endAt, new \DateTimeZone('Europe/Madrid'));
    }
   
public function  __construct()
{
$this->beginAt = new \DateTime('now');    
$this->endAt = new \DateTime('now');   
}
}
