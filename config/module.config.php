<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'EzzForum\Controller\Post' => 'EzzForum\Controller\PostController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'create' => array(
                'type' => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route' => '/forum/post/create',
                    'defaults' => array(
                        'controller' => 'EzzForum\Controller\Post',
                        'action' => 'create',
                    )
                ),
            ),
            'list' => array(
                'type' => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route' => '/forum/post/index',
                    'defaults' => array(
                        'controller' => 'EzzForum\Controller\Post',
                        'action' => 'index',
                    )
                ),
            ),
        ),
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
