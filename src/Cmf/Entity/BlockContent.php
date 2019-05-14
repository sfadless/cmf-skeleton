<?php

namespace Sfadless\Cmf\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sfadless\Cmf\Entity\Traits\EntityIdTrait;

/**
 * BlockContent
 *
 * @ORM\Entity()
 * @ORM\Table(name="cmf__blocks_content")
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class BlockContent
{
    use EntityIdTrait;

    /**
     * @var Block
     *
     * @ORM\ManyToOne(targetEntity="Sfadless\Cmf\Entity\Block", inversedBy="content")
     * @ORM\JoinColumn(name="block_id", referencedColumnName="id")
     */
    private $block;

    /**
     * @var string
     *
     * @ORM\Column(type="text", name="data", nullable=true)
     */
    private $data;

    /**
     * @return Block
     */
    public function getBlock(): ?Block
    {
        return $this->block;
    }

    /**
     * @param Block $block
     * @return BlockContent
     */
    public function setBlock(Block $block): BlockContent
    {
        $this->block = $block;
        return $this;
    }

    /**
     * @return string
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @param string $data
     * @return BlockContent
     */
    public function setData(string $data): BlockContent
    {
        $this->data = $data;
        return $this;
    }
}