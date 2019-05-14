<?php

namespace Sfadless\Cmf\Entity\Menu;

use Doctrine\ORM\Mapping as ORM;
use Sfadless\Cmf\Entity\Traits\EntityIdTrait;
use Prodigious\Sonata\MenuBundle\Model\Menu as BaseMenu;

/**
 * Menu
 *
 * @ORM\Entity()
 * @ORM\Table(name="cmf__menu")
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class Menu extends BaseMenu
{
    use EntityIdTrait;
}