<?php

namespace Bountify;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Cartalyst\Attributes\Attribute;
use Cartalyst\Attributes\EntityTrait;
use Cartalyst\Attributes\EntityInterface;

class User extends EloquentUser implements SluggableInterface, EntityInterface
{
    use SluggableTrait, EntityTrait;
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];
    /**
     * Array of fields that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];
    /**
     * Array of login column names.
     *
     * @var array
     */
    protected $loginNames = ['email', 'username'];
    /**
     * Array of fillable columns.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'username',
        'password',
        'last_name',
        'first_name',
        'permissions',
    ];
    /**
     * How to generate the user slug.
     *
     * @var array
     */
    protected $sluggable = ['build_from' => 'username', 'save_to' => 'username'];
    /**
     * Create a new User model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        /*
         * EAV Attributes
         */
        Attribute::firstOrCreate(['slug' => 'gender']);
        Attribute::firstOrCreate(['slug' => 'mobile']);
        // call parent constructor
        parent::__construct($attributes);
    }



class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
}
