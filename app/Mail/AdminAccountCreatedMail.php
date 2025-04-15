<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class AdminAccountCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $defaultPassword;
    private $barcodePath;

    // Cập nhật constructor
    public function __construct(User $user, $defaultPassword, $barcodePath)
    {
        $this->user = $user;
        $this->defaultPassword = $defaultPassword;
        $this->barcodePath = $barcodePath;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Tài khoản Quản trị viên đã được tạo',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-created', // File view bạn đã tạo
            with: [
                'username' => $this->user->username, // Dùng từ đối tượng $user
                'email' => $this->user->email,       // Dùng từ đối tượng $user
                'password' => $this->defaultPassword, // Truyền mật khẩu mặc định
                'barcodePath' => $this->barcodePath, // Đường dẫn mã vạch
            ]
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->barcodePath)
                ->as('barcode.png')
                ->withMime('image/png'),
        ];
    }
}
