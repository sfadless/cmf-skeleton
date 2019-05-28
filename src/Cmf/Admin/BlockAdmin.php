<?php

namespace Sfadless\Cmf\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * BlockAdmin
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class BlockAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'block';

//    protected function configureRoutes(RouteCollection $collection)
//    {
//        $collection->add('content', $this->getRouterIdParameter() . '/content');
//    }

    public function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('code', null, ['label' => 'Символьный код'])
            ->addIdentifier('name', null, ['label' => 'Название'])
            ->add('_action', null, [
                'label' => 'Действия',
                'actions' => [
                    'delete' => [],
                    'content' => [
                        'route' => 'content',
                        'template' => '/admin/CRUD/content.twig'
                    ]
                ]
            ])
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

    public function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('code', null, ['label' => 'Символьный код'])
            ->add('name', null, ['label' => 'Название'])
        ;
    }
}