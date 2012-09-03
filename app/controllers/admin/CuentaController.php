<?php

namespace Sea\App\Controllers\Admin;
use Sea\Core\Controller;
use User;

class CuentaController extends Controller
{	
	public function login($to_url = null)
	{
		$request = $this->get('request');
		
		if($this->user->isLogged())
			$request->redirectTo('/');
		
		$error = false;
		
		if($request->getMethod() == 'POST') {
			$user = User::getUserByLogin($request->post['login']);
			
			if($user) {
				$this->get('auth')->persist($user);
				
				$to_url = base64_decode($to_url);
				$request->redirectTo($to_url);
			} else
				$error = true;
		}
		
		return array('error' => $error);
	}
	
	public function logout()
	{
		$this->get('auth')->logout();
		$this->get('request')->redirectTo('/cuenta/login/');
	}
}
