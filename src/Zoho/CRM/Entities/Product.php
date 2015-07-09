<?php 

namespace Zoho\CRM\Entities;

use Zoho\CRM\Wrapper\Element;

/**
 * Entity for Product inside Zoho
 * This class only have default parameters
 *
 * @version 1.0.0
 */
class Product extends Element 
{
	/**
	 * Product Id
	 * 
	 * @var string
	 */
	private $Product_Id;
	
	/**
	 * Product Name
	 * 
	 * @var string
	 */
	private $Product_Name;
	
	/**
	 * Product Active
	 * 
	 * @var bool
	 */
	private $Product_Active;
	
	/**
	 * Unit Price
	 * 
	 * @var string
	 */
	private $Unit_Price;
	
	/**
	 * Quantity
	 * 
	 * @var string
	 */
	private $Quantity;
	
	/**
	 * Quantity in Stock
	 * 
	 * @var boolean
	 */
	private $Quantity_in_Stock;
	
	/**
	 * Total
	 * 
	 * @var string
	 */
	private $Total;
	
	/**
	 * Discount
	 * 
	 * @var string
	 */
	private $Discount;
	
	/**
	 * Total After Discount
	 * 
	 * @var string
	 */
	private $Total_After_Discount;
	
	/**
	 * List Price
	 * 
	 * @var string
	 */
	private $List_Price;
	
	/**
	 * Net Total
	 * 
	 * @var string
	 */
	private $Net_Total;
	
	/**
	 * Tax
	 * 
	 * @var string
	 */
	private $Tax;
	
	/**
	 * uuid
	 * 
	 * @var string
	 */
	private $uuid;

	/**
	 * Location
	 * 
	 * @var string
	 */
	private $Location;

	/**
	 * Width
	 * 
	 * @var string
	 */
	private $Width;

	/**
	 * Height
	 * 
	 * @var string
	 */
	private $Height;

	/**
	 * Getter
	 * 
	 * @return mixed
	 */
	public function __get($property)
	{
		return isset($this->$property) ? $this->$property : null;
	}

	/**
	 * Setter
	 *
	 * @param string $property Name of the property to set the value
	 * @param mixed $value Value for the property
	 * @return mixed
	 */
	public function __set($property, $value)
	{
		if ($property == 'PRODUCTID') {
			$property = $this->mapPropertyName('Product Id');
		}
		$this->$property = $value;
		return $this->$property;
	}	
}