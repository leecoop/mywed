<?php
class TemplateUtils
{
    public static function calcPercent($val, $total, $limit)
    {
        if ($total == 0) {
            return 0;
        }
        $percent = number_format(($val / $total) * 100);

        return ($limit && $percent > 100)? 100 : $percent;
    }

    public static function getTableSeatsTaken($tableId, $tableSeatsTakenAmountMap)
    {
        if(!in_array($tableId,array_keys($tableSeatsTakenAmountMap))){
            return 0;
        }

        return $tableSeatsTakenAmountMap[$tableId];
    }
}