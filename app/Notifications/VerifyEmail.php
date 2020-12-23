<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
  //    use Queueable;

  // change as you want
  public function toMail($notifiable)
  {

    if (static::$toMailCallback) {
      return call_user_func(static::$toMailCallback, $notifiable);
    }

    if (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr') {
      // FRENCH VERSION
      return (new MailMessage)
        ->subject(Lang::get('Vérifier l\'adresse e-mail'))
        ->line(Lang::get('Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse e-mail et activer votre compte.'))
        ->action(
          Lang::get('Activer votre compte'),
          $this->verificationUrl($notifiable)
        )
        ->line(Lang::get('Si vous n\'avez pas créé de compte, aucune autre action n\'est requise.'));
    } else {
      // ENGLISH VERSION
      return (new MailMessage)
        ->subject(Lang::get('Verify Email Address'))
        ->line(Lang::get('Please click the button below to verify your email address and activate your account.'))
        ->action(
          Lang::get('Activate your account'),
          $this->verificationUrl($notifiable)
        )
        ->line(Lang::get('If you did not create an account, no further action is required.'));
    }
  }
}
