<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReactiesRepository")
 */
class Reacties
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $reactie_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $kamp_id;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $text;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReactieId(): ?int
    {
        return $this->reactie_id;
    }

    public function setReactieId(int $reactie_id): self
    {
        $this->reactie_id = $reactie_id;

        return $this;
    }

    public function getKampId(): ?int
    {
        return $this->kamp_id;
    }

    public function setKampId(int $kamp_id): self
    {
        $this->kamp_id = $kamp_id;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }
}
