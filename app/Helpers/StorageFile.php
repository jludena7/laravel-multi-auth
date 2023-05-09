<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class StorageFile
{
    const AVATAR_INTERNAL = 'avatar_internal';
    const AVATAR_SITE = 'avatar_site';

    /**
     * @param $tag
     * @return object|null
     */
    private static function getConfig($tag): ?object
    {
        $config = [
            self::AVATAR_INTERNAL => [
                'disk' => 'public',
                'path' => 'internal/user',
                'default' => asset('/assets/defaults/avatar-user.jpg'),
            ],
            self::AVATAR_SITE => [
                'disk' => 'public',
                'path' => 'site/user',
                'default' => asset('/assets/defaults/avatar-user.jpg'),
            ],
        ];

        if (empty($config[$tag])) {
            Log::error(__METHOD__ . ": Config \$config['{$tag}'] not found");
            return null;
        }

        return (object) $config[$tag];
    }

    /**
     * @param $tag
     * @param $pathFile
     * @return string
     */
    public static function getUrl($tag, $pathFile): string
    {
        $config = self::getConfig($tag);
        if (empty($config)) {
            return '';
        }

        if (empty($pathFile)) {
            return $config->default;
        }

        return Storage::disk($config->disk)->url($pathFile);
    }
}
