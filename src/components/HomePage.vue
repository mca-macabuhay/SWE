<template>
    <div class="list_container">
    <h2>Territories</h2>
    <p>Here are the list of territories</p>
        <div v-for="place in places" :key="place.id">

            <p v-if="(place.parent===null)" class="lvl1">{{ place.name }}</p>

            <p v-if="(place.parent==='1')" class="lvl2">{{ place.name }}</p>               
            <div class="lvl3">
                <p v-if="(place.parent==='101')">{{ place.name }}</p> 
                <p v-if="(place.parent==='102')">{{ place.name }}</p> 
                <p v-if="(place.parent==='103')">{{ place.name }}</p> 
            </div>
            
            <p v-if="(place.parent==='2')" class="lvl2">{{ place.name }}</p>
            <div class="lvl3">
                <p v-if="(place.parent==='201')">{{ place.name }}</p> 
                <p v-if="(place.parent==='202')">{{ place.name }}</p> 
                <p v-if="(place.parent==='203')">{{ place.name }}</p> 
            </div>

            <p v-if="(place.parent==='3')" class="lvl2">{{ place.name }}</p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default{
    name: "HomePage",
    data(){
    return{
        places: []
    }
    },
    created(){
        this.placesFetch()
    },
    mounted(){
        if(this.$router.status != true){
            console.log(this.$router.status)
        alert("Please Login First", this.$router);
        this.$router.replace({name:'Login'});
        }
    },
    methods:{
        async placesFetch(){
        const {data} = await axios.get(`https://netzwelt-devtest.azurewebsites.net/Territories/All`);
                console.log(data);
        this.places = data.data;
        },
        tierOpen(data){
            console.log(data)
        }
    }
}
</script>

<style scoped>
.lvl1{
    font-weight: bold;
    color: #3A5A40;
    font-size: 1.5rem;
}
.lvl2{
    font-weight: bold;
    color: #3A5A40;
    font-size: 1.2rem;
}
.lvl3{
    color: #588157;
    font-size: 1rem;
    font-style: italic;
}
.list_container{
    margin-bottom: 5%;
}
</style>