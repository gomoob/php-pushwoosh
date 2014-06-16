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
                    
                    // This is used to prevent PHPUnit to fail with a 'zend_mm_heap corrupted' error
                    // see: http://stackoverflow.com/questions/14597468/how-to-diagnose-these-php-code-coverage-segmentation-and-zend-mm-heap-corrupted
                    d: 'zend.enable_gc=0' //,
                    // group : 'NotificationTest'
                        
                }
                
            } /* PHPUnit Task */

        }

    ); /* Grunt initConfig call */

    // Load the Grunt Plugins    
    grunt.loadNpmTasks('grunt-contrib-clean'); 
    grunt.loadNpmTasks('grunt-contrib-copy'); 
    grunt.loadNpmTasks('grunt-phpdocumentor');
    grunt.loadNpmTasks('grunt-phpunit');

    /**
     * Task used to create the project documentation.
     */
    grunt.registerTask('generate-documentation', ['phpdocumentor:generate' ]);
    
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
