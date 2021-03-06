<?php
namespace App\models;

class Cart {

	public function getItemFromClientCart($token) {
		$ch = curl_init('http://localhost/cart-shop/api/cart?key=' . $token);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response, true);
		
		if (!is_null($response) && $response['status'] == "200") {
			return $response['carts'];
		} else {
			return false;
		}
	}

	public function getSpecificCartItem($token) {
		$ch = curl_init('http://localhost/cart-shop/api/cart/'.$this->cart_id.'?key=' . $token);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response, true);
		
		if ($response['status'] == "200") {
			return $response['cart'];
		} else {
			return false;
		}
	}

	public function insert($token) {
		$ch = curl_init('http://localhost/cart-shop/api/cart?key=' . $token);
		$payload = json_encode(array('item_id' => $this->item_id, 
									'amount' => $this->amount,
									'status' => $this->status,
									'client_id' => $this->client_id
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

	public function updateStatus($token) {
		$ch = curl_init('http://localhost/cart-shop/api/cart/' . $this->cart_id . '?key=' . $token);
		$payload = json_encode(array('status' => $this->status));

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_exec($ch);
		curl_close($ch);
	}

	public function addToOrder($token) {
		$ch = curl_init('http://localhost/cart-shop/api/cart/' . $this->cart_id . '?key=' . $token);
		$payload = json_encode(array('item_id' => $this->item_id, 
									'amount' => $this->amount,
									'client_id' => $this->client_id
								));

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response, true);

		if ($response['status'] == "200") {
			return true;
		} else {
			return false;
		}
	}

	public function updateAmount($token, $amount, $item_id) {
		$ch = curl_init('http://localhost/cart-shop/api/cart/0?key=' . $token);
		$payload = json_encode(array('item_id' => $item_id, 
									'amount' => $amount
								));

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response, true);

		if ($response['status'] == "200") {
			return true;
		} else {
			return false;
		}
	}

	public function delete($token) {
		$ch = curl_init('http://localhost/cart-shop/api/cart/' . $this->cart_id . '?key=' . $token);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_exec($ch);
		curl_close($ch);
	}
}

?>