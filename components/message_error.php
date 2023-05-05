<?php if (isset($messageError)): ?>
<div class="message_error_block">
    <?php foreach($messageError as $message):?>
    <p class="pd24w600 message_error titre_account">
        <?=$message?>
    </p>
    <?php endforeach ?>
</div>
<?php endif ?>