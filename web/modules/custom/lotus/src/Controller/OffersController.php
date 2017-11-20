<?php

namespace Drupal\lotus\Controller;

use Drupal\Core\Controller\ControllerBase;

class OffersController extends ControllerBase {

	function hello($count) {
      return [
       '#type' => 'markup',
       '#markup' => $this->t('You will get %count% discount!', ['%count'=>$count] ),
      ];
	}

}