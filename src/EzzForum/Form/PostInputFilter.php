<?php

/**
 * Input filter valifation for PostForm
 * 
 * @author Mohammad Abuelezz <mohammad@abuelezz.com>
 */

namespace EzzForum\Form;

class PostInputFilter extends \Zend\InputFilter\InputFilter {

    public function __construct() {

        // body of the post is required
        $this->add(array(
            'name' => 'body',
            'required' => true,
        ));
    }

}

