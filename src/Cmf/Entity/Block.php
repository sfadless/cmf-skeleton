<?php

namespace Sfadless\Cmf\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sfadless\Cmf\Entity\Traits\EntityIdTrait;

/**
 * Block
 *
 * @ORM\Entity()
 * @ORM\Table(name="cmf__blocks")
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class Block
{
    use EntityIdTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="code", nullable=false, unique=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="name", nullable=false, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="template", nullable=true)
     */
    private $template;

    /**
     * @return string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Block
     */
    public function setCode(string $code): Block
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Block
     */
    public function setName(string $name): Block
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplate(): ?string
    {
        return $this->template;
    }

    /**
     * @param string $template
     * @return Block
     */
    public function setTemplate(string $template): Block
    {
        $this->template = $template;
        return $this;
    }

    public function __toString()
    {
        return $this->code;
    }
}