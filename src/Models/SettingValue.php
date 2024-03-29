<?php
/**
 * Setting value model.
 *
 * @author    MyBB Group
 * @version   2.0.0
 * @package   mybb/settings
 * @copyright Copyright (c) 2014, MyBB Group
 * @license   http://www.mybb.com/about/license GNU LESSER GENERAL PUBLIC LICENSE
 * @link      http://www.mybb.com
 */

namespace MyBB\Settings\Models;

use Illuminate\Database\Eloquent\Model;

class SettingValue extends Model
{
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = false;
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'setting_values';
	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';
	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [];
	/**
	 * The relations to eager load on every query.
	 *
	 * @var array
	 */
	protected $with = [];

	public function setting()
	{
		return $this->belongsTo('MyBB\Settings\Models\Setting');
	}
}
