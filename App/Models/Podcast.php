<?php

namespace App\Models;

class Podcast extends Model
{
    protected $title;
    protected $shorttext;
    protected $img;
    protected $audiourl;

    public function getContent()
    {
        $podcast_array = array();
        foreach ($this as $key => $value) {
            $podcast_array += [$key => $value];
        }
        return $podcast_array;
    }

    public function __construct($podcast)
    {
        $this->id = $podcast['id'];
        $this->title = $podcast['name'];
        $this->shorttext = $podcast['description'];
        $this->img = $podcast['podcast_img'];
        $this->audiourl = $podcast['audio'];
    }
}
