<?php

namespace App\Models;

class Model
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    public function getContent()
    {
        $content_array = array();
        foreach ($this as $key => $value) {
            $content_array += [$key => $value];
        }
        return $content_array;
    }
}
