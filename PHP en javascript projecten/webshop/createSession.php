<?php
    require 'vendor/autoload.php';
    \Stripe\Stripe::setApiKey("sk_test_51HQzHtJ3nASyy72JWlCodFdQe267RlZSPSAw20HOR1ak55fqm0g0RRCdSmVpr8FnEejDrCZxT83OXLfYJySArL4K00X6EXILLt");

    $content = trim(file_get_contents("php://input"));
    $contentArray = json_decode($content, true);
    $paymentMethod = $contentArray["method"];
    $price = 0;
    $cookie = $_COOKIE["currentProductsInCart"];
    $products = json_decode($cookie);
    const YOUR_DOMAIN = "http://localhost:8012/webshop";

    $productsArray = array();
    foreach($products as $product)
    { 
        $productData =  ['price_data' => [

            'currency' => 'eur',
        
            'unit_amount' => $product[1] * 100,
        
            'product_data' => [
        
                'name' => $product[0] . " Size: " . strtoupper($product[3])
        
            ],
        
        ],
        
            'quantity' => $product[4],
    ];

        array_push($productsArray, $productData);
    }

    $checkout_session = \Stripe\Checkout\Session::create([

        'payment_method_types' => [$paymentMethod],
      
        'line_items' => $productsArray,
      
        'mode' => 'payment',
      
        'success_url' => YOUR_DOMAIN . '/orderSucces.php',
      
        'cancel_url' => YOUR_DOMAIN . '/orderCancel.php',
      
      ]);
    
      echo json_encode(['id' => $checkout_session->id]);
?>