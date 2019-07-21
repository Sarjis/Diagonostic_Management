import Vue from 'vue'

const shortLength = Vue.filter('shortLength', function (text, length, suffix) {
    return text.substring(0,length) + suffix;


});
export default shortLength;