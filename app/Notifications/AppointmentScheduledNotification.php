<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentScheduledNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $appointment;
    private $doctor;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($appointment, $doctor)
    {
        $this->appointment = $appointment;
        $this->doctor = $doctor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Appointment Scheduled')
                    ->greeting('Hello ' . $notifiable->name . '!')
                    ->line('Dr. ' . $this->doctor->name . ' has scheduled an appointment with you.')
                    ->line('**Appointment Details:**')
                    ->line('Date: ' . $this->appointment->date)
                    ->line('Doctor: ' . $this->doctor->name . ' (' . $this->doctor->speciality . ')')
                    ->line('Message: ' . $this->appointment->message)
                    ->action('View My Appointments', url('/myappointments'))
                    ->line('Please contact the hospital if you need to reschedule or cancel this appointment.')
                    ->salutation('Best regards, One Health Hospital');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'appointment_id' => $this->appointment->id,
            'doctor_name' => $this->doctor->name,
            'doctor_speciality' => $this->doctor->speciality,
            'appointment_date' => $this->appointment->date,
            'message' => $this->appointment->message,
            'type' => 'appointment_scheduled'
        ];
    }
}