<?php

namespace App\Utils\Enumerables;

class EnterpriseUpdateStatusEnum {
    const PUNCTUAL = 0;
    const LATE = 1;
    const LOST = 2;


    public static function getStatus($status)
    {
        switch ($status) {
            case self::LATE: return "Atrasado";
            case self::PUNCTUAL: return "Pontual";
            default: return "Desconectado";
        }
    }

    public static function getStatusLabel($status)
    {
        switch ($status) {
            case self::PUNCTUAL: return "success";
            case self::LATE: return "danger";
            default: return "default";
        }
    }
}
