<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
	use SoftDeletes;
	/**
     * Table name associated with model.
     *
     * @var string
    */
	protected $table="files";

	/**
     * The attributes that are mass assignable.
     *
     * @var array
    */
	protected $fillable=['file_name','file_path','file_extension','disk','size'];

    
}
