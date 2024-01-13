<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    private static $user,$imageUrl;
    public static function newUser($request)
    {
        self::$imageUrl = $request->file('image') ? imageUpload($request->image,'upload/user-images/') : 'upload/user.jpg';
        self::$user = new User();
        self::$user->name = $request->name;
        self::$user->email = $request->email;
        self::$user->password = bcrypt($request->password);
        self::$user->mobile = $request->mobile;
        self::$user->role = $request->role;
        self::$user->profile_photo_path = self::$imageUrl;
        self::$user->save();
    }

    public static function updateUser($request,$id)
    {
        $user = User::find($id);
        if($request->file('image')){
            if(file_exists($user->profile_photo_path)){
                unlink($user->profile_photo_path);
            }
            self::$imageUrl = imageUpload($request->image,'upload/user-images/');
        }else{
            self::$imageUrl = $user->profile_photo_path;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if(isset($request->password)){
            $user->password = bcrypt($request->password);
        }
        $user->mobile = $request->mobile;
        $user->role = $request->role;
        $user->profile_photo_path = self::$imageUrl;
        $user->save();
    }

    public static function deleteUser($id){
        $user = User::find($id);
        if(file_exists($user->image)){
            unlink($user->image);
        }
        $user->delete();
    }
}
