<?php

/**
 * Hydrator
 */
use Zend\Stdlib\Hydrator\ClassMethods;

class PostHydrator extends ClassMethods {

    public function extract($object) {
        $data = parent::extract($object);
        if ($data['created'] instanceof \DateTime) {
            $data['created'] = $data['created']->format('Y-m-d\TH:i:sP'); //UTC
        }
        return $data;
    }

    public function hydrate(array $data, $object) {
        if (!empty($data['created']) && !$data['created'] instanceof \DateTime) {
            $data['created'] = new \DateTime($data['created']);
        }
        return parent::hydrate($data, $object);
    }

}