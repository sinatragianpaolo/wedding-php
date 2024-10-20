<?php

function getSlugFromUrl(): ?string
{
    // Ottieni l'URI richiesto e rimuovi la parte dei parametri di query se presente
    $requestUri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

    // Dividi l'URI in parti
    $parts = explode('/', trim($requestUri, '/'));

    // Prendi la prima parte come slug
    $slug = isset($parts[0]) ? $parts[0] : null;

    return $slug;

}
?>