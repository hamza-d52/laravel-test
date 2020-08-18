<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    /**
     * Table name associated with model.
     *
     * @var string
    */
	protected $table="countries";

	/**
     * The attributes that are mass assignable.
     *
     * @var array
    */
	protected $fillable=['country_name'];


	/**
     * .
     *
     * @return lluminate\Database\Support\Collection
    */
	public function companies()
	{
		return $this->hasMany('App\Company');
	}
  
}
