<?php

namespace App\View\Components;

use App\Models\Style;
use App\Models\Category;
use Illuminate\View\Component;

class FooterLinks extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $first_category=Category::first();
        $first_style=Style::first();
        return view('components.footer-links',['first_category'=>$first_category,'first_style'=>$first_style]);
    }
}
