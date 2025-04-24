<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;
use Illuminate\View\View;

class CbdLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $menus = Menu::all();
        $mainMenu = $menus->where('slug', 'main-menu')->first();    
        $footerMenu = $menus->where('slug', 'footer-menu')->first();

        return view('layouts.cbd-app', compact('mainMenu', 'footerMenu'));
    }
}
