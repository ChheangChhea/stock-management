<template>
    <div class="wrapper">
        <div class="container">
            <div id="header">
                <div id="headTitle">
                    <div id="logo">
                        <img alt="Healthbook" height="44" src="img/logo.png" width="70"/>
                    </div>
                    <h1 id="title">メニュー</h1>
                </div>
                <ol id="topicPath">
                    <li id="tpHome">
                        <a href="/" title="メニューへ移動する"><img alt="" height="28" src="img/topicPath_home.png" width="28"/></a>
                    </li>
                </ol>
                <div id="headInfo">
                    <div id="date-info">
                        <span class="icon"></span>
                        <p id="todays" title="PM 4:45">2022/08/19</p>
                    </div>
                    <div id="user-info">
                        <span class="icon"></span>
                        <p id="userName">システム
                            <a href="/login/logout" id="btnlogout" title="ログアウト">ログアウト</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-box">
            <div id="product">
                <!--#contents -->
                <div class="search-box mb-4">
                    <router-link to="/login"><h2 class="search-box-title">Search</h2></router-link>
                    <input id="search" name="search" type="hidden" value="1"/>
                    <div class="search-box-content">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_search">
                            <tbody>
                                <tr>
                                    <th width="10%">Group Name</th>
                                    <td width="90%">
                                        <input class="string_zen_kana clear_text text" :key="index" id="group_name" maxlength="8"  name="group_name" size="50" type="text" tabindex="10000"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="10%">Group Name 2</th>
                                    <td width="90%">
                                        <input class="string_zen_kana clear_text text" id="group_name_2" maxlength="50" name="group_name_2"  size="50" type="text" tabindex="10001"/>
                                    </td>
                                </tr>

                                <tr>
                                    <th width="10%">Brand Code</th>
                                    <td width="90%">
                                        <input class="string_zen_kana clear_text text" id="brand_code" maxlength="50" name="brand_code" size="50" type="text" tabindex="10001"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="10%">Category Code</th>
                                    <td width="90%">
                                        <input class="string_zen_kana clear_text text" id="cat_code" maxlength="50" name="cat_code" size="50" type="text" tabindex="10001"/>
                                    </td>
                                </tr>

                                <tr>
                                    <th width="10%">Inactived</th>
                                    <td width="90%">
                                        <div class="selector" id="inactivced"><span>Yes</span>
                                            <select id="inactivced" name="inactivced"  tabindex="10003" style="min-width: 51px; opacity: 0; width: 80px;">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
    
                        <div class="search-box-footer">
                            <div class="button type2" id="uniform-undefined" >
                                <span> Save</span>
                                <input type="button" value="save" class="type2" @click="save()" style="opacity: 0; width: 63px" tabindex="10026"/>
                            </div>        
                                
                            <div class="button type2" id="uniform-undefined">
                                <span>Clear</span>
                                <input type="button" value="clear" class="type2" @click="clear()" style="opacity: 0; width: 63px" tabindex="10026"/>
                            </div>
                                <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Group Code</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div style="margin:0;padding:10px;display:inline">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_search">
                                                <tbody>
                                                    <tr>
                                                        <th width="30%">Group Code</th>
                                                        <td>
                                                            <input id="group_name" name="group_name" type="text" class="text" v-model="form.group_code" tabindex="10028">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Group Name</th>
                                                        <td>
                                                            <input id="group_name" name="group_name" type="text" class="text" v-model="form.group_name" tabindex="10028">
                                                        </td>
                                                    </tr>
                                                  
                                                    <tr>   
                                                        <th>Group Name 2</th>
                                                        <td>
                                                            <input id="group_name_2" name="group_name_2" type="text" class="text" v-model="form.group_name_2" tabindex="10029">
                                                        </td>
                                                    </tr>
                                                    <tr>   
                                                        <th>Brand Code</th>
                                                        <td width="89%">
                                                                <select :disabled="isDisabled"  @change="autoUpdateProduct(form)"  v-model="form.brand_code" class="form" style="width:88%;">
                                                                <option v-for="brand in brands" :value='brand.brand_code'>{{ brand.brand_name}}</option>
                                                                </select>
                                                         </td>
                                                      </tr>
                                                    <tr>   
                                                        <th>Category Code</th>
                                                        <td width="89%">
                                                                <select :disabled="isDisabled"  @change="autoUpdateProduct(form)"  v-model="form.cat_code" class="form" style="width:88%;">
                                                                <option v-for="Cat in Cats" :value='Cat.cat_code'>{{Cat.cat_name }}</option>
                                                                </select>
                                                         </td>
                                                    </tr>
                                                    <tr>   
                                                        <th>Image</th>
                                                        <td>
                                                            <v-file-input v-model="avatarImage" label="Image" required  @change="onFileChange" ></v-file-input>
                                                        </td>
                                                    </tr>
                                                    <tr>   
                                                        <th>Inactived </th>
                                                        <td width="90%">
                                                            <div class="selector" id="inactivced"><span>{{form.inactived}}</span>
                                                                <select id="inactivced" name="inactivced" tabindex="10003"  v-model="form.inactived" style="min-width: 51px; opacity: 0; width: 80px;">
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="modal-footer">
                                        <div class="button type2" id="uniform-undefined" >
                                            <span> {{bt1}}</span>
                                            <input type="button" value="save" class="type2"  data-bs-dismiss="modal" aria-label="Close"  @click="save()"  style="opacity: 0; width: 63px" tabindex="10026"/>
                                        </div>        
                                    
                                        <div class="button type2" id="uniform-undefined">
                                            <span>{{bt2}}</span>
                                            <input type="button" value="clear" class="type2" data-bs-dismiss="modal" aria-label="Close" @click="clear()" style="opacity: 0; width: 63px" tabindex="10026"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="marker"></span>
                    </div>
                </div>
            </div>
            <div class="box">
                    <div class="box-footer-pagination">
                        <div class="pagination">
                            <div class="pagination">
                            </div>
                        </div>
                    </div>

                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_list tbl_stripe">
                        <thead>
                            <tr>                              
                                <th width="6%">Image</th>
                                <th width="13%">Group Code</th>
                                <th width="13%">Group Name</th>
                                <th width="10%">Group Name 2</th>
                                <th width="6%">Brand Code</th>
                                <th width="6%">Cat Code</th>
                                <th width="6%">Inactived</th>
                                <th width="6%">Create By</th>
                                <th width="6%">Update By</th>
                                <th width="7%">
                                 <div class="button" @click="checkActionForm('save','Save','Close','')">
                                    <span >Add New<input type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" tabindex="10028" style="opacity: 0; width: 76px;" ></span>
                                 </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr v-for="item,index in items" :key="index">
                                    <td>{{item.image_url}}</td>
                                    <td>{{item.group_code}}</td>
                                    <td>{{item.group_name}}</td>
                                    <td>{{item.group_name_2}}</td>
                                    <td>{{item.brand_code}}</td>
                                    <td>{{item.cat_code}}</td>
                                    <td>{{item.inactived}}</td>
                                    <td>{{item.created_by}}</td>
                                    <td>{{item.updete_by}}</td>
                                    <td>
                                     <div class="button" @click="checkActionForm('update','Update','Close',item)">
                                        <span><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit<input type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" tabindex="10028" style="opacity: 0; width: 76px;" ></span>
                                     </div>
                                     <div class="button" @click="deleteData(item.group_code)" id="uniform">
                                        <span><i class="fa fa-trash-o" aria-hidden="true"></i> Delete<input type="button" style="opacity: 0; width: 76px;" ></span>
                                     </div>
                                   </td>
                          </tr>
                        </tbody>
                    </table>
                    <div class="box-footer-pagination">
                        <div class="pagination">
                            <div class="pagination">
                            <div class="pagination">
                                <span v-for="(link, index) in links" :key="index">
                                <div v-if="index==0" @click=" "><i class="fa fa-arrow-left" aria-hidden="true" style="padding-top: 11;"></i></div>
                                <div v-else-if="(index-1) == this.last_page" @click="showdata(this.currentPage +1)"><i class="fa fa-arrow-right" aria-hidden="true" style="padding-top: 11;"></i></div>
                                <div v-else-if="this.currentPage == index" class="page current" @click="showdata(index)">{{index}}</div>
                                <div v-else class="page" @click="showdata(index)">{{index}}</div>
                            </span>
                          </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import {exportDefaultSpecifier} from '@babel/types';
