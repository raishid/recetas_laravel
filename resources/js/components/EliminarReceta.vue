<template>
    <input type="submit" value="Eliminar ×" class="btn btn-danger d-block w-100 mb-2" @click="EliminarReceta">
</template>

<script>
    export default {
        props: ['receta-id'],
        methods: {
            EliminarReceta(){
                this.$swal.fire({
                    title: 'Deseas Eliminar esta Receta?',
                    text: "Un vez eliminada, no se puede recupear",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        //eliminar receta 
                        const params = {
                            id: this.recetaId,

                        }
                        axios.post(`/recetas/${this.recetaId}`, {params, _method: 'delete'})
                            .then(respuesta =>{
                                this.$swal.fire({
                                    title: 'Receta Eliminada',
                                    text: 'Se Eliminó la Receta',
                                    icon: 'success'
                                })
                                //eliminar del dom
                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode)
                            })
                            .catch(error =>{
                                console.log(error);
                            })

                        /*
                        
                        */
                    }
                })
            }
        },
    }
</script>