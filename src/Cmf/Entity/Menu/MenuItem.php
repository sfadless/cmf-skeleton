<?php

namespace Sfadless\Cmf\Entity\Menu;

use Doctrine\ORM\Mapping as ORM;
use Sfadless\Cmf\Entity\Traits\EntityIdTrait;
use Prodigious\Sonata\MenuBundle\Model\MenuItem as BaseMenuItem;

/**
 * MenuItem
 *
 * @ORM\Entity()
 * @ORM\Table(name="cmf__menu_items")
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class MenuItem extends BaseMenuItem
{
    use EntityIdTrait;
}