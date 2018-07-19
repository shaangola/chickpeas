<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 05:04:54 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OrderItem
 * 
 * @property int $order_item_id
 * @property int $item_id
 * @property int $order_id
 * @property \Carbon\Carbon $created_on
 * @property bool $status
 *
 * @package App\Models
 */
class OrderItem extends Eloquent
{
	protected $primaryKey = 'order_item_id';
	public $timestamps = false;

	protected $casts = [
		'item_id' => 'int',
		'order_id' => 'int',
		'status' => 'bool'
	];

	protected $dates = [
		'created_on'
	];

	protected $fillable = [
		'item_id',
		'order_id',
		'created_on',
		'status'
	];
}
