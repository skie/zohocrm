<?php namespace Zoho\CRM\Wrapper;

/**
 * Element class for extends Entities
 *
 * @package Zoho\CRM\Wrapper
 * @version 1.0.0
 */
abstract class Element
{
    /**
     * The deserialize method is called during xml parsing,
     * create an object of the xml received based on the entity
     * called
     *
     * @param string $xmlstr XML string to convert on object
     * @throws Exception If xml data could not be parsed
     * @return boolean
     */
    final public function deserializeXml($xmlstr)
    {
    	try {
			$element = new \SimpleXMLElement($xmlstr);
    	} catch(\Exception $ex) {
    		return false;
    	}
		foreach($element as $name => $value)
			$this->$name = stripslashes(urldecode(htmlspecialchars_decode($value)));
		return true;
    }

    /**
     * Called during array to xml parsing, create an string
     * of the xml to send for api based on the request values, for sustitution
     * of specials chars use E prefix instead of % for hexadecimal
     *
     * @param array $fields Fields to convert
     * @return string
     * @todo
            - Verify if the property exist on entity before send to zoho
     */
    final public function serializeXml(array $fields)
    {
		$class = get_class($this);
		//print_r( "\n\n\n" .  $class . "\n\n\n");
        $output = '<Lead>';
        foreach ($fields as $key => $value) {
            if(empty($value)) continue; // Unnecessary fields
            $key = str_replace(' ', '_', ucwords(str_replace(['%5F', '$', '_'], ['E5F', ' ', 'N36'], $key)));
            $output .= '<'.$key.'>'.htmlspecialchars($value).'</'.$key.'>';
        } $output .= '</Lead>';
        return $output;
    }

	public function mapProperties() {
		$element = new \ReflectionObject($this);
		$properties = $element->getProperties();
		$xml = '';
		foreach ($properties as $property)
		{
			$propName = $property->getName();
			$propValue = $this->$propName;
			if (!empty($propValue)) {
				$xml .= $this->mapProperty($propName, $propValue);
			}
		}
		return $xml;
	}


	/**
	 * Getter
	 * 
	 * @return mixed
	 */
	public function __get($property)
	{
		return isset($this->$property)?$this->$property :null;
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
	
	public function fromArray($array) {
		foreach ($array as $property => $value) {
			if(empty($value)) {
				continue;
			}
			$propertyName = $this->mapPropertyName($property);
			$this->$propertyName = $value;
		}
	}
	
	public function mapProperty($name, $value) {
		return '<FL val="'.str_replace(['_', 'N36', 'E5F', '&'], [' ', '$', '_', 'and'], $name).'"><![CDATA['.$value.']]></FL>';
	}

	/**
	 * @param $property
	 * @return mixed
	 */
	public function mapPropertyName($property) {
		return str_replace([
			'and',
			'_',
			'$',
			' '
		], [
			'&',
			'E5F',
			'N36',
			'_'
		], $property);
	}
}