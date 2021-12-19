<?php
namespace App\controllers;

class CartController extends \App\core\Controller {

	function index() {
		$cart = new \App\models\Cart();
		$orders = $cart->getItemFromClientCart($_ENV['TOKEN']);
		$this->view('Cart/cart', $orders);
	}

	function insert() {
		if (isset($_POST['action'])) {
			$cart = new \App\models\Cart();
			$cart->item_id = $_POST['item_ordered'];
            $cart->client_id = $_POST['client_id'];
			$cart->amount = $_POST['amount'];
            $cart->status = "Preparing";
			$cart->insert($_ENV['TOKEN']);
			header('location:'.BASE.'/Cart/index');
		} else {
			$item = new \App\models\Item();
		    $items = $item->getItemsFromClient($_ENV['TOKEN']);
		    $this->view('Cart/order', $items);
		}
	}

	function edit($cart_id) {
		if (isset($_POST['action'])) {
			$cart = new \App\models\Cart();
			$cart->cart_id = $cart_id;
			$cart->item_id = $_POST['item_ordered'];
			$cart->amount = $_POST['amount'];
			$cart->client_id = $_POST['first_name'];
			$cart->addToOrder($_ENV['TOKEN']);
			header('location:'.BASE.'/Cart/index');
		} else {
			$cart = new \App\models\Cart();
			$cart->cart_id = $cart_id;
			$cart = $cart->getSpecificCartItem($_ENV['TOKEN']);
			$item = new \App\models\Item();
		    $items = $item->getItemsFromClient($_ENV['TOKEN']);
		    $this->view('Cart/editOrder', ['cart'=>$cart, 'items'=>$items]);
		}
	}

	function getItems() {
        $item = new \App\models\Item();
		$items = $item->getItemsFromClient($_ENV['TOKEN']);
		$this->view('Product/itemList', $items);
	}

	function update($cart_id) {
		$cart = new \App\models\Cart();
		$cart->cart_id = $cart_id;
		$cart->status = "Completed";
		$cart->updateStatus($_ENV['TOKEN']);
		header("location:".BASE."/Cart/index");
	}

	function cancel($cart_id) {
		$cart = new \App\models\Cart();
		$cart->cart_id = $cart_id;
		$cart->status = "Cancelled";
		$cart->updateStatus($_ENV['TOKEN']);
		header("location:".BASE."/Cart/index");
	}

	function delete($cart_id) {
		$cart = new \App\models\Cart();
		$cart->cart_id = $cart_id;
		$cart->delete($_ENV['TOKEN']);
		header("location:".BASE."/Cart/index");
	}
}
?>