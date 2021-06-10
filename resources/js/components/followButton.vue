<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followUser">Follow</button>
    </div>
</template>

<script>
    export default {
        //The user-id comming from index.blade.php
        props: ['userId'],

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            followUser(){
                //Make a post request using axios to ''
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        console.log(response.data);
                    });
            }
        }
    }
</script>
