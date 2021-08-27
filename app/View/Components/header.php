<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class header extends Component
{

    public function render()
    {
        return view('components.header', [
            'categories'    => Category::all()
        ]);
    }
}
