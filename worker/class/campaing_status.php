<?php

namespace leads\cls {

    class campaing_status {

        const CREATED = 1;
        const ACTIVE = 2;
        const PAUSED = 3;
        const BLOCKED_BY_PAYMENT = 4;
        const DELETED = 5;
        const ENDED = 6;

        static public function Defines($const) {
            $cls = new ReflectionClass(__CLASS__);
            foreach ($cls->getConstants() as $key => $value) {
                if ($value == $const) {
                    return true;
                }
            }

            return false;
        }

    }

}