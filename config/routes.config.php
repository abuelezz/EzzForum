<?php

return array(
    'forum' => array(
        'type' => 'Literal',
        'options' => array(
            'route' => '/forum',
            'defaults' => array(
                '__NAMESPACE__' => 'EzzForum\Controller',
                'controller' => 'post',
                'action' => 'index',
            ),
        ),
        'may_terminate' => true,
        'child_routes' => array(
            'post' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/[:controller/:action]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                    ),
                ),
            ),
        ),
    ),
);