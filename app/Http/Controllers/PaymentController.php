<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Payment;
use App\Carrito;

class PaymentController extends Controller
{
 
    public $gateway;
 
Private $PAYPAL_CLIENT_ID;
Private $PAYPAL_CLIENT_SECRET;
Private $PAYPAL_CURRENCY;
Private $carrito;
    public function __construct()
    {
        $this->PAYPAL_CLIENT_ID= "AeJycy3Cc4x4jOlSe30esWRNGMuzQnRweNaZiykjB3Mgkt0R6t3rUKuBwLWjqQGc8FHoTwXXBp4xhkB0";       
        $this->PAYPAL_CLIENT_SECRET="EBpxMYxF0Dx_1r7M6rUy4Kp8uYW5pAAXM1Fnd_pAY73rH47on08raKZ_j82Llh8PIqs7UOhGwAfdgm4p";
        $this->PAYPAL_CURRENCY="USD";
        $this->carrito =4;
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId($this->PAYPAL_CLIENT_ID);
        $this->gateway->setSecret($this->PAYPAL_CLIENT_SECRET);
        $this->gateway->setTestMode(true); //set it to 'false' when go live
    }
 
    public function index()
    {
        return view('payment');
    }
 
    public function charge(Request $request)
    {
        if($request->input('submit'))
        {
            $this->carrito =$request->input('carrito');
            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $request->input('amount'),
                    'currency' => $this->PAYPAL_CURRENCY,
                    'returnUrl' => url('paymentsuccess'),
                    'cancelUrl' => url('paymenterror'),
                ))->send();
          
                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    return $response->getMessage();
                }
            } catch(Exception $e) {
                return $e->getMessage();
            }
        }
    }
 
    public function payment_success(Request $request)
    {
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID'))
        {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();
         
            if ($response->isSuccessful())
            {
                // The customer has successfully paid.
                $arr_body = $response->getData();
         
                // Insert transaction data into the database
                $isPaymentExist = Payment::where('payment_id', $arr_body['id'])->first();
         
                if(!$isPaymentExist)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_body['id'];
                    $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                    $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                    $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                    $payment->currency = $this->PAYPAL_CURRENCY;
                    $payment->payment_status = $arr_body['state'];
                    $payment->save();
                }
                   $this->carrito = $this->pedido();
                   return redirect()->route('pedido.edit',$this->carrito) ;
               // return "Payment is successful. Your transaction id is: ". $arr_body['id'].'carrito:'.$this->carrito;
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction is declined';
        }
    }
 
    public function payment_error()
    {
          return redirect()->route('home')->with('status_success','ah decidido cancelar el pago, esperamos se anime la proxima vez');
            }
 
    public function pedido()
    {
        $hola= Carrito::where('user_id',auth()->user()->id)->first(); 
        return $hola->id;
    }
}