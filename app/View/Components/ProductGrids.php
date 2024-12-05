<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;


class ProductGrids extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Category $category, public Collection $products) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-grids');
    }
}
