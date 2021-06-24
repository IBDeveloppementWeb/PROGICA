<?php

namespace App\Notification;

use App\Entity\Contact;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class ContactNotification
{
    public $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function notify(Contact $contact)
    {
        $email = (new TemplatedEmail())
            ->to("contact@progica.fr")
            ->from($contact->getEmail())
            ->subject("Demande de renseignement")
            ->htmlTemplate('Notification/contact.html.twig')
            ->context(['contact' => $contact]);
        $this->mailer->send($email);
    }
}
