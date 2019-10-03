<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"subnet:output"}},
 *     denormalizationContext={"groups"={"subnet:input"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\SubnetRepository")
 */
class Subnet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"subnet:output", "subnet:input"})
     * @ORM\Column(type="string", length=255)
     */
    private $subnet;

    /**
     * @Groups({"subnet:output", "subnet:input"})
     * @ORM\Column(type="integer")
     */
    private $cidr;

    /**
     * @Groups({"subnet:output", "subnet:input"})
     * @ORM\OneToMany(targetEntity="App\Entity\Ip", mappedBy="subnet", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $ips;

    public function __construct()
    {
        $this->ips = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubnet(): ?string
    {
        return $this->subnet;
    }

    public function setSubnet(string $subnet): self
    {
        $this->subnet = $subnet;

        return $this;
    }

    public function getCidr(): ?int
    {
        return $this->cidr;
    }

    public function setCidr(int $cidr): self
    {
        $this->cidr = $cidr;

        return $this;
    }

    /**
     * @return Collection|Ip[]
     */
    public function getIps(): Collection
    {
        return $this->ips;
    }

    public function addIp(Ip $ip): self
    {
        if (!$this->ips->contains($ip)) {
            $this->ips[] = $ip;
            $ip->setSubnet($this);
        }

        return $this;
    }

    public function removeIp(Ip $ip): self
    {
        if ($this->ips->contains($ip)) {
            $this->ips->removeElement($ip);
            // set the owning side to null (unless already changed)
            if ($ip->getSubnet() === $this) {
                $ip->setSubnet(null);
            }
        }

        return $this;
    }
}
