<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Icons Sets
    |--------------------------------------------------------------------------
    |
    | Define your icon sets here. You can specify a path to your SVG icons and 
    | other related options for each set.
    |
    */

    'sets' => [

        'default' => [

            /*
            |--------------------------------------------------------------------------
            | Icons Path
            |--------------------------------------------------------------------------
            |
            | Provide the relative path from your app root to your SVG icons directory.
            | Icons are loaded recursively, so you don’t need to list sub-directories.
            |
            | Ensure this path exists in your application and contains SVG files.
            |
            */

            'path' => 'resources/svg',  // Make sure this folder exists and contains your SVG files.

            /*
            |--------------------------------------------------------------------------
            | Filesystem Disk
            |--------------------------------------------------------------------------
            |
            | Optionally, provide a specific filesystem disk to read icons from.
            | When defining a disk, the "path" option starts relatively from the disk root.
            |
            | Leave it empty to use the default filesystem.
            |
            */

            'disk' => '',

            /*
            |--------------------------------------------------------------------------
            | Default Prefix
            |--------------------------------------------------------------------------
            |
            | This is the prefix that will be applied to all icons in this set.
            | The dash separator will be automatically applied to every icon name.
            | Make sure this prefix is unique to avoid conflicts.
            |
            */

            'prefix' => 'icon',  // You can change this to a different prefix if needed.

            /*
            |--------------------------------------------------------------------------
            | Fallback Icon
            |--------------------------------------------------------------------------
            |
            | Define a fallback icon in case a specific icon cannot be found.
            | If left empty, no fallback will be used.
            |
            */

            'fallback' => '',  // Specify a fallback icon if necessary, e.g., 'icon-default'.

            /*
            |--------------------------------------------------------------------------
            | Default Set Classes
            |--------------------------------------------------------------------------
            |
            | These classes will be applied to all icons within this set by default.
            | You can add any global classes you need here, like `text-gray-500`.
            |
            */

            'class' => '',

            /*
            |--------------------------------------------------------------------------
            | Default Set Attributes
            |--------------------------------------------------------------------------
            |
            | These attributes will be applied to all icons in this set.
            | For example, you can set width or height here for all icons.
            |
            */

            'attributes' => [
                // 'width' => 50,
                // 'height' => 50,
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Global Default Classes
    |--------------------------------------------------------------------------
    |
    | These classes will be applied to all icons in all sets globally.
    | Useful if you want to add global styles to all icons.
    |
    */

    'class' => '',

    /*
    |--------------------------------------------------------------------------
    | Global Default Attributes
    |--------------------------------------------------------------------------
    |
    | These attributes will be applied to all icons globally.
    | Can be useful for global settings like size, width, etc.
    |
    */

    'attributes' => [
        // 'width' => 50,
        // 'height' => 50,
    ],

    /*
    |--------------------------------------------------------------------------
    | Global Fallback Icon
    |--------------------------------------------------------------------------
    |
    | Define a global fallback icon when an icon in any set cannot be found.
    | It can reference any icon from any configured set.
    |
    */

    'fallback' => '',  // You can specify a global fallback here if necessary.

    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | Configure settings related to Blade Components for icons.
    |
    */

    'components' => [

        /*
        |--------------------------------------------------------------------------
        | Disable Components
        |--------------------------------------------------------------------------
        |
        | If you set this option to true, Blade components for icons will be disabled.
        | This can be useful for performance improvements when dealing with large icon sets.
        |
        */

        'disabled' => false,

        /*
        |--------------------------------------------------------------------------
        | Default Icon Component Name
        |--------------------------------------------------------------------------
        |
        | Specify the default component name to use when rendering icons.
        | This will be the base name for icons, so use `icon` unless you need something different.
        |
        */

        'default' => 'icon',

    ],
];
