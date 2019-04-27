<?php

namespace Sfadless\Cmf\Entity;

use Sfadless\Cmf\Entity\Traits\EntityIdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Seo
 *
 * @ORM\Entity()
 * @ORM\Table(name="cmf__seo")
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class Seo
{
    use EntityIdTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="title", nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text", name="description", nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="breadcrumbs_name", nullable=true)
     */
    private $breadcrumbsName;

    /**
     * @var string
     *
     * @ORM\Column(type="text", name="keywords", nullable=true)
     */
    private $keywords;

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Seo
     */
    public function setTitle(string $title): Seo
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Seo
     */
    public function setDescription(string $description): Seo
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getBreadcrumbsName(): ?string
    {
        return $this->breadcrumbsName;
    }

    /**
     * @param string $breadcrumbsName
     * @return Seo
     */
    public function setBreadcrumbsName(string $breadcrumbsName): Seo
    {
        $this->breadcrumbsName = $breadcrumbsName;
        return $this;
    }

    /**
     * @return string
     */
    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     * @return Seo
     */
    public function setKeywords(string $keywords): Seo
    {
        $this->keywords = $keywords;
        return $this;
    }
}