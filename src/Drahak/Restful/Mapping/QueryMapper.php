<?php
namespace Drahak\Restful\Mapping;

use Nette\Http\Url;
use Nette\SmartObject;
use Nette\Utils\Strings;

/**
 * Query string mapper
 * @package Drahak\Restful\Mapping
 * @author Drahomír Hanák
 */
class QueryMapper implements IMapper
{
	use SmartObject;

	/**
	 * Convert array or Traversable input to string output response
	 * @param array $data
	 * @param bool $prettyPrint
	 * @return mixed
	 */
	public function stringify($data, $prettyPrint = TRUE)
	{
		if ($data instanceof \Traversable) {
			$data = iterator_to_array($data, TRUE);
		}
		return http_build_query($data, '', '&');
	}

	/**
	 * Convert client request data to array or traversable
	 * @param string $data
	 * @return array
	 *
	 * @throws MappingException
	 */
	public function parse($data)
	{
		$result = array();
		parse_str($data, $result);
		return $result;
	}


}