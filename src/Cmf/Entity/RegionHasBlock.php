<?php

namespace Sfadless\Cmf\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sfadless\Cmf\Entity\Traits\EntityIdTrait;

/**
 * RegionHasBlock
 *
 * @ORM\Entity()
 * @ORM\Table(name="cmf__region_blocks")
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class RegionHasBlock
{
    use EntityIdTrait;

    /**
     * @var Block
     *
     * @ORM\ManyToOne(targetEntity="\Sfadless\Cmf\Entity\Block")
     * @ORM\JoinColumn(name="block_id", referencedColumnName="id")
     */
    private $block;

    /**
     * @var Region
     *
     * @ORM\ManyToOne(targetEntity="\Sfadless\Cmf\Entity\Region", inversedBy="regionHasBlocks")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    private $region;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false, name="position")
     */
    private $position = 0;

    /**
     * @return Block
     */
    public function getBlock(): ?Block
    {
        return $this->block;
    }

    /**
     * @param Block $block
     * @return RegionHasBlock
     */
    public function setBlock(?Block $block): RegionHasBlock
    {
        $this->block = $block;
        return $this;
    }

    /**
     * @return Region
     */
    public function getRegion(): ?Region
    {
        return $this->region;
    }

    /**
     * @param Region $region
     * @return RegionHasBlock
     */
    public function setRegion(?Region $region): RegionHasBlock
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return RegionHasBlock
     */
    public function setPosition(int $position): RegionHasBlock
    {
        $this->position = $position;
        return $this;
    }
}