<template>


<div class="media-body mt-25" id="photo-setting">
       <div
          class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start" @click="displayUploader">
              <label class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
                <span>{{fire}}</span>

                      </label>
       </div>

      <p class="text-muted ml-1 mt-50" v-if="photo"><small><input id="settin_file" type="file"  accept="image/*" name="photo" @change="inputFileCheck" required></small></p>
</div>

</template>

<script>

    var setLang = document.getElementById("settin_lang");
    var userLang = navigator.language || navigator.userLanguage;

    export default {
      data: function () {
        return {
        photo: false,
        fire: 'changer la photo'
        }
      },
      methods: {

      displayUploader: function (e) {

        // lang of photochanger
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

      },
      inputFileCheck: function (e) {

        var uploadField = document.getElementById("settin_file");

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


  },
  mounted() {
          console.log('Component mounted.');

          // lang of photochanger
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
    }
</script>
