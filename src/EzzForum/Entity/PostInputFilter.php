<?php

namespace EzzForum\Entity;

class PostInputFilter extends \KapitchiBase\InputFilter\EventManagerAwareInputFilter {

    public function __construct() {

        // body of the post is required
        $this->add(array(
            'name' => 'body',
            'required' => true,
        ));
    }

}