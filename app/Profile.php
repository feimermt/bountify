<?php

namespace Bountify;

use Cartalyst\Sentinel\Users\EloquentUser;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
##use Esensi\Model\Traits\ValidatingModelTrait;
##Use Esensi\Model\Contracts\ValidatingModelInterface;

class Profile extends EloquentUser implements SluggableInterface
##class Profile extends EloquentUser implements ValidatingModelInterface
{
	use SluggableTrait; 

	protected $fillable = [
        'address',
        'phone_number',
    ];

}
