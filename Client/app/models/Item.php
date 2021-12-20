<?php
namespace App\models;

class Item {

	public function insert($token) {
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
		curl_exec($ch);
		curl_close($ch);
	}

	public function getItemsFromClient($token) {
		$ch = curl_init('http://localhost/cart-shop/api/item?key=' . $token);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response, true);
		if (!is_null($response) && $response['status'] != 401 && $response['items'] != "None Found") {
			return $response['items'];
		}
		return null;
	}

	public function getItem($token) {
		$ch = curl_init('http://localhost/cart-shop/api/item/' . $this->item_id . '?key=' . $token);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response, true);
		return $response['item'];
	}

	public function updateItem($token) {
		$ch = curl_init('http://localhost/cart-shop/api/item/' . $this->item_id . '?key=' . $token);
		$payload = json_encode(array('item_name' => $this->item_name, 
									'description' => $this->description,
									'price' => $this->price,
									'stock' => $this->stock
								));

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_exec($ch);
		curl_close($ch);
	}

	public function deleteItem($token) {
		$ch = curl_init('http://localhost/cart-shop/api/item/' . $this->item_id . '?key=' . $token);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		var_dump($response);
	}
}

?>