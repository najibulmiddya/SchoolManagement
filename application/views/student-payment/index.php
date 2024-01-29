<?php
require APPPATH . 'third_party/config.php';
?>
<form action="<?= base_url('Payment/paymentHistory') ?>" method="post">
    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?= $Publishablekey ?>" data-amount="500" data-name="Najibul Middya" data-description="Student Payment" data-image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVn6IJ-nVani9TZqTgQuolGmuHRA9IT0kFFg&usqp=CAU" data-currency="inr" data-id="250">
       
    </script>
    <input type="hidden" name="cid">
</form>