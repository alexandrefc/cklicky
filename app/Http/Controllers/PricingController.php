<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\PaymentCompleted;

class PricingController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth', ['except' => ['index', 'webhook']]);
      
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pricing.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function success() {

        $sessionId = $_GET["session_id"];
        $userId = auth()->user()->id;
        $addAdmin = (new User())->addAdmin($userId);

        // event(new PaymentCompleted($userId));
       

        return view('pricing.success', compact('sessionId'));
    }

    public function cancel() {


        return view('pricing.cancel');
    }

    public function createCheckoutSession()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        

            header('Content-Type: application/json');

            $YOUR_DOMAIN = 'https://cklicky.com';

            try {
            $prices = \Stripe\Price::all([
                // retrieve lookup_key from form data POST body
                'lookup_keys' => [$_POST['lookup_key']],
                'expand' => ['data.product']
            ]);

            $checkout_session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                'price' => $prices->data[0]->id,
                'quantity' => 1,
                ]],
                'mode' => 'subscription',
                'success_url' => $YOUR_DOMAIN . '/success.html?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
            ]);

            

            header("HTTP/1.1 303 See Other");
            header("Location: " . $checkout_session->url);
            } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
            }
    }

    public function createPortalSession()
    {
    
        // This is your real test secret API key.
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        header('Content-Type: application/json');

        $YOUR_DOMAIN = 'https://cklicky.com/success.html';

        try {
        // retrieve JSON from POST body
        $json_str = file_get_contents('php://input');
        $json_obj = json_decode($json_str);
        // $checkout_session = \Stripe\Checkout\Session::retrieve($json_obj->session_id);
        $checkout_session = \Stripe\Checkout\Session::retrieve($_POST['session_id']);
        $return_url = $YOUR_DOMAIN;

        // Authenticate your user.
        $session = \Stripe\BillingPortal\Session::create([
            'customer' => $checkout_session->customer,
            'return_url' => $return_url,
        ]);
        header("HTTP/1.1 303 See Other");
        header("Location: " . $session->url);
        } catch (Error $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function webhook()
    {

       
        // This is your real test secret API key.
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        // Replace this endpoint secret with your endpoint's unique secret
        // If you are testing with the CLI, find the secret by running 'stripe listen'
        // If you are using an endpoint defined with the API or dashboard, look in your webhook settings
        // at https://dashboard.stripe.com/webhooks
        $endpoint_secret = env('STRIPE_ENDPOINT_SECRET');
        
        
        $payload = @file_get_contents('php://input');
        $event = null;
        
        try {
          $event = \Stripe\Event::constructFrom(
            json_decode($payload, true)
          );
        } catch(\UnexpectedValueException $e) {
          // Invalid payload
          echo '⚠️  Webhook error while parsing basic request.';
          http_response_code(400);
          exit();
        }
        if ($endpoint_secret) {
          // Only verify the event if there is an endpoint secret defined
          // Otherwise use the basic decoded event
          $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
          try {
            $event = \Stripe\Webhook::constructEvent(
              $payload, $sig_header, $endpoint_secret
            );
          } catch(\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            echo '⚠️  Webhook error while validating signature.';
            http_response_code(400);
            exit();
          }
        }
        
        // Handle the event
        switch ($event->type) {
          case 'payment_intent.succeeded':
            $paymentIntent = $event->data->object->charges->data[0]->billing_details; // contains a \Stripe\PaymentIntent
            // Then define and call a method to handle the successful payment intent.
            // handlePaymentIntentSucceeded($paymentIntent);

            event(new PaymentCompleted($paymentIntent));
            
            break;
          case 'payment_method.attached':
            $paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
            // Then define and call a method to handle the successful attachment of a PaymentMethod.
            // handlePaymentMethodAttached($paymentMethod);
            break;
          default:
            // Unexpected event type
            error_log('Received unknown event type');
        }
        
        http_response_code(200);
        
       
    }
}
