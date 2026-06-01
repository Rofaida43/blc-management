<?php

require 'vendor/autoload.php';

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

$driver = RemoteWebDriver::create(
    'http://127.0.0.1:4444',
    DesiredCapabilities::chrome()
);

try {

    /* =========================
       1. OUVRIR SITE
    ========================== */
    $driver->get('http://127.0.0.1:8000');

    sleep(3);

    /* =========================
       2. CLIQUER "GESTION CLIENTS"
    ========================== */
    $driver->findElement(WebDriverBy::linkText('Gestion clients'))
        ->click();

    sleep(3);

    /* =========================
       3. CLIQUER "NOUVEAU CLIENT"
    ========================== */
    $driver->findElement(WebDriverBy::linkText('Nouveau client'))
        ->click();

    /* attendre formulaire */
    $driver->wait(5)->until(
        WebDriverExpectedCondition::presenceOfElementLocated(
            WebDriverBy::name('nom')
        )
    );

    /* =========================
       4. REMPLIR FORMULAIRE
    ========================== */

    $driver->findElement(WebDriverBy::name('nom'))
        ->sendKeys('Client Selenium');
sleep(3);
    $driver->findElement(WebDriverBy::name('adresse'))
        ->sendKeys('Alger');
sleep(3);
    $driver->findElement(WebDriverBy::name('telephone'))
        ->sendKeys('0770000000');
sleep(3);
    $driver->findElement(WebDriverBy::name('email'))
        ->sendKeys('test@gmail.com');
sleep(3);
    $driver->findElement(WebDriverBy::name('type_client'))
        ->sendKeys('particulier');
sleep(3);
    /* =========================
       5. SUBMIT
    ========================== */

    $driver->findElement(WebDriverBy::cssSelector('button[type=submit]'))
        ->click();

    sleep(2);

    echo "Client créé avec succès\n";

} finally {
    $driver->quit();
}