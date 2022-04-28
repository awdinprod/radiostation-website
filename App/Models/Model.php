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
        $podcast_array = array();
        foreach ($this as $key => $value) {
            $podcast_array += [$key => $value];
        }
        return $podcast_array;
    }
}
