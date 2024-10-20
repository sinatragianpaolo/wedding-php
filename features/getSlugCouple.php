<?php

function getSlugCouple(string|false $slug): false|string
{


    if ($slug === false) {
        return false;
    }

    // Esempio di utilizzo con il parametro slug
    $couple = getDataFromQuery("SELECT slug FROM weds WHERE slug = :slug;", ['slug' => $slug]) ?? [];

    // Ritorna il valore se esiste, altrimenti false
    return $couple['slug'] ?? false;
}
?>
