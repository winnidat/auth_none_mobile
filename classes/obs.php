<?php 


defined('MOODLE_INTERNAL') || die();
namespace none_mobile;
require_once($CFG->dirroot.'/user/profile/lib.php');

class obs {

public static function user_created($event) {
		
        global $DB;
        $domain = get_config('none_mobile', 'email');
        $eventdata = $event->get_data();
        
          if (!enrol_is_enabled('auto')) {
            return;
        }
        $user = $DB->get_record('user', array('id'=> $eventdata['objectid']));

         $user->username='user'.$user->id;
         if($user->firstname == ''){
            $user->firstname = 'user';
        }
        
        if($user->lastname == ''){
           $user->lastname = $user->id;
        }
        
    
        if($user->email == ''){
        $user->email = $user->username.$domain;
        }

        
        $DB->update_record('user', $user, $bulk=false);
	
    }
} 