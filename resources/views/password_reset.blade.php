@component('mail::message')
# Password Reset Request

Dear AlQuranULAzeem User,

We have received your request to reset your password. Please click the link below to complete the reset:

@component('mail::button', ['url' => 'http://localhost:8000/api/auth/update_password?token='.$token])
Reset My Password
@endcomponent

If you did not make this change, ignore this message, or contact alquranulazeem40770@gmail.com.

Cheers,<br>
The AlQuranULAzeem Team

@endcomponent
