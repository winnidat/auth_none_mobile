<?/*


defined('MOODLE_INTERNAL') || die();
namespace none_mobile;
require_once($CFG->dirroot.'/user/profile/lib.php');

class observer {

public static function user_created($event) {
		
        global $DB;
        $eventdata = $event->get_data();
        
          if (!enrol_is_enabled('auto')) {
            return;
        }
        $user = $DB->get_record('user', array('id'=> $eventdata['objectid']));
        if(isset($_POST['firstname']) && $_POST['firstname'] != ''){
            $user->firstname = $_POST['firstname'];
        }

         $user->username='user'.$user->id;
         if($user->firstname == ''){
            $user->firstname = 'user';
        }
        
        if(isset($_POST['lastname']) && $_POST['lastname'] != ''){
            $user->lastname = $_POST['lastname'];
        }
        if($user->lastname == ''){
           $user->lastname = $user->id;
        }
        if(isset($_POST['email']) && $_POST['email'] != ''){
            $user->email = $_POST['email'];
        }
        if($user->email == ''){
        $user->email = $user->username."@mailinator.com";
        }

        
        $DB->update_record('user', $user, $bulk=false);
	
    }
}