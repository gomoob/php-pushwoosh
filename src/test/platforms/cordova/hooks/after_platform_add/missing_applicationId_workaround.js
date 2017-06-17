#!/usr/bin/env node

var fs = require('fs');
var path = require('path');

function append_string_to_file(filename, to_add) {
	var data = fs.readFileSync(filename, 'utf8');
	data += "" + to_add;
	fs.writeFileSync(filename, data, 'utf8');
}

var rootdir = process.argv[2];
var build_config = path.join(rootdir, "platforms/android/build.gradle");

var to_add = "android { \n    defaultConfig.applicationId = \"com.pushwoosh.tesing\"\n}";


// https://code.google.com/p/analytics-issues/issues/detail?id=784
// this problem was finally fixed in Cordova v6.0.0
// If you use previous version uncomment this:
// append_string_to_file(build_config, to_add);
