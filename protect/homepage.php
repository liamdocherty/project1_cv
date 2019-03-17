<?php
//check if session id is set. If it is not set, user will be redirected back to login page
   session_start();

if(!isset($_SESSION['username'])){
     header('Location:index.php');
     die();
}
?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Site title, CSS external file and font awesome -->
      <title>Login Page - Created by Liam Docherty</title>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="login_script.css">

   </head>
   <body>
      <!-- structure -->
      <div class="container">
         <div class="py-5 text-center">
            <h1 class="text-uppercase">Secret form that is in development</h1>
            <p class="lead">Below is an example text will go. </p>
         </div>
         <!-- cart -->
         <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
               <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-muted">Your cart</span>
                  <span class="badge badge-secondary badge-pill">3</span>
               </h4>
               <ul class="list-group mb-3">
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                     <div>
                        <h6 class="my-0">Product one</h6>
                        <small class="text-muted">Brief description</small>
                     </div>
                     <span class="text-muted">£90</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                     <div>
                        <h6 class="my-0">Product two</h6>
                        <small class="text-muted">Brief description</small>
                     </div>
                     <span class="text-muted">£50</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between bg-light">
                     <div class="text-success">
                        <h6 class="my-0">Promo code</h6>
                        <small>EXAMPLECODE</small>
                     </div>
                     <span class="text-success">-£90</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                     <span>Total (GBP)</span>
                     <strong>£50</strong>
                  </li>
               </ul>
               <form class="card p-2">
                  <div class="input-group">
                     <input type="text" class="form-control" placeholder="Promo code">
                     <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                     </div>
                  </div>
               </form>
            </div>
            <div class="col-md-8 order-md-1">
               <h4 class="mb-3 text-uppercase">Billing information</h4>
               <form class="needs-validation" novalidate>
                  <div class="row">
                     <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                           Valid first name is required.
                        </div>
                     </div>
                     <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                           Valid last name is required.
                        </div>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="username">Username</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" id="username" placeholder="Username" required>
                        <div class="invalid-feedback" style="width: 100%;">
                           Your username is required.
                        </div>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="email">Email <span class="text-muted">(Optional)</span></label>
                     <input type="email" class="form-control" id="email" placeholder="you@example.com">
                     <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="address">Address</label>
                     <input type="text" class="form-control" id="address" placeholder="34 Hoxton liam street" required>
                     <div class="invalid-feedback">
                        Please enter your shipping address.
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-5 mb-3">
               <!-- Logout button -->
                <a class="btn btn-primary" href="index.php" role="button">Signout button</a>
               </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
