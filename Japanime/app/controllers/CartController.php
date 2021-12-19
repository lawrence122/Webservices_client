<?php
namespace App\controllers;

class CartController extends \App\core\Controller {

	function index() {
		// $item = new \App\models\Item();
		// $items = $item->getItemsFromClient($_ENV['TOKEN']);
		$this->view('Cart/order');
	}

	function insert($item_id, $amount) {
        // $item = new \App\models\Item();
		// $item->item_id = $item_id;
		// $item->amount = $amount;
        // // $item->insert($_ENV['TOKEN']);
        // header('location:'.BASE.'/Cart/index');


        echo "insert";
		if (isset($_POST['action'])) {
            echo "Post";
			$item = new \App\models\Item();
			$item->item_id = $item_id;
			$item->amount = 0;
            var_dump($_POST[$item_id . '_amount']);
			// $item->insert($_ENV['TOKEN']);

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