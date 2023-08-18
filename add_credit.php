<?php

include_once "inc/header.php";

use lib\Session;

?>
<?php


if (isset($_POST['log'])) {
}
$userID = (Session::get('rider')['id']);


$rider = new RiderTable();
$rider = $rider->readByid($userID);


?>
<main class="py-4 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header justify-content-between d-flex">
                        <div class="">
                            <h5 class="mt-10">Add Credit </h5>
                        </div>
                        <div>

                        </div>
                    </div>

                    <div class="card-body">
                        <form id="CreditAmountAddingFrom">
                            <div class="form-group row">
                                <label for="inputAmount" class="col-sm-2 col-form-label">Amount</label>
                                <div class="col-sm-10">
                                    <input type="number" min="1" class="form-control" id="inputAmount" value="500" readonly>
                                </div>
                            </div>

                            <button id="bKash_button" class="btn btn-primary" disabled="disabled">Pay With bKash</button>

                        </form>
                        <!-- <button id="bKash_button" disabled="disabled">Pay With bKash</button> -->



                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<script>
    let paymentID;

    let createCheckoutUrl = 'https://merchantserver.sandbox.bka.sh/api/checkout/v1.2.0-beta/payment/create';
    let executeCheckoutUrl = 'https://merchantserver.sandbox.bka.sh/api/checkout/v1.2.0-beta/payment/execute';

    $(document).ready(function() {
        $('#CreditAmountAddingFrom').submit(function(event) {
            event.preventDefault();
        });
        var amount = $('#inputAmount').val();
        // console.log(amount);
        initBkash(500);

    });




    function initBkash(amount) {
        bKash.init({
            paymentMode: 'checkout', // Performs a single checkout.
            paymentRequest: {
                "amount": amount,
                "intent": 'sale'
            },

            createRequest: function(request) {
                $.ajax({
                    url: createCheckoutUrl,
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(request),
                    success: function(data) {

                        if (data && data.paymentID != null) {
                            paymentID = data.paymentID;
                            bKash.create().onSuccess(data);
                        } else {
                            bKash.create().onError(); // Run clean up code
                            alert(data.errorMessage + " Tag should be 2 digit, Length should be 2 digit, Value should be number of character mention in Length, ex. MI041234 , supported tags are MI, MW, RF");
                        }

                    },
                    error: function() {
                        bKash.create().onError(); // Run clean up code
                        alert(data.errorMessage);
                    }
                });
            },
            executeRequestOnAuthorization: function() {
                $.ajax({
                    url: executeCheckoutUrl,
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        "paymentID": paymentID
                    }),
                    success: function(data) {

                        if (data && data.paymentID != null) {
                            // On success, perform your desired action
                            alert('[SUCCESS] data : ' + JSON.stringify(data));

                            $.ajax({
                                url: 'add_credit_api.php',
                                method: 'POST',
                                data: {
                                    credit_amount: amount,
                                },
                                dataType: 'json', // Assuming your PHP script returns JSON data
                                success: function(data) {
                                    console.log(data);
                                    // window.location.href = "/home.php";
                                
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error fetching data:', error);
                                }
                            });
                           

                        } else {
                            alert('[ERROR] data : ' + JSON.stringify(data));
                            bKash.execute().onError(); //run clean up code
                        }

                    },
                    error: function() {
                        alert('An alert has occurred during execute');
                        bKash.execute().onError(); // Run clean up code
                    }
                });
            },
            onClose: function() {
                alert('User has clicked the close button');
            }
        });

        $('#bKash_button').removeAttr('disabled');

    }
</script>


<?php include_once "inc/footer.php"; ?>