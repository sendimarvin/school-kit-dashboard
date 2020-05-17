<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <div class="container">
        <?php require_once 'includes/navbar.php'?>
        <div>
            <!-- <h2>here</h2> -->
            <h3>System settigs</h3>
            <hr>

            <table style="width:85%">
            
                <tr>
                    <td >
                        <button class="btn btn-danger" onClick="resetSystem(0)">Reset System</button>
                    </td>
                    <td >
                        &nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td >
                        <button class="btn btn-default" onClick="resetSystem(1)">Truncate System</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        &nbsp;
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h4>Monthly Charge</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <input type="number" class="form-control" id="charge" name="charge" disabled="true">
                        </div>
                    </td>
                    <td>
                        &nbsp; &nbsp;<button class="btn btn-default" onClick="updateMonthlyCharge()" id="edit-charge">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        &nbsp;
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h4>Payment API Creditials</h4>
                        <div class="form-group">
                            <label for="payment-id" class="col-form-label">Client ID:</label>
                            <input type="password" class="form-control updatePaymentDetails" id="payment-id" name="payment-id" disabled>
                        </div>
                        <div class="form-group">
                            <label for="payment-key" class="col-form-label">Key:</label>
                            <input type="password" class="form-control updatePaymentDetails" id="payment-key" name="payment-key" disabled>
                        </div>
                        <div class="form-group">
                            <label for="payment-currency" class="col-form-label">Currency:</label>
                            <input type="text" class="form-control updatePaymentDetails" id="payment-currency" name="payment-currency" disabled>
                        </div>
                        <div class="form-group">
                            <label for="payment-message" class="col-form-label">Request Message:</label>
                            <input type="text" class="form-control updatePaymentDetails" id="payment-message" name="payment-message" disabled>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-default" onClick="updatePaymentDetails()" id="updatePaymentDetails">Edit</button>
                        </div>
                        
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        &nbsp;
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h4>Company Details</h4>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email(s):</label>
                            <input type="text" class="form-control" id="email" name="email" >
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-form-label">Phone (s):</label>
                            <input type="text" class="form-control" id="phone" name="phone" >
                        </div>
                        <div class="form-group">
                            <label for="website" class="col-form-label">Website:</label>
                            <input type="text" class="form-control" id="payment-website" name="website" >
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-form-label">Company Address:</label>
                            <input type="text" class="form-control" id="address" name="address" >
                        </div>
                        <div class="form-group">
                            <label for="policy" class="col-form-label">Company Policy:</label>
                            <textarea name="" id="policy" name="policy" class="form-control textarea" cols="30" rows="10" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="about" class="col-form-label">Company About:</label>
                            <textarea name="" id="about" name="about" class="form-control textarea" cols="30" rows="10"></textarea>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-default" onClick="updatecompanyDetails()" >Update</button>
                        </div>
                    </td>
                </tr>
            </table>

            

        </div>
    </div>
    <!-- jQuery v3.2.1  -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/ckeditor/ckeditor.js"></script>
    <script>


    $(function () {
        setSettingsData();
    });


    function updatePaymentDetails () {
        let buttonValue = $('#updatePaymentDetails').html().trim();
        if (buttonValue == 'Edit') {
            $('.updatePaymentDetails').prop('disabled', false);
            $('#updatePaymentDetails').html('Update');
        } else {
            $('.updatePaymentDetails').prop('disabled', true);
            $('#updatePaymentDetails').html('Edit');


            let payment_username = $('#payment-id').val();
            let payment_password = $('#payment-key').val();
            let payment_currency = $('#payment-currency').val();
            let payment_message = $('#payment-message').val();


            let dataToSave  = {payment_username, payment_password, payment_currency, payment_message};

            $.post('http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?save_payment_details', dataToSave, resp => {
                window.alert('Update successfull');  
            });


        }
    }


    function updatecompanyDetails () {
        let email = $('#email').val();
        let phone = $('#phone').val();
        let website = $('#payment-website').val();
        let address = $('#address').val();
        let policy = CKEDITOR.instances.policy.getData()
        let about = CKEDITOR.instances.about.getData()

        let dataToSave  = {email, phone, website, address, policy, about};

        $.post('http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?save_company_details', dataToSave, resp => {
            try {
                // resp = JSON.parse(resp);
                // console.log(resp);
                window.alert('Update successfull');
            } catch (e) {

            }
        });


    }
    function setSettingsData () {
        $.getJSON('http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?get_settings', {}, function (response) {
            try {
                // console.log(response);
                $('#charge').val(response.charge);
                $('#payment-id').val(response.payment_username);
                $('#payment-key').val(response.payment_password);
                $('#payment-message').val(response.payment_message);
                $('#payment-currency').val(response.payment_currency);
                $('#email').val(response.email);
                $('#phone').val(response.phone);
                $('#payment-website').val(response.website);
                $('#address').val(response.address);
                $('#policy').val(response.policy);
                $('#about').val(response.about);

                CKEDITOR.replace( 'policy' );
                CKEDITOR.replace( 'about' );

                // 


            } catch (e) {

            }
        });
    }
    

    function updateMonthlyCharge () {
        if ($('#charge').prop('disabled')) {
            $('#charge').prop('disabled', false);
            $('#edit-charge').html('Save');
        } else {
            $('#charge').prop('disabled', true);
            $('#edit-charge').html('Edit');

            let charge = +$('#charge').val();
            $.post('http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?update_charge', 
                {user_id: 1, charge: charge}, resp => {
                    window.alert('Update successfull');    
            });
        }
    }

    function resetSystem (type = 0) {
        var r = confirm("Are you sure you want to reset the system. This will delete all transctions. Please first make a backup.");
        if (r == true) {
            $.post('http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?reset_system', {user_id: 1, type: type}, resp => {
                window.alert('Update successfull');   
            });
        } else;
    }
    </script>
</body>
</html>