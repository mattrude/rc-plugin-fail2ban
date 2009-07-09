<?php
/**
 * RoundCube Fail2Ban Plugin
 *
 * @version 1.0
 * @author Matt Rude [matt@mattrude.com]
 * @url http://www.mattrude.com/roundcube-fail2ban-plugin
 */
class fail2ban extends rcube_plugin
{
  function init()
  {
    $this->add_hook('login_failed', array($this, 'log'));
  }

  function log($args)
  {
    $log_entry = 'FAILED login for ' .$args['user']. ' from ' .getenv('REMOTE_ADDR'); 
    $log_config = rcmail::get_instance()->config->get('log_driver');
    
    if ($log_config == 'syslog'){
       syslog(LOG_WARNING, $log_entry);
    } elseif ($log_config == 'file'){
       error_log('['.date('d-M-Y H:i:s O')."]: ".$log_entry."\n", 3, "logs/userlogins");
    } else {
       echo 'WARNING!! The RoundCube Fail2Ban Plugin was unable to retrievethe log driver form the config, please check your config file for log_driver.';
    }
  }

}

?>
