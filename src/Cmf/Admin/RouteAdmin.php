<?php

namespace Sfadless\Cmf\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * RouteAdmin
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class RouteAdmin extends AbstractAdmin
{
    public function configureFormFields(FormMapper $form)
    {
        $form->add('staticPrefix', TextType::class, ['label' => 'Url']);
    }
}