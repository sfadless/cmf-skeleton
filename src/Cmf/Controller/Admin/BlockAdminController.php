<?php

namespace Sfadless\Cmf\Controller\Admin;

use Sonata\AdminBundle\Controller\CRUDController;

/**
 * BlockAdminController
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class BlockAdminController extends CRUDController
{
    public function contentAction($id)
    {
        dump($this->admin->getSubject());

        die();
    }
}