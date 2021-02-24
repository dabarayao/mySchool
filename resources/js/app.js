/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/* require('./bootstrap'); */ // this is comment becauser there is already bootstrap cdn in the app

window.Vue = require('vue');




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

import settings from './components/SettingsGeneral.vue'


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */




/* pager-users-list add form validation */
var user_add = new Vue({
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
    },
    inputFileCheck: function (e) {

        var uploadField = document.getElementById("photo-icon");

      if (uploadField.files[0].size > 2097152) {



        alert("File is too big! 2 mo maximum");
        uploadField.value = "";
      }



    }

  },
  mounted() {


  }
});

/* pager-users-edit  form */
var user_edit = new Vue({
  el: '#user_edit_form',
  data: {
    photo: false,
    fire: 'changer la photo'
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

        document.getElementById('user_edit_modal_form').submit();
      }
    },
    passUp: function () {
        let pass = document.getElementById('password-icon');
        let confPass = document.getElementById('confirm-password-icon')

        pass.classList.remove('is-invalid');
        confPass.classList.remove('is-invalid');
    },
    inputFileCheck: function (e) {

        var uploadField = document.getElementById("edit_file");
        var setLang = document.getElementById("settin_lang");
        var userLang = navigator.language || navigator.userLanguage;

        if(setLang.value == 1)
        {
          if (userLang === ('fr' || 'en'))
          {
            if (uploadField.files[0].size > 2097152) {



              alert("Le fichier est trop lourd 2 mo maximum");
              uploadField.value = "";
            }
          }

        }
        else
        {
            if (uploadField.files[0].size > 2097152) {

              alert("File is too big! 2 mo maximum");
              uploadField.value = "";
            }
        }



    },
    displayUploader: function (e) {

      // lang of photochanger
      var setLang = document.getElementById("settin_lang");
      var userLang = navigator.language || navigator.userLanguage;

      if (this.photo === false)
      {
          if(setLang.value == 1)
          {
            if (userLang === ('fr' || 'en'))
            {
              this.fire = 'Annuler';
            }
          }
          else
          {
            this.fire = 'Reset';
          }
      }
      else{
          if(setLang.value == 1)
          {
            if (userLang === ('fr' || 'en'))
            {
              this.fire = 'Changer la photo';
            }
          }
          else
          {
            this.fire = 'Replace picture';
          }
      }

      this.photo = !this.photo;

    }

  },
  mounted() {

    // lang of photochanger
    var setLang = document.getElementById("settin_lang");
    var userLang = navigator.language || navigator.userLanguage;

    if(setLang.value == 1)
    {
        if (userLang === ('fr' || 'en'))
        {
          this.fire = 'Changer la photo';
        }
    }
    else
    {
          this.fire = 'Replace picture';
    }


    // user edit from country's select
    var c = document.getElementById("country-icon");
    var ch = document.getElementById("edit_country");

    if (ch.value != "")
    {
    c.value = ch.value;
    }

    // user edit from dialcode's select
    var d = document.getElementById("dialcode-icon");
    var dh = document.getElementById("edit_dialcode");

    if (dh.value != "")
    {
    d.value = dh.value;
    }

    // user edit from status's select
    var s = document.getElementById("status-icon");
    var sh = document.getElementById("edit_status");

    if (sh.value == true)
    {
      s.value = 1;
    }
    else
    {
      s.value = 0;
    }

  }
});

/* pager-settings edit form */
var user_settings = new Vue({
  el: '#user_setting',
  components: {
    settings
  },
  mounted() {

    var t = document.getElementById("themeSelect");
    var th = document.getElementById("hide_theme");
    t.value = th.value;

    var l = document.getElementById("langageSelect");
    var lh = document.getElementById("hide_langage");
    l.value = lh.value;




  }
});

/* pager-schools-add  form */
var school_add = new Vue({
  el: '#school_add',
  data: {
    photo: false,
    fire: 'changer la photo'
  },
  methods: {
    inputFileCheck: function (e) {

        var uploadField = document.getElementById("schoolphoto");
        var setLang = document.getElementById("settin_lang");
        var userLang = navigator.language || navigator.userLanguage;

        if(setLang.value == 1)
        {
          if (userLang === ('fr' || 'en'))
          {
            if (uploadField.files[0].size > 2097152) {



              alert("Le fichier est trop lourd 2 mo maximum");
              uploadField.value = "";
            }
          }

        }
        else
        {
            if (uploadField.files[0].size > 2097152) {

              alert("File is too big! 2 mo maximum");
              uploadField.value = "";
            }
        }



    }
  },
  mounted() {
    console.log('school mounted');

  }
});

