<?php

namespace Sfadless\Cmf\Block\ContentProvider;

use Sfadless\Cmf\Block\Exception\DuplicateBlockContentProviderCodeException;

/**
 * ContentProviderManager
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class ContentProviderManager
{
    private $providers = [];

    /**
     * @param BlockContentProviderInterface $provider
     * @param string $code
     * @throws DuplicateBlockContentProviderCodeException
     */
    public function add(BlockContentProviderInterface $provider, string $code)
    {
        if (isset($this->providers[$code])) {
            throw new DuplicateBlockContentProviderCodeException(
                sprintf("Block content provider with code %s already exists.", $code)
            );
        }

        $this->providers[$code] = $provider;
    }

    public function get($code)
    {

    }

    public function getAll()
    {
        return $this->providers;
    }
}