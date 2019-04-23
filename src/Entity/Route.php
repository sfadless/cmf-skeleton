<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Orm\Route as RouteModel;

/**
 * Route
 *
 * @ORM\Entity()
 * @ORM\Table(name="cmf__routes")
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class Route extends RouteModel
{
    /**
     * @var integer
     *
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="name", unique=true)
     */
    protected $name;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="position", nullable=true)
     */
    protected $position;

    /**
     * @return string
     */
    public function getName(): ? string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Route
     */
    public function setName($name): Route
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return Route
     */
    public function setPosition($position): Route
    {
        $this->position = $position;
        return $this;
    }
}