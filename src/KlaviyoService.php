<?php
	
namespace onefasteuro\Klaviyo;

use Requests_Session;
use Requests;

class KlaviyoService {
	
	protected $session;
	
	protected  $endpoint;
	protected $api_key;
	
	public  function __construct($params)
	{
		$this->checkParams($params);
		$this->api_key = $params['api_key'];
		$this->endpoint = $params['endpoint'];
		
		$headers = array('Content-Type' => 'application/json');
		$this->session = new Requests_Session($this->endpoint, $headers, []);
	}
	
	
	protected function checkParams(array $params)
	{
		if(!array_key_exists('api_key', $params)) {
		
		}
		
		if(!array_key_exists('endpoint', $params)) {
		
		}
	}
	
	public function getLists()
	{
		$response = $this->session->request('api/v2/lists', [], $this->readyPostData(), Requests::GET);
		return $this->respond($response);
	}
	
	protected function readyPostData(&$data = [])
	{
		$data['api_key'] = $this->api_key;
		return $data;
	}
	
	protected function readyGetData(&$data = [])
	{
		$data['api_key'] = $this->api_key;
		return http_build_query($data);
	}
	
	public function subscribeToList($list_id, $profiles = [])
	{
		
		if(count($profiles) < 1) {
			//error
		}
		
		$url = sprintf('api/v2/list/%s/subscribe', $list_id );
		
		$data = ['profiles' => $profiles];
		$data = $this->readyPostData($data);
		

		$response = $this->session->request($url, [], json_encode($data), Requests::POST);
		
		return $this->respond($response);
	}
	
	protected function respond($data)
	{
		return json_decode($data->body, true);
	}
		
		
}