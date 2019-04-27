<?php

namespace Sfadless\Cmf\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * BlockAdmin
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class BlockAdmin extends AbstractAdmin
{
    public function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('code', null, ['label' => 'Символьный код'])
            ->addIdentifier('name', null, ['label' => 'Название'])
        ;
    }

    public function configureFormFields(FormMapper $form)
    {
        $form
            ->add('code', TextType::class, ['label' => 'Символьный код'])
            ->add('name', TextType::class, ['label' => 'Название'])
            ->add('template', TextType::class, ['label' => 'Шаблон', 'required' => false])
        ;
    }
}