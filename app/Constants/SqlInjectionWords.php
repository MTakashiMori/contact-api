<?php

namespace App\Constants;

/**
 * Class SqlInjectionWords
 * @package App\Constants
 */
class SqlInjectionWords extends BaseConstant
{
    const  SELECT = 'SELECT';
    const  ALTER = 'ALTER';
    const  DROP = 'DROP';
    const  DELETE = 'DELETE';
    const  TRUNCATE = 'TRUNCATE';
    const  JOIN = 'JOIN';
    const  WHERE = 'WHERE';
    const  FROM = 'FROM';
    const  UNION = 'UNION';
    const  INTERSECT = 'INTERSECT';
    const  MINUS = 'MINUS';
    const  BEGIN = 'BEGIN';
    const  COMMIT = 'COMMIT';
    const  ROLLBACK = 'ROLLBACK';
    const  OWNER = 'OWNER';
}
