<?php

namespace Zoho\CRM\Entities;

use Zoho\CRM\Wrapper\Element;

/**
 * Entity for Quote inside Zoho
 * This class only have default parameters
 *
 * @version 1.0.0
 */
class Quote extends Element
{
	/**
	 * Subject
	 *
	 * @var string
	 */
	private $Subject;

	/**
	 * Quote Stage
	 *
	 * @var string
	 */
	private $Quote_Stage;

	/**
	 * Carrier
	 *
	 * @var string
	 */
	private $Carrier;

	/**
	 * ACCOUNTID
	 *
	 * @var string
	 */
	 private $ACCOUNTID;

	/**
	 * Account Name
	 *
	 * @var string
	 */
	 private $Account_Name;

	 /**
	 * Quote Owner
	 *
	 * @var string
	 */
	private $Quote_Owner;

	/**
	 * Sub Total
	 *
	 * @var string
	 */
	private $Sub_Total;

	/**
	 * Tax
	 *
	 * @var string
	 */
	private $Tax;

	/**
	 * Adjustment
	 *
	 * @var string
	 */
	private $Adjustment;
	/**
	 * Grand Total
	 *
	 * @var string
	 */
	private $Grand_Total;

	/**
	 * Product Name
	 *
	 * @var string
	 */
	private $Product_Name;

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
	 * Product Details
	 *
	 * @var array
	 */
	private $Product_Details;

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
		$this->$property = $value;
		return $this->$property;
	}

	public function mapProperty($name, $value) {
		echo "\n";
		if ($name == 'Product_Details') {
			$result = '<FL val="'.str_replace(['_', 'N36', 'E5F', '&'], [' ', '$', '_', 'and'], $name).'">';
			$index = 1;
			foreach ($value as $product) {
				$result .= '<product no="' . $index++ . '">';
				$result .= $product->mapProperties();
				$result .= '</product>';
			}
			$result .= '</FL>';
			return $result;
		} else {
			return parent::mapProperty($name, $value);
		}
	}

}
