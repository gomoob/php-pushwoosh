var fs = require('fs');

module.exports = function(grunt) {

    /**
     * The directory used to produce outputs.
     * 
     * @property {String}
     */
    var TARGET_DIRECTORY = 'target';

    grunt.initConfig(
        {
            
            /**
             * Reads the 'package.json' file and puts it content into a 'pkg' Javascript object.
             */
            pkg : grunt.file.readJSON('package.json'),
            
            /**
             * Clean task.
             */
            clean : ['target'],
            
            /**
             * Copy task.
             */
            copy : {
                
                /**
                 * Copy test resource files to the target.
                 */
                'test-resources' : {
                    files : [
                        {
                            cwd: 'src/test/resources',
                            expand: true,
                            src: '**',
                            dest: 'target/test-resources/'
                        }
                    ]
                }
                
            }, /* Copy task */
            
            /**
             * PHP CodeSniffer Task
             */
            phpcs : {
                
                library: {
                    dir: [
                        'src/main/php/Gomoob', 
                        'src/test/php/Gomoob'
                    ]
                },

                options : {
                    bin:  'vendor/bin/phpcs',
                    report: (function() {
                        
                        var report = false;
                        
                        if(grunt.option('checkstyle') === true) {
                            
                            report = 'checkstyle';
                        }
                        
                        return report;
                        
                    })(),
                    reportFile: (function() { 

                        var reportFile = false;
                        
                        if(grunt.option('checkstyle') === true) {

                            reportFile = 'target/reports/phpcs/phpcs.xml'; 
                        }
                        
                        return reportFile;
                        
                    })(),
                    standard: 'PSR2',
                    verbose: false
                }

            },
            
            /**
             * PHPDocumentor Task.
             */
            phpdocumentor : {
                
                options : {
                    directory : 'src/main/php',
                    target : 'target/reports/phpdocumentor'
                }, 
                
                /**
                 * Target used to generate the PHP documentation of the project.
                 */
                generate : {}
                
            }, /* PHPDocumentor Task */
            
            /**
             * PHPUnit Task.
             */
            phpunit : {
                
                classes: {
                    dir: 'src/test/php'
                }, 
                
                options: {
                    configuration : 'phpunit.xml',
                    //group : 'PushwooshTest'
                        
                }
                
            }, /* PHPUnit Task */

            /**
             * Shell Task
             */
            shell : {
                
                pdepend : {
                    command : (function() {
                        
                        var command = 'php vendor/pdepend/pdepend/src/bin/pdepend';
                        command += ' --jdepend-chart=target/reports/pdepend/jdepend-chart.svg';
                        command += ' --jdepend-xml=target/reports/pdepend/jdepend.xml';
                        command += ' --overview-pyramid=target/reports/pdepend/overview-pyramid.svg';
                        command += ' --summary-xml=target/reports/pdepend/summary.xml';
                        command += ' src/main/php';
                        
                        return command;

                    })()
                },
                
                phpcpd : {
                    command : (function() {
                        
                        return 'php vendor/sebastian/phpcpd/phpcpd src/main/php';

                    })()
                },
                
                'php-cs-fixer-main' : {
                    command : (function() {
                        
                        return 'php vendor/fabpot/php-cs-fixer/php-cs-fixer fix src/main/php';

                    })()
                },
                'php-cs-fixer-test' : {
                    command : (function() {
                        
                        return 'php vendor/fabpot/php-cs-fixer/php-cs-fixer fix src/test/php';

                    })()
                }, 
                
                phpdocumentor : {
                    command : (function() {
                        return 'phpdoc --target=target/reports/phpdocumentor --directory=src/main/php';
                    })()
                },
                
                phploc : {
                    command : (function() {
                        
                        return 'php vendor/phploc/phploc/phploc src/main/php';
                        
                    })()
                },
                
                phpmd : {
                    command : (function() {
                        
                        var command = 'php vendor/phpmd/phpmd/src/bin/phpmd ';
                        command += 'src/main/php ';
                        command += 'html ';
                        command += 'cleancode,codesize,controversial,design,naming,unusedcode ';
                        command += '--reportfile=target/reports/phpmd/phpmd.html';

                        return command;

                    })(),
                    options : {
                        callback : function(err, stdout, stderr, cb) {
                            grunt.file.write('target/reports/phpmd/phpmd.html', stdout);
                            cb();
                            
                        }
                    }
                }
            
            } /* Shell Task */
            
        }

    ); /* Grunt initConfig call */

    // Load the Grunt Plugins    
    grunt.loadNpmTasks('grunt-contrib-clean'); 
    grunt.loadNpmTasks('grunt-contrib-copy'); 
    grunt.loadNpmTasks('grunt-phpcs');
    grunt.loadNpmTasks('grunt-phpdocumentor');
    grunt.loadNpmTasks('grunt-phpunit');
    grunt.loadNpmTasks('grunt-shell');

    /**
     * Task used to create directories needed by PDepend to generate its report.
     */
    grunt.registerTask('before-pdepend' , 'Creating directories required by PDepend...', function() {

        if(!fs.existsSync('target')) {
            fs.mkdirSync('target');
        }

        if(!fs.existsSync('target/reports')) {
            fs.mkdirSync('target/reports');
        }

        if(!fs.existsSync('target/reports/pdepend')) {   
            fs.mkdirSync('target/reports/pdepend');
        }

    });

    /**
     * Task used to create directories needed by PHP_CodeSniffer to generate its report.
     */
    grunt.registerTask('before-phpcs', 'Creating directories required by PHP Code Sniffer...', function() {
        
        if(grunt.option('checkstyle') === true) {

            if(!fs.existsSync('target')) {
                fs.mkdirSync('target');
            }
            
            if(!fs.existsSync('target/reports')) {
                fs.mkdirSync('target/reports');
            }

            if(!fs.existsSync('target/reports/phpcs')) {   
                fs.mkdirSync('target/reports/phpcs');
            }

        }
        
    });
    
    /**
     * Task used to create directories needed by PHPMD to generate its report.
     */
    grunt.registerTask('before-phpmd', 'Creating directories required by PHP Mess Detector...', function() {
       
        if(!fs.existsSync('target')) {
            fs.mkdirSync('target');
        }

        if(!fs.existsSync('target/reports')) {
            fs.mkdirSync('target/reports');
        }

        if(!fs.existsSync('target/reports/phpmd')) {   
            fs.mkdirSync('target/reports/phpmd');
        }
        
    });

    /**
     * Task used to generate a PDepend report.
     */
    grunt.registerTask('pdepend', ['before-pdepend', 'shell:pdepend']);
    
    /**
     * Task used to automatically fix PHP_CodeSniffer errors.
     */
    grunt.registerTask('php-cs-fixer', ['shell:php-cs-fixer-main', 'shell:php-cs-fixer-test']);
    
    /**
     * Task used to generate a PHPMD report.
     */
    grunt.registerTask('phpmd', ['before-phpmd', 'shell:phpmd']);
    
    /**
     * Task used to create the project documentation.
     */
    grunt.registerTask('generate-documentation', ['pdepend',
                                                  'before-phpcs', 
                                                  'phpcs', 
                                                  'phpmd',
                                                  'phpdocumentor' 
                                                  ]);
    
    /**
     * Task used to execute the project tests.
     */
    grunt.registerTask('test', ['copy:test-resources', 'phpunit']);
    
    /**
     * Default task, this task executes the following actions :
     *  - Clean the previous target folder 
     */
    grunt.registerTask('default', ['clean', 'test', 'generate-documentation']);

};
