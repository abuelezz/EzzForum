<?php

return array(
    'router' => array(
        'routes' => require 'routes.config.php'
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'EzzForum' => __DIR__ . '/../view',
        ),
    ),
    'translator' => array(
        'locale' => 'ar_AR',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
);
