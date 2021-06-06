<?php
require APPROOT . '/views/includes/head.php';
?>
<div class="navbar dark">
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>
</div>
<?= $data['result'] ?>
<div class="container">
    <div class="row bg-light">
        <div class="col-md-10">
            <form action="<?= URLROOT ?>?url=pages/projects" method="post" id="form_id">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="forMobile" class="form-label">Enter The Number for Details</label>
                        <input type="number" name="number" class="form-control apilayer">
                        <span class="invalidFeedback"><?= $data['numberError'] ?></span>
                    </div>
                </div>
                <!-- <button type="submit" class="btn btn-success" name="verify" id="testForm">Submit</button> -->
                <button type="submit" class="btn btn-success" name="verify" id="testForm" onclick="apiData(event)">Submit</button>
            </form>
        </div>
    </div>
    <h3 class="display-3 mt-3" id="heading"></h3>
    <div class="row my-3">
        <span class="invalidFeedback" id="validError"></span>
        <div class="col-md-6">
            <span id="number"></span>
        </div>
        <div class="col-md-6">
            <span id="carrier"></span>
        </div>
        <div class="col-md-6">
            <span id="country_name"></span>
        </div>
        <div class="col-md-6">
            <span id="location"></span>
        </div>
    </div>
</div>
<script>
    function apiData(event) {
        event.preventDefault();
        let form = document.getElementById('form_id');
        let access_key = '9a0fa759fed6691d3e465a951e2f1df6';
        let number = document.querySelector('.apilayer').value;
        let url = 'http://apilayer.net/api/validate?access_key=' + access_key + '&number=' + number + '&country_code=IN&format=1';
        $.ajax({
            url: url,
            dataType: "jsonp",
            success: function(response) {
                // console.log(response);
                if (response.valid === true) {
                    document.getElementById('heading').innerText = 'Details are below : ';
                    document.getElementById('number').innerText = 'Phone Number : +' + response.number;
                    document.getElementById('carrier').innerText = 'Carrier : ' + response.carrier;
                    document.getElementById('country_name').innerText = 'Country : ' + response.country_name;
                    document.getElementById('location').innerText = 'Location : ' + response.location;
                    document.getElementById('validError').innerText = '';
                    form.reset();
                } else {
                    document.getElementById('validError').innerText = 'Invalid Phone Number! Please add a Valid Number';
                    document.getElementById('number').innerText = '';
                    document.getElementById('carrier').innerText = '';
                    document.getElementById('country_name').innerText = '';
                    document.getElementById('location').innerText = '';
                }
            }
        });
    }
</script>