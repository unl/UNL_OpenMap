<?php

interface UNL_TourMap_PostRunReplacements
{
    static function setReplacementData($field, $data);
    public function postRun($data);
}