/* pager-schools-edit  form */
var school_edit = new Vue({
  el: '#school_edit',
  data: {
    photo: false,
    fire: 'changer la photo'
  },
  methods: {
    inputFileCheck: function (e) {

        var uploadField = document.getElementById("schoolphoto");
        var setLang = document.getElementById("settin_lang");
        var userLang = navigator.language || navigator.userLanguage;

        if(setLang.value == 1)
        {
          if (userLang === ('fr' || 'en'))
          {
            if (uploadField.files[0].size > 2097152) {



              alert("Le fichier est trop lourd 2 mo maximum");
              uploadField.value = "";
            }
          }

        }
        else
        {
            if (uploadField.files[0].size > 2097152) {

              alert("File is too big! 2 mo maximum");
              uploadField.value = "";
            }
        }



    }

  },
  mounted() {

    // school edit from country's select
    var c = document.getElementById("country-icon");
    var ch = document.getElementById("school_country");

    if (ch.value != "")
    {
    c.value = ch.value;
    }

    // school edit from dialcode's select
    var d = document.getElementById("dialcode-icon");
    var dh = document.getElementById("school_dialcode");

    if (dh.value != "")
    {
    d.value = dh.value;
    }


  }
});


/* pager-student-list  add form validation */
var student_add = new Vue({
  el: '#student_add_modal',
  data: {
    oriented: true,
    handicap: true
  },
  methods: {
    selectHand: function (e) {

      if (this.handicap == true || document.getElementById("lib_hand").style.display == "block" )
      {
        document.getElementById("lib_hand").style.display = "none";
        document.getElementById("desc_hand").style.display = "none";
        this.handicap = !this.handicap;
      }
      else
      {
        document.getElementById("lib_hand").style.display = "block";
        document.getElementById("desc_hand").style.display = "block";

        this.handicap = !this.handicap;
      }


    },
    selectOrien: function (e) {

      if (this.oriented == true || document.getElementById("rang_orien").style.display == "block")
      {
        document.getElementById("rang_orien").style.display = "none";
        this.oriented = !this.oriented;
      }
      else
      {
        document.getElementById("rang_orien").style.display = "block";

        this.oriented = !this.oriented;
      }


    },
    inputFileCheck: function (e) {

        var uploadField = document.getElementById("schoolphoto");
        var setLang = document.getElementById("settin_lang");
        var userLang = navigator.language || navigator.userLanguage;

        if(setLang.value == 1)
        {
          if (userLang === ('fr' || 'en'))
          {
            if (uploadField.files[0].size > 2097152) {



              alert("Le fichier est trop lourd 2 mo maximum");
              uploadField.value = "";
            }
          }

        }
        else
        {
            if (uploadField.files[0].size > 2097152) {

              alert("File is too big! 2 mo maximum");
              uploadField.value = "";
            }
        }



    }



  },
  mounted() {



  }
});

/* pager-edit-student  edit student validation */
var student_edit = new Vue({
  el: '#student_edit_form',
  data: {
    oriented: false,
    handicap: false
  },
  methods: {
    selectHand: function (e) {

      if (this.handicap == true || document.getElementById("lib_hand").style.display == "block" )
      {
        document.getElementById("lib_hand").style.display = "none";
        document.getElementById("desc_hand").style.display = "none";
        this.handicap = !this.handicap;
      }
      else
      {
        document.getElementById("lib_hand").style.display = "block";
        document.getElementById("desc_hand").style.display = "block";

        this.handicap = !this.handicap;
      }


    },
    selectOrien: function (e) {

      if (this.oriented == true || document.getElementById("rang_orien").style.display == "block")
      {
        document.getElementById("rang_orien").style.display = "none";
        this.oriented = !this.oriented;
      }
      else
      {
        document.getElementById("rang_orien").style.display = "block";

        this.oriented = !this.oriented;
      }


    },
    inputFileCheck: function (e) {

        var uploadField = document.getElementById("schoolphoto");
        var setLang = document.getElementById("settin_lang");
        var userLang = navigator.language || navigator.userLanguage;

        if(setLang.value == 1)
        {
          if (userLang === ('fr' || 'en'))
          {
            if (uploadField.files[0].size > 2097152) {



              alert("Le fichier est trop lourd 2 mo maximum");
              uploadField.value = "";
            }
          }

        }
        else
        {
            if (uploadField.files[0].size > 2097152) {

              alert("File is too big! 2 mo maximum");
              uploadField.value = "";
            }
        }



    }



  },
  mounted() {

    // school edit from country's select
    var c = document.getElementById("country-icon");
    var cstu = document.getElementById("country_stud");

    if (c.value != "")
    {
    c.value = cstu.value;
    }

    // school edit from dialcode's select
    var d = document.getElementById("dialcode-icon");
    var dstu = document.getElementById("dial_stud");

    if (d.value != "")
    {
    d.value = dstu.value;
    }

  }
});
