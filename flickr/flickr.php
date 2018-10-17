<?php
class Flickr { 
	private $apiKey; 
	public function __construct($apikey = null) {
		$this->apiKey = $apikey;
	} 
	
	public function search($query = null, $user_id = null, $per_page = 100, $format = 'php_serial', $sort='date-taken-desc') { 
		$args = array(
			'method' => 'flickr.photos.search',
			'api_key' => $this->apiKey,
			'text' => urlencode($query),
			'user_id' => $user_id,
			'per_page' => $per_page,
			'format' => $format,
			'sort' => $sort
		);
		$url = 'http://flickr.com/services/rest/?'; 
		$search = $url.http_build_query($args);
		$result = file_get_contents($search); 
		if ($format == 'php_serial') $result = unserialize($result); 
		return $result; 
	} 
} 
?>