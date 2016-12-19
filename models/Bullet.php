<?php namespace Zoomyboy\Jssor\Models;

use Model;

/**
 * Bullet Model
 */
class Bullet extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'zoomyboy_jssor_bullets';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['filename', 'cssLeft', 'cssRight'];

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
    public $attachMany = [];

	public function getImagePathAttribute() {
		return '/plugins/zoomyboy/jssor/assets/img/'.$this->attributes['filename'].'.png';
	}

	public function getClassNameAttribute() {
		return 'jssor'.$this->attributes['filename'];
	}
}
