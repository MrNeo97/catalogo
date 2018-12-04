<!--para mostrar los errores-->
<?php if ( $feedback == 'negative') : ?>
    <div class="errorf">
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>


<?php if ( $feedback == 'positive') : ?>
    <div class="errorf">
        <ul>
            <?php foreach (Session::get('feedback_positive') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>