export default {
    data() {
        return {
            issave:'save',
            bt1:'Save',
            bt2:'Close',
            items:{},
            links:[],
            brands:[],
            Cats:[],
            products:[],
            perPage: '',
            currentPage: 0,
            last_page:1,
            imagePreviewURL:[],
            items:{},
            form: {
                id: "",
                group_code: "",
                group_name: "",
                image_url: "",
                group_name_2: "",
                brand_code: "",
                cat_code: "",
                inactived: "Yes",
                created_by: "",
                updete_by: "",
            },
            forms: {
                id: "",
                group_code: "",
                group_name: "",
                image_url: "",
                group_name_2: "",
                brand_code: "",
                cat_code: "",
                inactived: "",
                created_by: "",
                updete_by: "",
            },
        };
    },

    mounted() {
        this.showdata()
        this.getBrand()
        this.getCat()    
    },
    
    methods: {
        getProductGroup() {
            axios.get('api/v1/productgroup').then(res => {
            this.items = res
        });
        },
        save() {
            if(this.issave == "save"){
                axios.post('api/v1/progroups/create',this.form).then(res => {
                    this.showdata()
                })   
            }else{
                axios.post('api/v1/progroups/updete/'+this.issave,this.form).then(res => {
                    this.showdata()
                })  
            }
        },
    onFileChange(payload) { 
         file = payload 
         if (file) {this.imagePreviewURL = URL.createObjectURL(file),
           URL.revokeObjectURL(file);
       } else {

        this.imagePreviewURL =  null
      }
    },
    checkActionForm(checkform,bt1,bt2,brandId){
            this.bt1 = bt1
            this.bt2 = bt2
        if(checkform =="save"){         
            this.issave = 'save'
        }
         else{
            this.form = brandId
            this.issave = brandId.group_code
        }
     },
     showdata(page=1) {
              if(page > 0 && page <= this.last_page){
              axios.get('/api/v1/progroups').then(({data})=>{
              this.links = data.links
              this.last_page = data.last_page       
              this.links.forEach(element => {
                 if(element.label == page){
                    this.perPage = "api/v1/progroups?page="+page
                    axios.get(this.perPage).then(({data})=>{
                    this.currentPage = data.current_page
                    this.items = data.data
                  })
                 }
              });

            }).catch(({response})=>{
                console.error(response)
            })
           }
     },
    deleteData(id){
        axios.get('/api/v1/progroups/delete/'+id).then(res => {
                this.showdata()
        }) 
   },
   getBrand(){
    axios.get('api/v1/brands/getdata').then(res => {
                this.brands = res.data
        }) 
   },
   getCat(){
    axios.get('api/v1/category/getCatName').then(res => {
                this.Cats = res.data
        }) 
   },
  },
};

</script>
