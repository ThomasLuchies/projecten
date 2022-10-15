<?php
// This example sets up an endpoint using the Slim framework.
// Watch this video to get started: https://youtu.be/sGcNPFX1Ph4.

use Slim\Http\Request;
use Slim\Http\Response;
use Stripe\Stripe;
use \Slim\App;

require '../vendor/autoload.php';

$app = new App();

$app->add(function ($request, $response, $next) {
  // Set your secret key. Remember to switch to your live secret key in production!
  // See your keys here: https://dashboard.stripe.com/account/apikeys
  \Stripe\Stripe::setApiKey('sk_test_51HQzHtJ3nASyy72JWlCodFdQe267RlZSPSAw20HOR1ak55fqm0g0RRCdSmVpr8FnEejDrCZxT83OXLfYJySArL4K00X6EXILLt');

  return $next($request, $response);
});

$content = trim(file_get_contents("php://input"));
$contentArray = json_decode($content, true);
$product = $contentArray["tournamentName"];
$app->post('/', function (Request $request, Response $response) {
  $paymentId = md5(uniqid(rand(), true));
  $session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card', 'ideal'],
    'line_items' => [[
      'price_data' => [
        'currency' => 'eur',
        'product_data' => [
          'name' => 'test',
        ],
        'unit_amount' => 2500,
      ],
      'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => "https://" . $_SERVER["HTTP_HOST"] . '/succes.php?paymentId=' . $paymentId,
    'cancel_url' => 'https://' . $_SERVER["HTTP_HOST"],
  ]);
  return $response->withJson([ 'id' => $session->id, 'paymentId' => $paymentId])->withStatus(200);
});

$app->run();
