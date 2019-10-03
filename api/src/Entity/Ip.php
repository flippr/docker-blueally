<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\IpRepository")
 */
class Ip
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
    private $ip;

    /**
     * @Groups({"subnet:output", "subnet:input"})
     * @ORM\Column(name="address_tag", type="string", length=255)
     */
    private $addressTag;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Subnet", inversedBy="ips")
     */
    private $subnet;

    public function __toString()
    {
        return (string)$this->getIp();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getAddressTag(): ?string
    {
        return $this->addressTag;
    }

    public function setAddressTag(string $addressTag): self
    {
        $this->addressTag = $addressTag;

        return $this;
    }

    public function getSubnet(): ?Subnet
    {
        return $this->subnet;
    }

    public function setSubnet(?Subnet $subnet): self
    {
        $this->subnet = $subnet;

        return $this;
    }
}
