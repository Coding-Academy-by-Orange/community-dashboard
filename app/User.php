<?php

namespace App;

use App\Messages\Osms;
use App\Notifications\PasswordReset;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Console\Migrations\RollbackCommand;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Response;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // one to many relationship
    public function personalInformation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\PersonalInformation', 'user_id');
    }

    // many to many relationship
    public function questionnaires(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('App\Questionnaire')->withPivot(['answer'])->withTimestamps();
    }

    // one to many relationship
    public function english_quiz(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\EnglishQuiz', 'user_id');
    }

    // one to many relationship
    public function code_challenge(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\CodeChallenge', 'user_id');
    }


    public static function updateAndSendSMS($content)
    {
        self::where('id', auth()->id())->update([
//            'mobile' => $content['receiverMobile'],
            'mobile_verification' => $content['code']
        ]);

        $sendSms = self::sendSms($content);

        return $sendSms;
    }

    public static function sendSms($content)
    {
        $senderMobile = $content['senderMobile'];
        $receiverMobile = $content['receiverMobile'];
        $code = $content['code'];
        $getToken = (new \App\Messages\Osms)->getTokenFromConsumerKey();
        $token = [
            'token' => $getToken['access_token']
        ];

        $osms = new Osms($token);
        $response = $osms->sendSms(
        // sender
            'tel:+962' . $senderMobile,
            // receiver
            'tel:+962' . $receiverMobile,
            // message
            "Your Orange Coding Academy \nActivation Code is " . $code . "\n\nCovid vaccination certificate is a basic requirement to enter the academy; we take care of your health. \nDo not share it with anyone "
        );

        if (empty($response['error'])) {
            return Response::HTTP_ACCEPTED;
        } else {
            return Response::HTTP_BAD_REQUEST;
        }
    }

    public function sendPasswordResetNotification($email_token)
    {
        $this->notify(new PasswordReset($email_token));
    }
}
