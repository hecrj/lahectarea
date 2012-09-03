<?php

namespace App\Controllers;
use Sea\Core\Controller;
use User;

class CuentaController extends Controller
{

	public function index()
	{
		
	}

	public function login()
	{
		$error = false;
		
		$request = $this->get('request');
		
		if($request->getMethod() == 'POST')
		{
			$user = User::getUserByLogin($request->post['login']);
			
			if($user)
			{
				$this->get('auth')->persist($user);
				
				$rPath = (null != $to ? base64_decode($to) : '/cuenta');
				
				$request->redirectTo($rPath);
			}
			else
				$error = true;
		}
		
		return array('error' => $error, 'to' => (bool)$to);
	}

	public function logout()
	{
		$this->get('auth')->logout();
		$this->get('request')->redirectTo('/cuenta');
	}

}
