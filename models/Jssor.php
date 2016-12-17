<?php namespace Zoomyboy\Jssor\Models;

use Model;

/**
 * Jssor Model
 */
class Jssor extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'zoomyboy_jssor_jssors';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['title'];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
	public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
	public $attachMany = [
		'images' => ['\System\Models\File', 'public' => true]
	];
}
