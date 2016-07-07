var fs = require('fs');

module.exports = function(grunt) {

    grunt.initConfig(
        {
            
            /**
             * Reads the 'package.json' file and puts it content into a 'pkg' Javascript object.
             */
            pkg : grunt.file.readJSON('package.json'),
            
            /**
             * Clean task.
             */
            clean : ['build'],
            
            /**
             * Copy task.
             */
            copy : {
                
                /**
                 * Copy test resource files to the build.
                 */
                'test-resources' : {
                    files : [
                        {
                            cwd: 'src/test/resources',
                            expand: true,
                            src: '**',
                            dest: 'build/test-resources/'
                        }
                    ]
                }
                
            }, /* Copy task */

            /**
             * PHPUnit Task.
             */
            phpunit : {
                
                classes: {
                    dir: 'src/test/php'
                }, 
                
                options: {
                	bin : 'vendor/bin/phpunit',
                    configuration : 'phpunit.xml.dist',
                    //group : 'CURLClientTest'
                }

            }, /* PHPUnit Task */

            /**
             * Shell Task
             */
            shell : {
                
                pdepend : {
                    command : function() {
                        
                        var command = 'php vendor/pdepend/pdepend/src/bin/pdepend';
                        command += ' --jdepend-chart=build/reports/pdepend/jdepend-chart.svg';
                        command += ' --jdepend-xml=build/reports/pdepend/jdepend.xml';
                        command += ' --overview-pyramid=build/reports/pdepend/overview-pyramid.svg';
                        command += ' --summary-xml=build/reports/pdepend/summary.xml';
                        command += ' src/main/php';
                        
                        return command;

                    }
                },
                
                phpcs : {
                    command : function() {
                        
                        var command = 'php ./vendor/squizlabs/php_codesniffer/scripts/phpcs';
                        command += ' --standard=PSR2';
                        command += ' -v';
                        
                        if(grunt.option('checkstyle') === true) {
                            
                            command += ' --report=checkstyle';
                            command += ' --report-file=build/reports/phpcs/phpcs.xml'; 
                        }

                        command += ' src/main/php';
                        command += ' src/test/php/Gomoob';

                        return command;
                        
                    }
                },
                
                phpcbf : {
                    command : function() {
                        
                        var command = 'php ./vendor/squizlabs/php_codesniffer/scripts/phpcbf';
                        command += ' --standard=PSR2';
                        command += ' --no-patch';
                        command += ' src/main/php';
                        command += ' src/test/php';
                        
                        
                        return command;
                        
                    }
                },
                
                phpcpd : {
                    command : function() {
                        
                        return 'php vendor/sebastian/phpcpd/phpcpd src/main/php';

                    }
                },
                
                phpdocumentor : {
                    command : function() {
                        return 'php vendor/phpdocumentor/phpdocumentor/bin/phpdoc.php --target=build/reports/phpdocumentor --directory=src/main/php';
                    }
                },
                
                phploc : {
                    command : function() {
                        
                        return 'php vendor/phploc/phploc/phploc src/main/php';
                        
                    }
                },
                
                phpmd : {
                    command : function() {
                        
                        var command = 'php vendor/phpmd/phpmd/src/bin/phpmd ';
                        command += 'src/main/php ';
                        command += 'html ';
                        command += 'cleancode,codesize,controversial,design,naming,unusedcode ';
                        command += '--reportfile=build/reports/phpmd/phpmd.html';

                        return command;

                    },
                    options : {
                        callback : function(err, stdout, stderr, cb) {
                            grunt.file.write('build/reports/phpmd/phpmd.html', stdout);
                            cb();
                            
                        }
                    }
                }
            
            } /* Shell Task */
            
        }

    ); /* Grunt initConfig call */

    // Load the Grunt Plugins    
    require('load-grunt-tasks')(grunt);

    /**
     * Task used to create directories needed by PDepend to generate its report.
     */
    grunt.registerTask('before-pdepend' , 'Creating directories required by PDepend...', function() {

        if(!fs.existsSync('build')) {
            fs.mkdirSync('build');
        }

        if(!fs.existsSync('build/reports')) {
            fs.mkdirSync('build/reports');
        }

        if(!fs.existsSync('build/reports/pdepend')) {   
            fs.mkdirSync('build/reports/pdepend');
        }

    });

    /**
     * Task used to create directories needed by PHP_CodeSniffer to generate its report.
     */
    grunt.registerTask('before-phpcs', 'Creating directories required by PHP Code Sniffer...', function() {
        
        if(grunt.option('checkstyle') === true) {

            if(!fs.existsSync('build')) {
                fs.mkdirSync('build');
            }
            
            if(!fs.existsSync('build/reports')) {
                fs.mkdirSync('build/reports');
            }

            if(!fs.existsSync('build/reports/phpcs')) {   
                fs.mkdirSync('build/reports/phpcs');
            }

        }
        
    });
    
    /**
     * Task used to create directories needed by PHPMD to generate its report.
     */
    grunt.registerTask('before-phpmd', 'Creating directories required by PHP Mess Detector...', function() {
       
        if(!fs.existsSync('build')) {
            fs.mkdirSync('build');
        }

        if(!fs.existsSync('build/reports')) {
            fs.mkdirSync('build/reports');
        }

        if(!fs.existsSync('build/reports/phpmd')) {   
            fs.mkdirSync('build/reports/phpmd');
        }
        
    });

    /**
     * Task used to generate a PDepend report.
     */
    grunt.registerTask('pdepend', ['before-pdepend', 'shell:pdepend']);
    
    /**
     * Task used to automatically fix PHP_CodeSniffer errors.
     */
    grunt.registerTask('phpcbf', ['shell:phpcbf']);
    
    /**
     * Task used to check the code using PHP_CodeSniffer.
     */
    grunt.registerTask('phpcs', ['before-phpcs', 'shell:phpcs']);
    
    /**
     * Task used to generate a PHPMD report.
     */
    grunt.registerTask('phpmd', ['before-phpmd', 'shell:phpmd']);
    
    /**
     * Task used to create the project documentation.
     */
    grunt.registerTask('generate-documentation', ['pdepend', 'phpcs', 'phpmd', 'shell:phpdocumentor']);
    
    /**
     * Task used to execute the project tests.
     */
    grunt.registerTask('test', ['copy:test-resources', 'phpunit']);
    
    /**
     * Default task, this task executes the following actions :
     *  - Clean the previous build folder 
     */
    grunt.registerTask('default', ['clean', 'test', 'generate-documentation']);

};
