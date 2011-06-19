
RoundCube Fail2Ban Plugin

Version: 1.0 (2009-Jul-10)
Plugin Website: http://mattrude.com/plugins/roundcube-fail2ban-plugin
Author: Matt Rude [m@mattrude.com]
Author Website: http://mattrude.com
License: GPLv2

This is a small plugin that will display the failed login attempts to your syslog or userlogins log file.

Install
=======
* Place this plugin folder into the RoundCube plugins directory (roundcube/plugins/)
* Add fail2ban to $rcmail_config['plugins'] in your RoundCube config
Note: When downloading this plugin from http://github.com/mattrude/rc-plugin-fail2ban you will need to create a directory called fail2ban and place fail2ban.php in there, ignoring the root directory in the downloaded archive.  You may also run 'git clone git://github.com/mattrude/rc-plugin-fail2ban.git fail2ban' from the plugins directory.

Fail2Ban Setup
==============
fail2ban/jail.conf:
  [roundcube]
  enabled  = true
  port     = http,https
  filter   = roundcube
  action   = iptables-multiport[name=roundcube, port="http,https"]
  logpath  = /var/www/html/roundcube/logs/userlogins

fail2ban/filter.d/roundcube.conf:
  [Definition]
  failregex = FAILED login for .*. from <HOST>
  ignoreregex =

License
=======
GNU General Public License, Version 3
