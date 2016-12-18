<?php
namespace Zoomyboy\Jssor\Updates;

use Seeder;
use Zoomyboy\Jssor\Models\Arrow;

class ArrowsSeeder extends Seeder
{
	private $arrows = [
		['a01', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a02', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a03', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a04', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a05', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a06', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a07', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a08', 'top: 8px; left: 8px;', 'bottom: 8px; left: 8px;'],
		['a09', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a10', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a11', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a12', 'top: 123px; left: 0px;', 'top: 123px; right: 0px;'],
		['a13', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a14', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a15', 'top: 123px; left: 18px;', 'top: 123px; right: 18px;'],
		['a16', 'top: 123px; left: 18px;', 'top: 123px; right: 18px;'],
		['a17', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a18', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a19', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a20', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;'],
		['a21', 'top: 123px; left: 8px;', 'top: 123px; right: 8px;']
	];

    public function run()
    {
		foreach ($this->arrows as $arrow) {
			Arrow::create([
				'filename' => $arrow[0],
				'cssLeft' => $arrow[1],
				'cssRight' => $arrow[2]
			]);
		}
    }
}
