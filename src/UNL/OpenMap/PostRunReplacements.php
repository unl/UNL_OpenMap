<?php

interface UNL_OpenMap_PostRunReplacements
{
    static function setReplacementData($field, $data);
    public function postRun($data);
}
