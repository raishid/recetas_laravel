<template>
    <div>
        <span class="like-btn" @click="Likereceta" :class="{ 'like-active' : isActive }"></span>
        <p>{{ Cantidadlikes }} Les gustó esta receta</p>
    </div>
</template>

<script>
export default {
    props: ['recetaId', 'like', 'likes'],
    data: function(){
        return {
            isActive: this.like,
            totalLikes: this.likes
        }
    },
    methods: {
        Likereceta(){
            axios.post('/recetas/' + this.recetaId)
                .then(respuesta =>{
                    if(respuesta.data.attached.length > 0){
                        this.$data.totalLikes++;
                    }else{
                        this.$data.totalLikes--;
                    }

                    this.isActive = !this.isActive
                })
                .catch(error =>{
                    if(error.response.status === 401){
                        window.location = '/register';
                    }
                });
        }
    },
    computed:{
        Cantidadlikes(){
            return this.totalLikes
        }
    }
}
</script>
