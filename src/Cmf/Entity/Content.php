<?php

namespace Sfadless\Cmf\Entity;

use DateTime;
use Sfadless\Cmf\Entity\Traits\EntityIdTrait;
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
     * @var string
     *
     * @ORM\Column(type="string", name="route", unique=true)
     */
    private $route;

    /**
     * @var string
     *
     * @ORM\Column(type="text", name="content", nullable=true)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(type="text", name="template", nullable=false)
     */
    private $template;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="\Sfadless\Cmf\Entity\Tag", cascade={"all"})
     * @ORM\JoinTable(name="cmf__content_tags",
     *     joinColumns={@ORM\JoinColumn(name="post_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     * )
     */
    private $tags;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="date", name="created_at", nullable=true)
     */
    private $createdAt;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->createdAt = new DateTime();
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): ? DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     * @return Content
     */
    public function setCreatedAt(DateTime $createdAt): Content
    {
        $this->createdAt = $createdAt;
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
     * @return Content
     */
    public function setTemplate(string $template): Content
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRoute(): ?string
    {
        return $this->route;
    }

    /**
     * @param string $route
     * @return Content
     */
    public function setRoute(string $route): Content
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

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Content
     */
    public function setName(string $name): Content
    {
        $this->name = $name;
        return $this;
    }
}