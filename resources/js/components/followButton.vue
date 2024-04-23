
 
<template>
<div>
<button class="btn btn-primary ml-4" @click="followUser" v-text='buttonTest' ></button>
</div>
</template>


<script>
   export default{


props: ['userid', 'follows'],

mounted(){



    console.log('Component Mounted');
},


data: function() {


    return {


        status:this.follows,
    }
},


methods:{

    followUser(){

        axios.post('/follow/'+ this.userid)

           .then(response => {
           
            this.status = ! this.status;
           console.log(response.data);

           })
           
           
       .catch(errors => {
           
           if(errors.response.status == 401 ){

              window.location = '/login';
           }

       })    ;


    }
},

computed:{

    buttonTest(){

        return(this.status) ? 'unfollow' : 'follow'; 
    }
}

   }
</script>