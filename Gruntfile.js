module.exports = function(grunt) {
    require('jit-grunt')(grunt);

    grunt.initConfig({
        less: {
            development: {
                options: {
                    compress: true,
                    yuicompress: true,
                    optimization: 2
                },
                files: {
                    "css/styles.css": "less/custom/styles.less"
                }
            }
        },
        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'img/src/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'img/dist/'
                }]
            }
        },
        watch: {
            styles: {
                files: ['less/**/*.less'],
                tasks: ['less'],
                options: {
                    nospawn: true
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-imagemin');

    grunt.registerTask('default', ['less', 'watch']);
    grunt.registerTask('build', ['imagemin']);
};