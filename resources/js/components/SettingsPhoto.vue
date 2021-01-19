<template>


<div class="media-body mt-25" id="photo-setting">
       <div
          class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
              <label class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
                <span>Upload new photo</span>

                      </label>
                  <button class="btn btn-sm btn-light-secondary ml-50">Reset</button>
       </div>
      <p class="text-muted ml-1 mt-50"><small><input id="select-files"  type="file" ></small></p>
</div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
