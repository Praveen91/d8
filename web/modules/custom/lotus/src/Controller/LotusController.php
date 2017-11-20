<?php

namespace Drupal\lotus\Controller;

use Drupal\Core\Controller\ControllerBase;

class LotusController extends ControllerBase {

	function content() {
        return [
          '#type' => 'markup',
          '#markup' => $this->t('Welcome to my website!'), 
        ];		
	}

}