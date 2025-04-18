📬 Laravel 10 Email Queue System
This Laravel 10 project demonstrates how to send emails asynchronously using Queues and Jobs, with optional PDF attachments. Email logic is moved into Jobs for better performance and clean architecture.

🌟 Why Use This?
Sending emails directly in the request cycle can slow down your app — especially when generating attachments like PDFs. This project uses Laravel Queues to handle email sending in the background, keeping your app fast and responsive.

Great for:

Contact forms

Newsletters

Invoicing systems

Any feature where emails shouldn't delay user experience

🚀 Features
✅ Send basic email with subject & message
✅ Send email with PDF attachment (using DomPDF)
✅ Use Laravel Queues to send emails in the background
✅ Optional Job-based approach (no need for Mailable class)

🧰 Tech Stack

Tool	Description
Laravel	v10.x — PHP framework
Mail	Laravel Mail with queue() method
Jobs	php artisan make:job
Queue	Database driver
Worker	php artisan queue:work
Blade	For email and form views
SMTP	Gmail (used for sending email)
💡 Concept
This project uses Laravel Queues to handle email sending via SendEmailJob, which internally uses Mail::send().

✅ Two common email strategies in Laravel:

Method	Use Case
Mail::send()	Quick, inline email setup
Mailable Class	Reusable, complex email setup
This project shows how to skip Mailable class and use Job + Mail::send directly — cleaner when sending simple or dynamic emails via background jobs.

⚙️ Important Commands
bash
Copy
Edit
# 1. Setup Queue
php artisan queue:table
php artisan migrate

# 2. Start worker
php artisan queue:work
🛠️ Keep queue:work running in a terminal window while testing queued emails.
