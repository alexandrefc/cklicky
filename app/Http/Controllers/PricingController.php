<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PricingController extends Controller
{
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

        return view('pricing.success', compact('sessionId'));
    }

    public function createCheckoutSession()
    {
        \Stripe\Stripe::setApiKey('sk_test_51JD6nUBKVezto0GXr3gTPK0uJuspZw8ZsOWFpRxzcR9IlvtwFdKZrhjZhYKVIz4EspkOVztPOnYosFJwUv1HOeTn00BuBpp4vH');

            header('Content-Type: application/json');

            $YOUR_DOMAIN = 'http://cklicky.test';

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
        \Stripe\Stripe::setApiKey('sk_test_51JD6nUBKVezto0GXr3gTPK0uJuspZw8ZsOWFpRxzcR9IlvtwFdKZrhjZhYKVIz4EspkOVztPOnYosFJwUv1HOeTn00BuBpp4vH');

        header('Content-Type: application/json');

        $YOUR_DOMAIN = 'http://clicky.test/success.html';

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
        
        // webhook.php
        //
        // Use this sample code to handle webhook events in your integration.
        //
        // 1) Paste this code into a new file (webhook.php)
        //
        // 2) Install dependencies
        //   composer require stripe/stripe-php
        //
        // 3) Run the server on http://localhost:4242
        //   php -S localhost:4242


        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = 'whsec_qC5UYBo9CGpT9gF18YM1MItu1lH3TgaH';



        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
        $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, $endpoint_secret
        );
        } catch(\UnexpectedValueException $e) {
        // Invalid payload
        http_response_code(400);
        exit();
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
        // Invalid signature
        http_response_code(400);
        exit();
        }

        // Handle the event
        switch ($event->type) {
        case 'invoice.payment_succeeded':
            $invoice = $event->data->object;
        case 'payment_intent.succeeded':
            $paymentIntent = $event->data->object;
        case 'subscription_schedule.expiring':
            $subscriptionSchedule = $event->data->object;
        // ... handle other event types
        default:
            echo 'Received unknown event type ' . $event->type;
        }

        http_response_code(200);
    }
}
