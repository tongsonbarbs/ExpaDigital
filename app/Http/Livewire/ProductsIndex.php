<?php

namespace App\Http\Livewire;

use App\Models\Products;
use Livewire\Component;

class ProductsIndex extends Component
{
    public $showingCreateModal = false;

    public $name;
    public $description;
    public $price;
    public $product;

    public $isEdit = false;

    public function showCreateModal()
    {
        $this->reset();
        $this->showingCreateModal = true;
        $this->isEdit = false;
    }

    public function closeModal()
    {
        $this->showingCreateModal = false;
        $this->reset();
    }

    public function storeProduct()
    {
        $this->validate([
            'name' => ['required', 'min:2', 'max: 20'],
            'description' => ['required', 'max: 500'],
            'price' => ['required'],
        ]);

        Products::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->reset();
    }

    public function showEditProductModal($id)
    {
        $this->showingCreateModal = true;
        $this->isEdit = true;

        $this->product = Products::findOrFail($id);
        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->price = $this->product->price;
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => ['required', 'min:2', 'max: 20'],
            'description' => ['required', 'max: 500'],
            'price' => ['required'],
        ]);

        $updated = $this->product->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'updated_at' => now(),
        ]);


        if ($updated) {
            $this->showingCreateModal = false;
            $this->reset();
        }
    }

    public function deleteProduct($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
    }

    public function render()
    {
        return view('livewire.products-index', [
            'products' => Products::all(),
        ]);
    }
}
