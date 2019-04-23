<?php

namespace App\Entity;

use App\Entity\Traits\EntityIdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var Route
     *
     * @ORM\OneToOne(targetEntity="\App\Entity\Route", cascade={"all"})
     * @ORM\JoinColumn(name="route_id", referencedColumnName="id")
     */
    private $route;

    /**
     * @var string
     *
     * @ORM\Column(type="text", name="content", nullable=true)
     */
    private $content;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="\App\Entity\Tag", cascade={"all"})
     * @ORM\JoinTable(name="posts_tags",
     *     joinColumns={@ORM\JoinColumn(name="post_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     * )
     */
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    /**
     * @return Route
     */
    public function getRoute(): ?Route
    {
        return $this->route;
    }

    /**
     * @param Route $route
     * @return Content
     */
    public function setRoute(Route $route): Content
    {
        $this->route = $route;
        return $this;
    }

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

    /**
     * @return Collection
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    /**
     * @param Tag $tag
     * @return $this
     */
    public function addTag(Tag $tag)
    {
        $this->tags->add($tag);

        return $this;
    }
}