<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Contact;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Statistics extends Component
{
    public function render()
    {
        $categories_count = Cache::get('categories_count');
        $products_count = Cache::get('products_count');;
        $contacts_count = Cache::get('contacts_count');;
        return view('livewire.statistics');
    }
}
