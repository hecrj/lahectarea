<?php

class User extends UserBase
{
	const PASSWORD_HASH = 'sha256';
	
	static $has_many = array(
		array('posts', 'order' => 'id DESC', 'limit' => 10, 'conditions' => array('status = ?', 1))
	);
	
	static $attr_names = array(
		'username' => 'El usuario',
		'name' => 'El nombre para mostrar',
		'password' => 'La contraseña',
		'password_confirmation' => 'La confirmación de la contraseña',
		'current_password' => 'La contraseña actual',
		'email' => 'El correo electrónico'
	);
	
	static $attr_accessible = array('username', 'password', 'password_confirmation', 'current_password', 'email',
		'name');
	
	static $validates_presence_of = array(
		array('username'),
		array('password'),
		array('email'),
		array('name', 'on' => 'update')
	);
	
	static $validates_size_of = array(
		array('username', 'within' => array(4, 15)),
		array('password', 'within' => array(7, 15), 'on' => 'dirty'),
		array('name', 'within' => array(4, 15), 'on' => 'update')
	);
	
	static $validates_format_of = array(
		array('username', 'with' => Sea\PREG\NO_SPECIALS, 'message' => 'solo puede contener letras, números y \'_\''),
		array('password', 'with' => Sea\PREG\NO_SPECIALS, 'message' => 'solo puede contener letras, números y \'_\''),
		array('email', 'with' => Sea\PREG\EMAIL),
		array('name', 'with' => '/^[a-zA-Z0-9áéíóúàèìòù]+$/', 'allow_blank' => true)
	);
	
	static $validates_confirmation_of = array(
		array('password', 'on' => 'dirty')
	);
	
	static $validates_uniqueness_of = array(
		array('username', 'message' => 'El nombre de usuario ya está siendo utilizado. Escoge otro.')
	);
	
	protected static $hash_roles = array('guest', 'inactive', 'registered', 'moderator', 'webmaster');
	
	protected static $hash_groups = array(
		'active' 	=>	array('registered', 'moderator', 'webmaster'),
		'staff'		=>	array('moderator', 'webmaster')
	);
	
	static $after_validation_on_update = array('check_password');
	static $before_create = array('set_name', 'hash_password');
	
	private $recover_mode = false;
	private $password_original;
	public $password_confirmation;
	
	public static function getUserByLogin($loginData)
	{
		if(! isset($loginData['username'], $loginData['password']))
			return false;
		
		$user = User::find(array('username' => $loginData['username']));
			
		if(! $user)
			return false;
		
		if(!$user->passwordMatch($loginData['password']))
			return false;
		
		$user->remember = (bool)$loginData['remember'];
		
		return $user;
	}
	
	public function passwordMatch($password)
	{
		$hash = hash(self::PASSWORD_HASH, $password . $this->salt);
		
		return ($this->password == $hash);
	}
	
	public function set_name($name = null)
	{
		if(null == $name)
			$name = $this->username;
		
		$this->assign_attribute('name', $name);
	}
	
	public function set_email($email)
	{
		$this->assign_attribute('email', strtolower($email));
	}
	
	public function set_password($password)
	{
		$this->password_original = $this->password;
		$this->assign_attribute('password', $password);
	}
	
	public function check_password()
	{
		if(! $this->attribute_is_dirty('password'))
			return true;
		
		if(!$this->recover_mode)
			$this->check_hash();
		
		$newSalt = rand_str();
		$newPassword = hash(self::PASSWORD_HASH, $this->password . $newSalt);
		
		$this->password = $newPassword;
		$this->salt = $newSalt;
		
		return true;
	}
	
	private function check_hash()
	{	
		if(!$this->passwordMatch($this->current_password))
			$this->errors->add('current_password', 'no es correcta');
	}
	
	public function hash_password()
	{
		$salt = rand_str();
		$hash = hash(self::PASSWORD_HASH, $this->password . $salt);
		
		$this->password = $hash;
		$this->salt = $salt;
		
		return true;
	}
	
	public function __toString() {
		return $this->name;
	}
}
