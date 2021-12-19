<?php
namespace App\controllers;

class ItemController extends \App\core\Controller {

	function index() {
		$item = new \App\models\Item();
		$items = $item->getItemsFromClient($_ENV['TOKEN']);
		$this->view('Product/itemList', $items);
	}

	function insert() {
		if (isset($_POST['action'])) {
			$item = new \App\models\Item();
			$item->item_name = $_POST['product_name'];
			$item->description = $_POST['description'];
			$item->price = $_POST['price'];
			$item->stock = $_POST['quantity'];
			$item->insert($_ENV['TOKEN']);

			header('location:'.BASE.'/Item/index');
		} else {
			$this->view('Product/addItem');
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