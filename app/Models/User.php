<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'roleId',
        'departmentId',
        'officeId',
        'firstNameKh',
        'lastNameKh',
        'gender',
        'phoneNumber',
        'email',
        'password',
        'idCard',
        'status',
        'nationality',
        'dateOfBirth',
        'pobAddress',
        'currentAddress',
        'img',
        'active'
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'roleId');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'departmentId');
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class, 'officeId');
    }
}
