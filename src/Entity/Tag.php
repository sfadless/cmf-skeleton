<?php

namespace App\Entity;

use App\Entity\Traits\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Entity()
 * @ORM\Table(name="cmf__tags")
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class Tag
{
    use EntityIdTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="name", unique=true)
     */
    private $name;

    /**
     * @return mixed
     */
    public function getName() : ?string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Tag
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
}