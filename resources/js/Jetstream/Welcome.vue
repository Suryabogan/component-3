<template>
    <div class="">
    
          <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2"  v-if="isAdmin"> 
             <form id="demo" class="ml-12 mt-5 p-6" @submit.prevent method="post">
  <!-- text -->
   <p class="mt-2">
    <input type="radio" name="picked" value="cd" v-model="type">
    {{type}}
    <input type="radio" name="picked" value="book" v-model="type">
    
  </p>
  <p class="mt-2">
      <label>Title</label>
    <input type="text" v-model="title"  class="form-input rounded-md shadow-sm">
  </p>
  <p class="mt-2">
      <label>Author Firstname</label>
    <input type="text" v-model="firstname"  class="form-input rounded-md shadow-sm">
  </p>
  <p class="mt-2">
      <label>Author Mainname</label>
    <input type="text" v-model="mainname"  class="form-input rounded-md shadow-sm">
  </p>
  <p class="mt-2">
      <label>Price</label>
    <input type="number" v-model="price"  class="form-input rounded-md shadow-sm">
  </p>
  <p class="mt-2">
      <label v-if="type=='cd'">Play Length</label>
      <label v-else>Number of pages</label>
    <input type="number" v-model="numpages"  class="form-input rounded-md shadow-sm">
  </p>
 <p>
     <input type="submit" class="form-input rounded-md shadow-sm mt-5 ml-auto" value="SUBMIT" @click="submit"/>
 </p>
  
</form>
          </div>
        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2" v-for="item in items" :key="item.message">
            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l" v-bind="item.id">
                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        <Label>{{ item.type }}</Label>
                        <h1>{{item.title}}</h1>
                        <h2>{{ item.firstname +" "+ item.mainname }}</h2>
                        <h2>Price : ${{ item.price }}</h2>
                        <h2 v-if="item.type=='cd'">Length : {{item.numpages}} minutes</h2>
                        <h2 v-if="item.type=='book'">Number of pages : {{item.numpages}}</h2>
                    </div>
                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700"  v-if="isAdmin">
                                <div class="grid grid-cols-1 md:grid-cols-2">
                                 <Button type="button" @click="deleteItem(item.id)">Delete</Button>
                                </div>
                        </div>
                        
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'
  
    import Button from '@/Jetstream/Button'
  
    import axios from 'axios';
import Label from './Label.vue';
import Input from './Input.vue';


    export default {
        data:function(){
          return{
              isAdmin: false,
              items:[],
              title: '',
              type: 'cd',
              firstname:'',
              mainname:'',
              price:'',
              numpages:'',
              updateForm: true,
              id:''
          } 
        },
        components: {
            JetApplicationLogo,
                Label,
                Input,
        },
        beforeMount(){
            axios.get('/checkAdmin').then((response)=>{
                if (response.data) {
                    this.isAdmin=true;
                }
            }).finally(()=>{
                axios.get('/api/getall').then((response)=>{
                    this.items = response.data;
                })
            })
        },
        methods:{
            submit:function(){
                let data = {
                    title: this.title,
                    type: this.type,
                    firstname: this.firstname,
                    mainname: this.mainname,
                    price: this.price,
                    numpages: this.numpages,
                }
                // console.log(data);
                axios.post('/api/addNewproduct',data).then((response)=>{
                    alert("added");
                }).finally(()=>{
                     this.title=""
                   this.type="cd"
                     this.firstname=""
                    this.mainname=""
                     this.price=""
                     this.numpages=""
                })
            },
            deleteItem:function(id){
                axios.delete(`/api/delete/${id}`).then((res)=>console.log(res)).finally(()=>{
                    location.reload();
                })
            }
        }
    }
</script>
