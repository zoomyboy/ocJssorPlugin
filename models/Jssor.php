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

	protected $casts = [
		'autoplay' => 'boolean',
		'use_height_from_component' => 'boolean',
		'use_pause_from_component' => 'boolean'
	];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['title', 'arrow_id', 'bullet_id', 'autoplay', 'fill_mode', 'interval', 'slide_duration', 'pause', 'backgroundcolor'];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
	public $belongsTo = [
		'arrow' => 'Zoomyboy\Jssor\Models\Arrow',
		'bullet' => 'Zoomyboy\Jssor\Models\Bullet'
	];
	public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
	public $attachMany = [
		'images' => ['\System\Models\File', 'public' => true]
	];

	public function hasArrow() {
		return $this->arrow_id != 0;
	}

	public function hasBullet() {
		return $this->bullet_id != 0;
	}

	public function getFillModeOptions() {
		return [0 => 'Stretch', 1 => 'contain', 2 => 'cover', 4 => 'Actual Size'];
	}

	public function getPresentPauseAttribute() {
		return ($this->attributes['pause'] == true) ? 3 : 0;
	}
}
