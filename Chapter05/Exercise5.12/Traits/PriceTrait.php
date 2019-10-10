<?php
namespace Traits;
trait PriceTrait  
{
	public function getPrice()
	{
		return $this->price;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}
}