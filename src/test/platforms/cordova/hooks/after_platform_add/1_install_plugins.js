#!/usr/bin/env node

//this hook installs all your plugins

// add your plugins to this list--either 
// the identifier, the filesystem location 
// or the URL
var pluginlist = [
	"cordova-plugin-device",
	"cordova-plugin-console",
	"cordova-plugin-whitelist",
	"pushwoosh-cordova-plugin"
];

var exec = require('child_process').exec;

pluginlist.forEach(function(plugin) {
	exec("cordova plugin add " + plugin);
});
