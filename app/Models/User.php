<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    public function getName()
    {
        return $this->name;
    }

// Mene gonderilen dostluqlar
    public function friendofMine()
    {
        return $this->belongsToMany('App\Models\User', 'friends', 'user_id', 'friend_id');
    }

//    Menim gonderdiklerim
    public function friendof()
    {
        return $this->belongsToMany('App\Models\User', 'friends', 'friend_id', 'user_id');
    }


// ustdeki iki metod bunu gerceklewdirmek ucundur
    public function friends()
    {
        return $this->friendofMine()->wherePivot('accepted', true)->get()
            ->merge($this->friendof()->wherePivot('accepted', true)->get());
    }

    //mene gonderilen zaproslar
    public function friendRequests()
    {
        return $this->friendofMine()->wherePivot('accepted', false)->get();
    }

    //menim dostlug atdiglarim
    public function myRequests()
    {
        return $this->friendof()->wherePivot('accepted', false)->get();
    }


    // ест ли???? запрос на добавление в друзья какогото ползователя |auth olan men buna zapros atmisamsa ...
    public function hasFriendRequestPending(User $user)
    {
        return (bool)$this->myRequests()->where('id', $user->id)->count();
    }


// получил запрос о дружбе | auth olan men bunan zapros almosamsa
    public function hasFriendRequestReceived(User $user)
    {
        return (bool)$this->friendRequests()->where('id', $user->id)->count();
    }

    //dostlug gonder
    public function addFriend(User $user)
    {
        $this->friendof()->attach($user->id);
    }

//dostlugdan sil
    public function deleteFriend(User $user)
    {
        $this->friendof()->detach($user->id);
        $this->friendofMine()->detach($user->id);
    }

    //qebul et
    public function acceptFriendRequest(User $user)
    {
        $this->friendRequests()->where('id', $user->id)->first()->pivot->update([
            'accepted' => true
        ]);
    }

//bunan dosdurmu?
    public function isFriendWith(User $user)
    {
        return (bool)$this->friends()->where('id', $user->id)->count();
    }

    public function hasLikedStatus(Status $status)
    {
        return (bool) $status->likes()
            ->where('likeable_id',$status->id)
            ->where('likeable_type',get_class($status))
            ->where('user_id',$this->id)
            ->count();
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
