<?php

namespace Sfadless\Cmf\Block\ContentProvider;

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
}