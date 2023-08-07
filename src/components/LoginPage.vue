<template>
    <div>
        <h1>Welcome Back. Enter your Login Credentials.</h1>
        <form @submit.prevent="LoginData">
            <input type="text" v-model="user.username" placeholder="Username"> <br>
            <input type="password" v-model="user.password" placeholder="Password"> <br>
            <button type="submit">Login</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
export default{
    name:'LoginPage',
    data(){
        return{
            result:{},
            user:{
                username:'',
                password: ''
            }
        }
    },
    created(){},
    mounted(){ console.log("login page rendered");},
    methods:{
        LoginData(){
            axios.post('https://netzwelt-devtest.azurewebsites.net/Account/SignIn', this.user)
            .then(
                ({data})=>{
                    try{
                        if(data.status === true){
                            this.$router.status=true;
                            alert("Login Successful");
                            this.$router.push({name: 'Home'})
                        }else{
                            alert("Login Failed")
                        }
                    }catch(err){
                        alert("Error: ", err)
                    }
                }
            )
        }
    }
}
</script>

<style>
h1,h2{
    margin-top: 3%;
    font-weight: bold;
    color: #3A5A40;
}
form{
    margin-top: 5%;
}
input{
    width: 250px;
    margin-bottom: 20px;
    outline: none;
}
button{
    width: 250px;
    height: 40px;
    border-radius: 8px;
    background-color: #3A5A40;
    color: white;
    font-weight: bold;
    border: none;
    outline:n none;
}
</style>