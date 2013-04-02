<?php

/**
 * Post Form to handle creation post
 * @author Mohammad Abuelezz <mohammad@abuelezz.com>
 */

namespace EzzForum\Form;

use Zend\Form\Form;

class PostForm extends Form {

    public function __construct($name = null) {
        parent::__construct($name);
        $this->setLabel('Post');
        $this->setAttribute('method', 'post');

        // TextArea body of the post
        $this->add(array(
            'name' => 'body',
            'attributes' => array(
                'type' => 'textarea',
            ),
            'options' => array(
                'label' => 'Post Body',
            ),
        ));

        // submit button
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Add Post',
                'id' => 'submitbutton',
            ),
        ));
    }

}

