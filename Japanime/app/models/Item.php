<?php
namespace App\models;

class Item {

	public function insert($token) {
		echo "insert";
		$ch = curl_init('http://localhost/cart-shop/api/item?key=' . $token);
		$payload = json_encode(array('item_name' => $this->item_name, 
									'description' => $this->description,
									'picture' => $this->picture,
									'price' => $this->price,
									'stock' => $this->stock
								));

		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response, true);

		if ($response['status'] == "201") {
			return true;
		} else {
			return false;
		}
	}

	public function getItemsFromClient($token) {
		$ch = curl_init('http://localhost/cart-shop/api/item?key=' . $token);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		echo $response;
	}

	public function getItem($token, $item_id) {
		echo $token;
		echo $item_id;

		$ch = curl_init('http://localhost/cart-shop/api/item/' . $item_id . '?key=' . $token);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		echo $response;
	}

	public function updateItem($token, $item_id, $description) {
		$ch = curl_init('http://localhost/cart-shop/api/item/' . $item_id . '?key=' . $token);
		$payload = json_encode(array('description' => $description));

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response, true);

		if ($response['status'] == '200') {
			echo $response['message'];
		} else {
			return false;
		}
	}

	public function deleteItem($token, $item_id) {
		$ch = curl_init('http://localhost/cart-shop/api/item/' . $item_id . '?key=' . $token);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response, true);

		if ($response['status'] == '500') {
			return true;
		} else {
			return false;
		}
	}
}

?>