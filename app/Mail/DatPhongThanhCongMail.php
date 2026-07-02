<?php

namespace App\Mail;

use App\Models\DatPhong;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class DatPhongThanhCongMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datPhong;

   
    public function __construct(DatPhong $datPhong)
    {
        $this->datPhong = $datPhong;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Xác nhận đặt phòng thành công - Hotel Booking'
        );
    }

   
    public function content(): Content
    {
        return new Content(
            view: 'emails.datphongthanhcong',
            with: [
                'datPhong' => $this->datPhong
            ]
        );
    }

    /**
     * File đính kèm
     */
    public function attachments(): array
    {
        return [];
    }
}