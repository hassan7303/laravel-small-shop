<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Log the user out.
     *
     * @return void
     */
    public function UserLogout():void {
        dd("1111");
    }

    /**
     * Update the user's password.
     *
     * @return void
     */
    public function UpdatePassword():void {
        dd("1111");
    }

    /**
     * Search for a product based on the user's query.
     *
     * @return void
     */
    public function SearchProduct():void {
        dd("1111");
    }

    /**
     * Display the home page.
     *
     * @return void
     */
    public function index():void {
        dd("1111");
    }

    /**
     * Show the user's account page.
     *
     * @return void
     */
    public function UserAccount():void {
        dd("1111");
    }

    /**
     * Show the shop page where products are displayed.
     *
     * @return void
     */
    public function ShopPage():void {
        dd("1111");
    }

    /**
     * Display the details of a specific product.
     *
     * @param  int  $id  The ID of the product.
     * @return void
     */
    public function ProductDetails($id):void {
        dd("1111");
    }

    /**
     * Display the contact page.
     *
     * @return void
     */
    public function ContactPage():void {
        dd("1111");
    }

    /**
     * Show the homepage (might be similar to index).
     *
     * @return void
     */
    public function Home():void {
        dd("1111");
    }

    /**
     * Add a product to the user's cart.
     *
     * @param  int  $id  The ID of the product.
     * @return void
     */
    public function addToCart($id):void {
        dd("1111");
    }

    /**
     * Remove a product from the user's cart.
     *
     * @param  int  $id  The ID of the product.
     * @return void
     */
    public function removeProductFromCart($id):void {
        dd("1111");
    }

    /**
     * Clear all items from the user's cart.
     *
     * @return void
     */
    public function clearCart():void {
        dd("1111");
    }

    /**
     * Show the user's order history.
     *
     * @return void
     */
    public function userOrders():void {
        dd("1111");
    }

    /**
     * Display details of a specific order.
     *
     * @param  int  $id  The ID of the order.
     * @return void
     */
    public function orderReceived($id):void {
        dd("1111");
    }

    /**
     * Cancel a specific order.
     *
     * @param  int  $id  The ID of the order.
     * @return void
     */
    public function cancelOrder($id):void {
        dd("1111");
    }

    /**
     * Proceed to checkout and finalize the order.
     *
     * @return void
     */
    public function checkout():void {
        dd("1111");
    }
}
