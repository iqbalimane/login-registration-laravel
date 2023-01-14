<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
}
    $encrypted_password = crypt::encrypt($data['password']);
    $req->session()->flash('register_status','User has been registered successfully');
    return redirect('/register');
         function registerUser(Request $req){
        $validateData = $req->validate([
         'name' => 'required|regex:/^[a-z A-Z]+$/u',
         'email' => 'required|email',
         'password' => 'required|min:6|max:12',
         'confirm_password' => 'required|same:password',
        'mobile' => 'numeric|required|digits:10'
    ]);
    $result = DB::table('users')
    ->where('email',$req->input('email'))
    ->get();
    
    $res = json_decode($result,true);
    print_r($res);
    
    if(sizeof($res)==0){
    $data = $req->input();
    $user = new User;
    $user->name = $data['name'];
    $user->email = $data['email'];
    $encrypted_password = crypt::encrypt($data['password']);
    $user->password = $encrypted_password;
    $user->mobile = $data['mobile'];
    $user->save();
    $req->session()->flash('register_status','User has been registered successfully');
    return redirect('/register');
    }
    else{
    $req->session()->flash('register_status','This Email already exists.');
    return redirect('/register');
    }
    }
    function login(Request $req){
        $validatedData = $req->validate([
        'email' => 'required|email',
        'password' => 'required'
        ]);
        
        $result = DB::table('users')
        ->where('email',$req->input('email'))
        ->get();
        
        $res = json_decode($result,true);
        print_r($res);
        
        if(sizeof($res)==0){
        $req->session()->flash('error','Email Id does not exist. Please register yourself first');
        echo "Email Id Does not Exist.";
        return redirect('login');
        }
        else{
        echo "Hello";
        $encrypted_password = $result[0]->password;
        $decrypted_password = crypt::decrypt($encrypted_password);
        if($decrypted_password==$req->input('password')){
        echo "You are logged in Successfully";
        $req->session()->put('user',$result[0]->name);
        return redirect('/');
        }
        else{
        $req->session()->flash('error','Password Incorrect!!!');
        echo "Email Id Does not Exist.";
        return redirect('login');
        }
        }
        }