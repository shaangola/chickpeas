<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 05:04:54 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Order
 * 
 * @property int $order_id
 * @property int $customer_id
 * @property int $status
 * @property \Carbon\Carbon $created_on
 * @property \Carbon\Carbon $deliver_on
 * @property int $deliver_by
 * @property int $total
 *
 * @package App\Models
 */
class Order extends Eloquent
{
	protected $primaryKey = 'order_id';
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int',
		'status' => 'int',
		'deliver_by' => 'int',
		'total' => 'int'
	];

	protected $dates = [
		'created_on',
		'deliver_on'
	];

	protected $fillable = [
		'customer_id',
		'status',
		'created_on',
		'deliver_on',
		'deliver_by',
		'total'
	];
}
