<?php

namespace Sfadless\Cmf\Block\ContentProvider;

/**
 * BlockContentProviderInterface
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
interface BlockContentProviderInterface
{
    public function getMetadata() : Metadata;
}