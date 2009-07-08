<?php
/**
 * RoundCube Fail2Ban Plugin
 *
 * @version 1.0
 * @author Matt Rude [matt@mattrude.com]
 * @url
 */
class rc-plugin-fail2ban extends rcube_plugin
{
  function init()
  {
    $this->add_hook('login_failed', array($this, 'log'));
  }

  function log($args)
  {
    
  }

}

?>
