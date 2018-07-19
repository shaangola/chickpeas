<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 05:04:54 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Menu
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $menu_type
 * @property int $parent_id
 * @property int $status
 * @property \Carbon\Carbon $created_on
 * @property int $half_price
 * @property int $full_price
 *
 * @package App\Models
 */
class Menu extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'menu_type' => 'int',
		'parent_id' => 'int',
		'status' => 'int',
		'half_price' => 'int',
		'full_price' => 'int'
	];

	protected $dates = [
		'created_on'
	];
	protected $guarded = ['id'];


	protected $fillable = [
		'title',
		'description',
		'menu_type',
		'parent_id',
		'status',
		'created_on',
		'half_price',
		'full_price'
	];
	

    public function children() {
		return $this->hasMany(self::class, 'parent_id');
	}
	public function getmenu() {
		return $this->belongsTo('App\Models\MenuType', 'menu_type');
	}
}
