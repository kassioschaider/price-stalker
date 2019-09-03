<?php $titulo = 'Price Seeker'; include __DIR__ . '/../view/header.php'; ?>

    <form>
        <div class="form-group">
            <label for="descricao">Bar Code</label>
            <input type="text" id="descricao" name="descricao" class="form-control">
        </div>
        <button class="btn btn-primary">Seek</button>
    </form>

<?php

require __DIR__ . '/../vendor/autoload.php';

use KassioSchaider\PriceStalker\Controller\PriceSeekerCliqueFarma;

$priceSeeker = new PriceSeekerCliqueFarma();
$prices = $priceSeeker->seek('7899026437210');

//echo '<pre>';
//var_dump($prices);
//echo '</pre>';

foreach ($prices as $price)
{
   echo $price . PHP_EOL;
}

include __DIR__ . '/../view/footer.php';