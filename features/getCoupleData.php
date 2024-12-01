<?php
function getCoupleData($slug)
{
    // Esempio di utilizzo con il parametro slug
    $couple = getDataFromQuery("SELECT * FROM weds WHERE slug = :slug;", ['slug' => $slug]) ?? [];

    // Restituisci i dati della coppia o null se non trovati
    return $couple[0] ?? null;
}

?>