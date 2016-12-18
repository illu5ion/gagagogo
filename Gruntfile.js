module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
				files: {
					'./assets/home/css/style.min.css' : './__dev/sass/*.scss'
				}
			}
		},
		watch: {
			css: {
				files: './__dev/sass/*.scss',
				tasks: ['sass', 'cssmin']
			},
			js: {
				files: './__dev/js/*.js',
				tasks: ['uglify']
			}
		},
		cssmin: {
			add_banner: {
				options: {
					banner: '/* Minified on <%= grunt.template.today("yyyy-mm-dd hh:MM:ss")%> by GruntJS-cssmin */'
				},
				files: {
					'./assets/home/css/style.min.css': './assets/home/css/style.min.css'
				}
			}
		},
		uglify: {
			my_target: {
				files: {
					'./assets/home/js/app.min.js': ['./__dev/js/app.js']
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.registerTask('default', ['sass']);

};