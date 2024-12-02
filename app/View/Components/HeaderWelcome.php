<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeaderWelcome extends Component
{
    public $title;
    public $subtitle;
    public $showButtons;

    public function __construct($title, $subtitle, $showButtons = false)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->showButtons = $showButtons;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header-welcome');
    }
}
