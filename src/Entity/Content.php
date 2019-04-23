<?php

namespace App\Entity;

use App\Entity\Traits\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Content
 *
 * @ORM\Entity()
 * @ORM\Table(name="cmf__content")
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class Content
{
    use EntityIdTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="text", name="content")
     */
    private $content;

    /**
     * @return string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Content
     */
    public function setContent(string $content): Content
    {
        $this->content = $content;
        return $this;
    }
}