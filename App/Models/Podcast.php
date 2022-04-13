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
        return array(
            'id' => $this->id,
            'title' => $this->title,
            'shorttext' => $this->shorttext,
            'img' => $this->img,
            'audiourl' => $this->audiourl
        );
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
