<?php

function getSlugFromUrl() : ?string
{
    $requestUri = $_SERVER['REQUEST_URI']; // Ottieni l'URI richiesto
    $parts = explode('/', trim($requestUri, '/')); // Dividi l'URI in parti
    $slug = isset($parts[0]) ? $parts[0] : null; // Prendi la prima parte come slug
    return $slug;
    
}
?>