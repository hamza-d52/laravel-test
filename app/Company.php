<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
	use SoftDeletes;
	/**
     * Table name associated with model.
     *
     * @var string
    */
	protected $table="companies";

	/**
     * The attributes that are mass assignable.
     *
     * @var array
    */
	protected $fillable=['copmany_name'];

	/**
     * .
     *
     * @return App\Country
    */
	public function country()
	{
		return $this->belongsTo('App\Country');
	}

	/**
     * .
     *
     * @return Illuminate\Database\Support\Collection
    */
	public function users()
	{
		return $this->belongsToMany('App\User','company_user')->withPivot('joining_date');

	}
    
}
