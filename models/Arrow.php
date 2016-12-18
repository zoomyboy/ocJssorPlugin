<?php namespace Zoomyboy\Jssor\Models;

use Model;

/**
 * Arrow Model
 */
class Arrow extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'zoomyboy_jssor_arrows';

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

	public function getLeftClassNameAttribute() {
		return 'jssor'.$this->attributes['filename'].'l';
	}

	public function getRightClassNameAttribute() {
		return 'jssor'.$this->attributes['filename'].'r';
	}
}
