<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\QueryException;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Tests\TestCase;

class DatabaseIntegrityTest extends TestCase
{
    use RefreshDatabase;

    public function test_cart_item_cannot_be_duplicated_for_same_product()
    {
        $user = User::factory()->create();
        $cart = Cart::create(['user_id' => $user->id]);
        $product = Product::factory()->create(); // Asumsi factory product disiapkan

        CartItem::create(['cart_id' => $cart->id, 'product_id' => $product->id, 'quantity' => 1]);

        $this->expectException(QueryException::class);
        $this->expectExceptionMessage('Integrity constraint violation');

        // Akan gagal (SQL Error) karena unique index [cart_id, product_id]
        CartItem::create(['cart_id' => $cart->id, 'product_id' => $product->id, 'quantity' => 2]);
    }
}