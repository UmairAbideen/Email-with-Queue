<!--

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

// This class builds the email and can be queued (it implements ShouldQueue)
class TestingMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $title;
    public $subject;
    public $body;
    public $attachmentPath;

    public function __construct($title, $subject, $body, $attachmentPath)
    {
        $this->title = $title;
        $this->subject = $subject;
        $this->body = $body;
        $this->attachmentPath = $attachmentPath;
    }

    public function build()
    {
        // Start building email with subject and blade view
        $email = $this->subject($this->subject)
            ->view('message')
            ->with([
                'title' => $this->title,
                'body' => $this->body,
            ]);

        // Attach file if path is provided
        if ($this->attachmentPath) {
            $email->attach($this->attachmentPath);
        }

        return $email;
    }
} -->
