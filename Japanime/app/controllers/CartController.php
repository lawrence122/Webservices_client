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
            echo "Post";
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

	function getItems() {
        $item = new \App\models\Item();
		$items = $item->getItemsFromClient($_ENV['TOKEN']);
		$this->view('Product/itemList', $items);
	}

	function update($item_id) {
		$item = new \App\models\Item();
		$item->item_id = $item_id;

		if (isset($_POST["action"])) {
			$item->item_name = $_POST["product_name"];
			$item->description = $_POST['description'];
			$item->price = $_POST['price'];
			$item->stock = $_POST['quantity'];

			$item->updateItem($_ENV['TOKEN']);

			header("location:".BASE."/Item/index");
		} else {
			$item = $item->getItem($_ENV['TOKEN']);
			$this->view('Product/editItem', $item);
		}
	}

	function delete($item_id) {
		$item = new \App\models\Item();
		$item->item_id = $item_id;

		$item->deleteItem($_ENV['TOKEN']);
		header("location:".BASE."/Item/index");
	}
}
?>