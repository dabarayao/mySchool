

<script>
    export default {
      el: '#user_add_modal',
      data: {
        password: 'bonjour'
      },
      computed: {
        conf: function () {
          alert('bonjour');
        }

      },
      mounted() {
            console.log('Component mounted.')
     }
    }
</script>
