<?php
namespace Zoomyboy\Jssor\Updates;

use Seeder;
use Zoomyboy\Jssor\Models\Bullet;

class BulletsSeeder extends Seeder
{
	private $bullets = [
		['b01', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['b02', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['b03', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['b05', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['b06', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['b07', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['b09', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['b10', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['b11', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['b12', 'top: 123px; left: 0px;', 'top: 123px; right: 0px;'],
		['b13', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['b14', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['b16', 'top: 123px; left: 18px;', 'top: 123px; right: 18px;'],
		['b17', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['b18', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['b20', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['b21', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;']
	];

    public function run()
    {
		foreach ($this->bullets as $bullet) {
			Bullet::create([
				'filename' => $bullet[0],
				'cssLeft' => $bullet[1],
				'cssRight' => $bullet[2]
			]);
		}
    }
}
