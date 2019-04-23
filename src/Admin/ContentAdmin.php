<?php

namespace App\Admin;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * ContentAdmin
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class ContentAdmin extends AbstractAdmin
{
    public function configureFormFields(FormMapper $form)
    {
        $form
            ->add('content', CKEditorType::class)
        ;
    }

    public function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('id');
    }
}