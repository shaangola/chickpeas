<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 05:04:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Customer
 * 
 * @property int $customer_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $address
 * @property int $status
 * @property \Carbon\Carbon $create_date
 * @property \Carbon\Carbon $last_update
 * @property int $membership
 *
 * @package App\Models
 */
class Customer extends Eloquent
{
	protected $primaryKey = 'customer_id';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'membership' => 'int'
	];

	protected $dates = [
		'create_date',
		'last_update'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'address',
		'status',
		'create_date',
		'last_update',
		'membership'
	];
}
