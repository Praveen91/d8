<?php

namespace Drupal\custom_site_information\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;
use Drupal\Core\Config\ConfigFactory;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class SiteApiController.
 *
 * @package Drupal\custom_site_information\Controller
 */
class SiteApiController extends ControllerBase {  
   
  public $key;
  public $id;
  
  /*
  * This function automatically call to check valid api.
  */ 
  public function __construct() {
		$site_api_key = \Drupal::state()->get('siteapikey');
		$this->key = \Drupal::request()->get('key');
		if(!($this->key == $site_api_key)){
			throw new AccessDeniedHttpException();
			throw new NotFoundHttpException();
		}
  }
  
  /*
  * This function are used to display node details in JSON Formate.
  */  
  public function display() {
							
		$this->id = \Drupal::request()->get('id');		
		$node = Node::load($this->id);		
		if((intval($this->id) > 0) && count($node) > 0){											
				$data = array();				
				$data['body'] = $node->body->value;
				$data['title'] = $node->title->value;							
				echo json_encode($data);
				exit;							     
		}
		else{			
				throw new AccessDeniedHttpException();
				throw new NotFoundHttpException();
			
		}

	}
}
