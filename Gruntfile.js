module.exports = function(grunt) {
  require('jit-grunt')(grunt);

  grunt.initConfig({
    less: {
      development: {
        options: {
          compress: false,
          yuicompress: false
        },
        files: {
          "style.css": "style.less" // destination file and source file
        }
      }
    },
    watch: {
      styles: {
        files: ['theme-less/*.less'], // which files to watch
        tasks: ['less'],
        options: {
          nospawn: true
        }
      }
    }
  });

  grunt.registerTask('compile-less', ['less', 'watch']);
};