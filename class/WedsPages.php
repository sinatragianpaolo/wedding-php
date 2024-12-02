<?php
class WedsPages {
    public $pages;
    public function __construct($wedId) {
        $this->pages = $this->getWedsPages($wedId);
    }
    public function getWedsPages($wedId) {
        $result = getDataFromQuery("SELECT * FROM pages where weds_id = :wed_id", ['wed_id' => $wedId]);
        return $result;
    }
}