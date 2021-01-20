<template>


<div class="media-body mt-25" id="photo-setting">
       <div
          class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start" @click="displayUploader">
              <label class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
                <span>{{fire}}</span>

                      </label>
       </div>

      <p class="text-muted ml-1 mt-50" v-if="photo"><small><input id="settin_file" type="file" name="photo" @change="inputFileCheck" required></small></p>
</div>

</template>

<script>
    export default {
      data: function () {
        return {
        photo: false,
        fire: 'changer'
        }
      },
      methods: {

      displayUploader: function (e) {


        if (this.photo === false)
        {
          var userLang = navigator.language || navigator.userLanguage;
          if (userLang === 'fr')
          {
            this.fire = 'Annuler';
          }
          else
          {
            this.fire = 'Reset';
          }
        }
        else{

          var userLang = navigator.language || navigator.userLanguage;
          if (userLang === 'fr')
          {
            this.fire = 'Changer';
          }
          else
          {
            this.fire = 'Replace';
          }
        }

        this.photo = !this.photo;

      },
      inputFileCheck: function (e) {

        var uploadField = document.getElementById("settin_file");

      if (uploadField.files[0].size > 2097152) {



        alert("File is too big! 2 mo maximum");
        uploadField.value = "";
      }



    },


  },
      mounted() {
            console.log('Component mounted.');
      }
    }
</script>
