<?php

namespace Sfadless\Cmf\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

/**
 * BlockContentAdmin
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class BlockContentAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'block/block_content';

    public function configureFormFields(FormMapper $form)
    {
        $form
            ->add('data', TextareaType::class, ['label' => 'Контент'])
        ;
    }

    public function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('block')
        ;
    }
}