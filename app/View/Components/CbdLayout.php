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
        $menus = Menu::whereIn('slug', ['main-menu', 'cbd-menu', 'sales-menu', 'legal-menu'])->get();
        $mainMenu = $menus->where('slug', 'main-menu')->first();    
        $cbdMenu = $menus->where('slug', 'cbd-menu')->first();
        $salesMenu = $menus->where('slug', 'sales-menu')->first();
        $legalMenu = $menus->where('slug', 'legal-menu')->first();
        return view('layouts.cbd-app', compact('mainMenu', 'cbdMenu', 'salesMenu', 'legalMenu'));
    }
}
