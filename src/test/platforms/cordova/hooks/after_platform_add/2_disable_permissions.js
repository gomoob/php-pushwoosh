#!/usr/bin/env node

var permissions = [
	"android.permission.ACCESS_COARSE_LOCATION",
	"android.permission.ACCESS_FINE_LOCATION"
];

var rootdir = process.argv[2];

var exec = require('child_process').exec;
var path = require('path');

var manifest = path.join(rootdir, "platforms/android/AndroidManifest.xml");

permissions.forEach(function(permission) {
	exec("perl -i -p -e 's/.*" + permission + ".*//g' " + manifest);
});
