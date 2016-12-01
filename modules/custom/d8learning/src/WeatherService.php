<?php

namespace Drupal\d8learning;

use Drupal\Core\Config\ConfigFactory;
use GuzzleHttp\Client;
use Drupal\Component\Serialization\Json;

/**
 * Class WeatherService.
 *
 * @package Drupal\d8learning
 */
class WeatherService {
  private $cf;
  private $client;
  /**
   * Constructor.
   */
  public function __construct(ConfigFactory $c, Client $client) {
    $this->cf = $c;
    $this->client = $client;
  }

  public function fetchData($city) {
    
    $conf = $this->cf->get('d8learning.appid')->get('name');
    $siteUrl = 'http://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . $conf;
    $weather_data = $this->client->request('GET', $siteUrl); 
    $data = Json::decode($weather_data->getBody()->getContents());
    $wapi_data['wp'] = array(
      'temp_min' => $data['main']['temp_min'],
      'temp_max' => $data['main']['temp_max'],
      'pressure' => $data['main']['pressure'],
      'humidity' => $data['main']['humidity'],
      'wind' => $data['wind']['speed']
      );
//print_r($wapi_data); die();
    return $wapi_data;
  	
  }

} 
