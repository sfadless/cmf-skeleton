<?php

namespace Sfadless\Cmf\Sortable;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Item
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class Item implements \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $parentId;

    /**
     * @var Collection
     */
    private $children;

    /**
     * Item constructor.
     * @param int $id
     * @param string $name
     * @param int $parentId
     */
    public function __construct(int $id, string $name, int $parentId = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parentId = $parentId;
        $this->children = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    /**
     * @return Collection
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'title' => $this->name,
            'parentId' => $this->parentId,
            'children' => $this->children->toArray()
        ];
    }
}