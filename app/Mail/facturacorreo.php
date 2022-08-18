<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class facturacorreo extends Mailable
{
    use Queueable, SerializesModels;
    public $usuario;
    public $factura;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $factura)
    {
        //
        $this->usuario = $usuario;
        $this->factura = $factura;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.correofactura');
    }
}
