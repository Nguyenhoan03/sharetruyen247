<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StoryItem extends Component
{
    public $data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.story-item', [
            'data' => $this->data
        ]);
    }
}
