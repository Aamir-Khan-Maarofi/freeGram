<template>
    <div>
        <a class="pl-3 font-weight-bold link-primary" @click="followUser" v-text="buttonText"></a>
    </div>
</template>

<script>
    export default {
        //The user-id comming from index.blade.php
        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },


        data: function () {
            return {
                status: this.follows,
            }
        },


        methods: {
            followUser(){
                //Make a post request using axios to ''
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        this.status = ! (this.status);
                        console.log(response.data);
                    })
                    .catch(error => {
                        if (error.response.status == 401){
                            window.location = '/login';
                        }
                    });
            }
        },

        computed: {
            buttonText(){
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }

    }
</script>
