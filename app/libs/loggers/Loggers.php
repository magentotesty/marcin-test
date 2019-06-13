<?php

namespace test\app\libs\loggers;

interface Loggers
{
    public function log($action, $messages);
}