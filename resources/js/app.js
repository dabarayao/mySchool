/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/* require('./bootstrap'); */ // this is comment becauser there is already bootstrap cdn in the app

window.Vue = require('vue');

import Vue from 'vue';

import Cleave from 'cleave.js';
import "cleave.js/dist/addons/cleave-phone.us"


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


var cleave = new Cleave('#phonenumber-icon', {
      phone: true,
      phoneRegionCode: 'US'
    });

/* pager-users-list add form validation */
const user_add = new Vue({
  el: '#user_add_modal',
  data: {
    password: 'bonjour'
  },
  methods: {
    confCheck: function (e) {
        e.preventDefault();

      if (document.getElementById('password-icon').value !==
          document.getElementById('confirm-password-icon').value) {

        let pass = document.getElementById('password-icon');
        let confPass = document.getElementById('confirm-password-icon')

        pass.classList.add('is-invalid');
        confPass.classList.add('is-invalid');

      } else {

        document.getElementById('user-add-form').submit();
      }
    },
    passUp: function () {
        let pass = document.getElementById('password-icon');
        let confPass = document.getElementById('confirm-password-icon')

        pass.classList.remove('is-invalid');
        confPass.classList.remove('is-invalid');
    }

  },
  mounted() {
        /* pager-users-list add input phone mask */
        //alert('bonjour');

  }
});
