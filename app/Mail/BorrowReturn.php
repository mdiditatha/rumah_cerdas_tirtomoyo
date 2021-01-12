<?php

namespace App\Mail;

use App\Models\Borrow;
use App\Models\Returns;
use Illuminate\Support\Facades\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BorrowReturn extends Mailable
{
    use Queueable, SerializesModels;

    public $borrow, $borrow_return;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Borrow $borrow, Returns $borrow_return)
    {
        $this->borrow = $borrow;
        $this->borrow_return = $borrow_return;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(env('MAIL_USERNAME', 'edwardthemangare@gmail.com')) // ganti <username> dengan username akun Gmail Anda.
            ->view('mail.borrowreturn')
            ->withSwiftMessage(function($message) {
                $message
                    ->getHeaders()
                    ->addTextHeader('Rumah Cerdas Tirta Cendikia', 'Rumah Cerdas Tirta Cendikia');
            });
            /*->attach('/uploads/'.$this->borrow->codebook->book->image_cover, [
                'as' => 'book_image.jpg',
                'mime' => 'image/jpeg',
            ]);*/
    }
}
