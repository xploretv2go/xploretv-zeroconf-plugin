# xploretv.zeroconf.plugin
<h2>What is xploretv.zeroconf.plugin</h2>

This is a WordPress plugin for the WordPress theme <a href="https://github.com/xploretv2go/xploretv.template">xploretv.template</a> and is intended to simplify the processing of service discovery information. 

Although standard methods for detecting services on local networks, such as  <a href="https://letmegooglethat.com/?q=ZeroConf%2FBonjour">ZeroConf/Bonjour</a>, are widely used, this does not mean that there is 100% coverage of this standard.   

For example, this plugin can collect information from the proprietary broker servers of well-known devices such as [NUKI Smart Lock Bridges](https://api.nuki.io/discover/bridges) and/or [Philips Hue Bridges](https://discovery.meethue.com/) to process them in the WordPress theme xploretv.template harmonized with e.g. ZeroConf data retrieved via [API Service](https://github.com/xploretv2go/zeroconf.api.service).

Please make sure to install and activate the theme <strong>after</strong> installing the plugin.

<h2>Installation</h2>
Please move all files of this repository to your plugins folder. Example: [WEBROOT WORDPRESS]/wp-content/plugins/xploretv-zeroconf/
