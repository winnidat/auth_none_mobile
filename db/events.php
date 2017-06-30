<?

defined('MOODLE_INTERNAL') || die();

$observers = array(
    'eventname'   => '\core\event\user_created',
    'callback'    => '\none_mobile\observer::user_created',
   );