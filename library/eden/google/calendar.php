<?php //-->
/*
 * This file is part of the Eden package.
 * (c) 2009-2011 Christian Blanquera <cblanquera@gmail.com>
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

/**
 *  Google calendar
 *
 * @package    Eden
 * @category   google
 * @author     Christian Blanquera <cblanquera@gmail.com>
 * @version    $Id: registry.php 1 2010-01-02 23:06:36Z blanquera $
 */
class Eden_Google_Calendar extends Eden_Google_Base {
	/* Constants
	-------------------------------*/
	const SCOPE 			= 'https://www.google.com/calendar/feeds/';
	const URL_CALENDAR_LIST = 'https://www.google.com/calendar/feeds/%s/allcalendars/full';
	
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/ 
	/* Private Properties
	-------------------------------*/
	/* Get
	-------------------------------*/
	public static function get($key, $secret) {
		return self::_getMultiple(__CLASS__, $key, $secret);
	}
	
	/* Magic
	-------------------------------*/
	public function __construct($key, $secret) {
		//argument test
		Eden_Google_Error::get()
			->argument(1, 'string')		//Argument 1 must be a string
			->argument(2, 'string');	//Argument 2 must be a string
			
		$this->_key 	= $key; 
		$this->_secret 	= $secret;
		$this->_scope	= self::SCOPE;
	}
	
	/* Public Methods
	-------------------------------*/
	public function getCalendarList($user = self::DEFAULT_USER) {
		$url = sprintf(self::URL_CALENDAR_LIST, $user);
		//Argument 1 must be a string
		Eden_Google_Error::get()->argument(1, 'string');
		return $this->_getResponse($url);
	}
			
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}