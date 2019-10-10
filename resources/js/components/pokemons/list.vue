<template>
    <div class="row">
    <spinner v-show="loading"></spinner>
        <div class="col-sm" v-for="pokemon in pokemons">
            <div class="card text-center" style="width: 18rem; margin-top: 70px;">
                <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;" class="card-img-top rounded-circle mx-auto d-block" v-bind:src="pokemon.picture">
                <div class="card-body">
                    <h5 class="card-title">{{pokemon.name}}</h5>
                        <p class="card-text">Some quick example text to build on the card title</p>
                        <a href="/trainers/" class="btn btn-primary">Ver más..</a>
                <!--Se podria usar en el href lo siguiente /trainers/{{$trainer->id}} asi enviarimoas el id pero como ahora utilizamos slug y en las indicaciones se muetra como crearlo el pasa a funcionar como si fuera el id-->
                </div>
            </div>
        </div>

    </div>
</template>
<script>
import EventBus from '../../event-bus';
    export default{
        data(){
            return{
                pokemons:[],
                loading:true
            }
        },
        created(){
            EventBus.$on('pokemon-added',data=>{
                this.pokemons.push(data)
            })
        },
         mounted() {
           axios
                .get('http://127.0.0.1:8000/pokemons')
                .then((res)=>{
                    this.pokemons=res.data
                    this.loading=false
                })
        }
    }
</script>
<style>
</style>