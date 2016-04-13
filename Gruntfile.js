'use strict';
module.exports = function(grunt) {

    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

        // watch our project for changes
        watch: {
            compass: {
				files: ['assets/**/*.{scss,sass}'],
                tasks: ['compass']
            },
            livereload: {
                options: { livereload: true },
                files: ['style.css', '**/*.html', '**/*.php', 'images/**/*.{png,jpg,jpeg,gif,webp,svg}']
            }
        },

        compass: {
     		dist: {
                options: {
                    config: 'config.rb',
                    force: true
                }
            }
        },

		// concatenation and minification all in one
		uglify: {
		    plugins: {
		        options: {
		            sourceMap: 'js/plugins.js.map',
		            sourceMappingURL: 'plugins.js.map',
		            sourceMapPrefix: 2
		        },
		       	files: {
		            'js/plugins.min.js': [
		             	'assets/js/scripts.js',
			        ],

			        'js/plugins.home.min.js': [
			        	'js/plugins.min.js',
			        	'assets/js/home/TimeCircles.js',
			        	'assets/js/home/home-scripts.js'
			        ]
				}
			}
		},

		'sftp-deploy': {
			build: {
				auth: {
					host: '45.79.98.241',
					port: 2222,
					authKey: 'production'
				},
			cache: 'sftpcache.json',
			src: '/Users/joshmallard/Documents/dev/vagrant-local/www/gingerbeard/htdocs/wp-content/themes/the-great-deluge',
			dest: 'wp-content/themes/the-great-deluge',
			exclusions: ['.ftppass', '.git', '.gitignore', 'node_modules', '.sass-cache', 'npm-debug.log', '.DS_Store', '.sftpcache.json'],
			serverSep: '/',
			concurrency: 4,
			progress: true
			}
		}

	});

    // register task
    grunt.registerTask('default', ['watch']);

    grunt.registerTask( 'deploy', ['sftp-deploy']);

};