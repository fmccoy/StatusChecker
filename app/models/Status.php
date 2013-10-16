<?php

class Status extends Eloquent{

	public $table = 'status';

	public function site(){
		return $this->hasMany('Site');
	}

	public function request(){
		return $this->hasOne('request_id');
	}
}