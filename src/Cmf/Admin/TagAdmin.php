<?php

namespace Sfadless\Cmf\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * TagAdmin
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class TagAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $form
     */
    public function configureFormFields(FormMapper $form)
    {
        $form
            ->add('name', TextType::class, ['label' => 'Название'])
        ;
    }

    /**
     * @param ListMapper $list
     */
    public function configureListFields(ListMapper $list)
    {
        $list
            ->add('name', null, [
                'label' => 'Название',
                'editable' => true
            ])
            ->add('_action', 'actions', [
                'label' => 'Действия',
                'actions' => [
                    'delete' => [],
                ]
            ])
        ;
    }
}