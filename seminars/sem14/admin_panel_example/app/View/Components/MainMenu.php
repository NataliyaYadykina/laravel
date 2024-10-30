<?php

namespace App\View\Components\Menu;

use Illuminate\View\Component;

class MainMenu extends Component
{
    public $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function render()
    {
        return view('components.menus.main-menu');
    }
}
