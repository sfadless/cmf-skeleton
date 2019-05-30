<?php

namespace Sfadless\Cmf\Block\ContentProvider;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sfadless\Cmf\Entity\Block;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * CKEditorContentProvider
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class CKEditorContentProvider implements BlockContentProviderInterface
{
    const CODE = 'cmf.block.provider.ckeditor';
    const NAME = 'Редактор текста';
    const ICON = '<i class="fa fa-file-text" aria-hidden="true"></i>';

    public function getMetadata(): Metadata
    {
        return new Metadata(static::CODE, static::ICON, static::NAME);
    }

    public function configureFormFields(FormMapper $mapper, Block $object)
    {
        $mapper
            ->add('content', CKEditorType::class, ['label' => 'Контент'])
        ;
    }
}