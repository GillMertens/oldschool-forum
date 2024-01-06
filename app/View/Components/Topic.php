<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Topic extends Component
{
    public $topic;

    public function __construct($topic)
    {
        $this->topic = $topic;
    }

    public function render()
    {
        return view('components.topic');
    }
}
