<html>
<head>
<title>Sandbox - PayPal demo check out page</title>

  <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
  <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '65.00'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                  alert('Transaction completed by ' + details.payer.name.given_name);
                    // Show a success message to the buyer
		              window.location = "complete.php?id="+details.id;
                });
            }


        }).render('#paypal-button-container');
    </script>
    
<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans');

body{
  background: #EEE;
}
body, input{
  font-family: "Open Sans", sans-serif;
  font-size: 1em;
}
h1{
  font-family: "Open Sans", sans-serif;
}
.item{
  width: 60px;
  vertical-align: middle;
  margin-right: 15px;
}
.button:hover{
  background: #33B5E5;
}
.checkout{
  margin: 0 auto;
  width: 350px;
}
.addr input{
  width: 100%;
  outline: none;
  border: 0px solid;
  padding: 5px;
}
#button{
  padding: 4px;
  color: black;
  text-align: center;
  margin-top: 20px;
  margin-bottom: 20px;
  border-radius: 5px 5px;
}
</style>
</head>
<body>
 <div class="checkout">
  <h1>Checkout</h1>
  <p>You are about to buy:</p>
  <p><img class="item" title="Image of Cover" src="https://i.imgur.com/knxv5oN.jpg" />The PayPal Wars for $65.00</p>
  <p>Ship to:</p>
   <div class="addr">
    <p>5 Temasek Boulevard<br/>
    #09-01 Suntec Tower Five<br/>
    038985<br/>
    Singapore</p>
   </div>
   <!--div id="button">PayPal Button Here</div-->
   <div id="paypal-button-container"></div>
</div>
</body>
</html>
