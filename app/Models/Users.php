<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;

class Users extends Authenticatable implements CanResetPassword
{
    use CanResetPasswordTrait;
}