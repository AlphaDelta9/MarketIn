<?php

function convertCurrency($amount)
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}
