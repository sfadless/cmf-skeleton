<?php

namespace Sfadless\Cmf\Admin;

use Sfadless\Cmf\Entity\Content;
use Sfadless\Cmf\Entity\Tag;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\Form\Type\DatePickerType;
use Sonata\Form\Validator\ErrorElement;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * ContentAdmin
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class ContentAdmin extends AbstractAdmin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->add('tree', 'tree')
        ;
    }

    public function configureFormFields(FormMapper $form)
    {
        $form
            ->tab("Общее")
                ->with('Основные настройки', [
                    'class'       => 'col-md-8',
                    'box_class'   => 'box box-solid box-primary',
                ])
                    ->add('name', TextType::class, ['label' => 'Название'])
                    ->add('content', CKEditorType::class, ['label' => 'Контент'])

                ->end()
                ->with('Дополнительные настройки', [
                    'class'       => 'col-md-4',
                    'box_class'   => 'box box-solid box-primary',
                ])
                    ->add('template', ChoiceType::class, ['label' => 'Шаблон', 'choices' => $this->getPageTemplates(), 'empty_data' => ''])
                    ->add('route', TextType::class, [
                        'label' => 'Настройки Url',
                    ])
                    ->add('createdAt', DatePickerType::class, ['label' => 'Дата создания', 'format' => 'YYYY-MM-dd'])
                    ->add('tags',  ModelType::class, [
                        'required' => false,
                        'multiple' => true,
                        'class' => Tag::class,
                        'property' => 'name',
                        'label' => 'Теги',
                        'btn_add' => "Добавить",
                        'btn_delete' => true
                    ])
                ->end()
            ->end()
            ->tab('SEO')
                ->with('SEO', [
                    'box_class'   => 'box box-solid box-primary',
                ])
                    ->add('title', TextType::class, ['label' => 'Title', 'required' => false])
                    ->add('description', TextareaType::class, ['label' => 'Description', 'required' => false])
                    ->add('keywords', TextareaType::class, ['label' => 'Keywords', 'required' => false])
                    ->add('showInSitemap', CheckboxType::class, ['label' => 'Отображать в sitemap.xml', 'required' => false])
                ->end()
            ->end()
        ;
    }

    public function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('tags')
        ;
    }

    /**
     * @param ErrorElement $errorElement
     * @param $object Content
     */
    public function validate(ErrorElement $errorElement, $object)
    {
        if ('' === $object->getTemplate()) {
            $errorElement->addViolation('Не выбран шаблон');
        }
    }

    /**
     * @return array
     */
    protected function getPageTemplates()
    {
        $templates = $this->getConfigurationPool()->getContainer()->getParameter('cmf.page.templates');
        $choices = ['Выберите' => ''];

        foreach ($templates as $template) {
            $choices[$template['name']] = $template['path'];
        }

        return $choices;
    }

    public function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('name', null, ['label' => 'Название'])
            ->addIdentifier('route', null, ['label' => 'Url'])
            ->add('tags', null, ['associated_property' => 'name', 'label' => 'Теги'])
        ;
    }
}