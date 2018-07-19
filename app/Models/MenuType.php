<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 05:04:54 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MenuType
 * 
 * @property int $id
 * @property string $title
 * @property string $des
 * @property int $status
 * @property \Carbon\Carbon $created
 *
 * @package App\Models
 */
class MenuType extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'status' => 'int'
	];

	protected $dates = [
		'created'
	];

	protected $fillable = [
		'title',
		'des',
		'status',
		'created'
	];
}
