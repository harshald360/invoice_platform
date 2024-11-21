<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use App\Filters\DeviceIdFilter;
use App\Filters\IsAuth;
use App\Filters\IsCustAuth;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'deviceId' => DeviceIdFilter::class,
		'auth' => IsAuth::class,
		'custAuth' => IsCustAuth::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			'deviceId',
			'honeypot',
			  'csrf' => [
			  	'except' => array()						
				],

			],
			'after'  => [
				'toolbar',
				'honeypot'
			],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [
		'custAuth' => [
            'before' => [
                'customers/dashboard',
                'customers/plans',
                'customers/plans/*',
                'customers/account',
                'customers/account/*',
            ],
        ],
        'auth' => [
            'before' => [
                'boards/dashboard',
                'boards/users',
                'boards/users/*',
                'boards/customers',
                'boards/customers/*',
                'boards/protection/plans',
                'boards/protection/plans/*',
                'boards/products',
                'boards/products/*',
                'boards/masters',
                'boards/masters/*',
                'boards/orders',
                'boards/orders/*',
                'boards/email/(:any)/templates',
                'boards/email/(:any)/templates/*',
            ],
        ],
		'deviceId' => [
			'before' => [
				'/carts'
			]
		],
	];
}
