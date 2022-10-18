<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1;

    public function addToWishList($productId)
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
            {
                session()->flash('message','Product is already in your wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already in your wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                
            return false;
            }
            else{
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
    
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message','Product added to your wishlist successfully');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added to wishlist successfully',
                    'type' => 'info',
                    'status' => 200
                ]);
            }
        }
        else
        {
            session()->flash('message','Please login to continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }

    public function colorSelected($productColorId)
    {
        // dd($productColorId);
        $productColor = $this->product->productColors()->where('id',$productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if($this->prodColorSelectedQuantity == 0){
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }

    public function incrementQuantity()
    {
        if($this->quantityCount < 10){
            $this->quantityCount++;
        }
        
    }

    public function decrementQuantity()
    {
        if($this->quantityCount > 1){
            $this->quantityCount--;
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;

    }

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
