<template >
  <div class="wrapper">
    <div class="container-fuild">
   <div id="header">
        <div id="headTitle">
          <div id="logo"><img alt="Healthbook" height="44" src="img/logo.png" width="70"></div>
          <h1 id="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Patient master</font></font></h1>
        </div>
        <ol id="topicPath">
          <li id="tpHome"><a href="#" title="go to menu"><img alt="" height="28" src="img/topicPath_home.png" width="28"></a></li>              
              <li>
                  <a href="dashbaord"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Master Admin</font></font></a>
              </li>
              <li>
                  <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    View-Product
                  </font></font></span>
              </li>
        </ol>
        <div id="headInfo">
          <div id="date-info">
            <span class="icon"></span>
            <p id="todays" original-title="PM12:13"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2022/08/25</font></font></p>
          </div>
          <div id="user-info">
            <span class="icon"></span>
            <p id="userName"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">system 
              </font></font><a href="/login/logout" id="btnlogout" original-title="logout"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">logout</font></font></a></p>
          </div>
        </div>
        <!-- / #header --></div>
    </div>

    <div class="search-box">
      <div id="product">
        <!--#contents -->
        <div class="search-box mb-4 ">
         <div class="search-box-title" style="height: 36px;">
         <router-link to="product"><a class="btn-radius btn btn-sm" href="#" style=" color: #f8f5b4;margin-top: -2px; color: #dbdee1;">
              <i class="fas fa-plus" style="padding-right:5px;">
              </i>
              Add Product
            </a></router-link>
            <router-link to="productsetting"><a class="btn-radius btn btn-sm" href="#" style=" color: #f8f5b4;margin-top: -2px;">
              <i class="fa fa-cog" aria-hidden="true"></i>
              Product Setting
            </a></router-link>
            <router-link to="menupurchase"><a class="btn-radius btn btn-sm" href="#" style=" color: #f8f5b4;margin-top: -2px;">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              Purchase Order
            </a></router-link>
            <router-link to="menustock"><a class="btn-radius btn btn-sm" href="#" style=" color: #f8f5b4;margin-top: -2px;">
              <i class="fa fa-shopping-basket" aria-hidden="true"></i>
              Stock
            </a></router-link>
            <router-link to="stockalert"><a class="btn-radius btn btn-sm" href="#" style=" color: #f8f5b4;margin-top: -2px;">
              <i class='fas fa-bell'></i>
                Products stock alert <span style="background-color: red; border-radius: 5px;padding: 3px;box-shadow: 1px 1px;">10 item</span>
             </a></router-link>
          </div>
          <div class="search-box-content">

            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_search">
              <tbody>
                <tr>
                  <th width="10%"> No</th>
                  <td width="50%">
                    <input :disabled="true" @change="autoUpdateProduct(form)" v-model="form.product_no"
                      class="string_zen_kana clear_text text input_text" maxlength="50" size="50" type="text">

                  </td>
                </tr>
                <tr>
                  <th width="10%"> Barcode</th>
                  <td width="50%">
                    <input :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.product_barcode"
                      class="string_zen_kana clear_text text input_text" maxlength="50" size="50" type="text">
                  </td>

                </tr>
                <tr>
                  <th width="10%">Description1</th>
                  <td width="50%">
                    <input :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.description"
                      class="string_zen clear_text text input_text" size="50" type="text">
                  </td>

                </tr>
                <tr>
                  <th width="10%">Description2</th>
                  <td width="50%">
                    <input :disabled="isDisabled" @change="autoUpdateProduct(form)" :v-model="form.description_2"
                      class="string_zen clear_text text input_text" size="50" type="text">

                  </td>

                </tr>
                <tr>
                  <th width="10%">Stock Unit</th>
                  <td width="50%">
                    <select :disabled="isDisabled" @change="autoUpdateProduct(form)"
                      v-model="form.stock_unit_of_measure_code" class="form" style="width:362px;">
                      <option v-for="uint in uints" :value='uint.unit_code'>{{ uint.unit_of_measure }}</option>
                    </select>
                  </td>

                </tr>
                <tr>
                  <th width="10%">Purche Unit</th>
                  <td width="50%">
                    <select :disabled="isDisabled" @change="autoUpdateProduct(form)"
                      v-model="form.purche_unit_of_measure_code" class="form" style="width:362px;">
                      <option v-for="uint in uints" :value='uint.unit_code'>{{ uint.unit_of_measure }}</option>
                    </select>
                  </td>

                </tr>
                <tr>
                  <th width="10%">Suppliyer</th>
                  <td width="50%">
                    <select :disabled="isDisabled" v-model="form.sup_code" @change="autoUpdateProduct(form)"
                      class="form" style="width:362px;">
                      <option value="">Selete Suppliyer</option>
                      <option v-for="suppliyer in suppliyers" :value='suppliyer.sup_code'>{{ suppliyer.sup_name }}
                      </option>
                    </select>
                  </td>

                </tr>
                <tr>
                  <th width="10%">Group Product </th>
                  <td width="50%">
                    <select :disabled="isDisabled" class="form" @change="autoUpdateProduct(form)" style="width:362px;">
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th width="10%">Category</th>
                  <td width="50%">
                    <select :disabled="isDisabled" class="form" @change="autoUpdateProduct(form)" style="width:362px;">
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th width="10%">Brand Name </th>
                  <td width="50%">
                    <select :disabled="isDisabled" class="form" @change="autoUpdateProduct(form)" style="width:362px;">
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th width="10%">Unit Price</th>
                  <td width="50%">
                    <input :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.unit_price"
                      class="string_zen clear_text text input_text" size="50" type="text">
                  </td>

                </tr>
             
                <tr>
                  <th>Inactived </th>
                  <td width="90%">
                    <div class="selector" id="inactivced"><span>{{ form.inactived }}</span>
                      <select id="inactivced" name="inactivced" tabindex="10003" v-model="form.inactived"
                        style="min-width: 51px; opacity: 0; width: 80px;">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
           <div class="search-box-footer">
              <div class="button type2" id="uniform-undefined"><span><input @click="save()" type="button"
                    value="display" class="type2" style="opacity: 0; width: 54px;" tabindex="10025"><i class="fa fa-search" aria-hidden="true"></i>  Search</span>
              </div>
            </div>
          </div>
        </div>
       <div class="box">
<div class="box-footer-pagination">
<div class="pagination">
  <div class="pagination">
    <div class="overflow-auto">
       <!-- <b-pagination  v-model="currentPage" :total-rows="rows" :per-page="perPage" aria-controls="my-table"></b-pagination>
       <p class="mt-3">Current Page: {{ currentPage }}</p>
       <b-table id="my-table" :items="products" :per-page="perPage" :current-page="currentPage"  small ></b-table> -->
    </div>
 </div>
</div>
</div>
<div class="box-content">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_list tbl_stripe">
    <thead>
        <tr>
          
            <th width="5%" >Image</th>
            <th width="9%"  style=" text-align: left;">Product No</th>
            <th width="9%" style=" text-align: left;">Barcode</th>
            <th width="13%" style=" text-align: left;">Description</th>
            <th width="13%" style=" text-align: left;">Description2</th>
            <th width="9%">Group</th>
            <th width="9%">Categrory</th>
            <th width="9%">Brand</th>
            <th width="9%">Stock Unit</th>
            <th width="9%">Purche Unit</th>
            <th width="9%">Inactived</th>
            <th width="9%"></th>
        </tr>
    </thead>
    <tbody>
      <tr v-for="(product, index) in products" :key="index" >
            <td v-if="(index)%2==0" style="background-color: #dbdee1; border: medium none;">
               <img alt="タックシール印刷" height="40" src="pichture/para.png" width="40" style="box-shadow: 1px 1px 1px 1px #b08b8b;">
            </td>
            <td v-else style="border: medium none;">
              <img alt="タックシール印刷" height="40" src="pichture/Paracetamol.jpg" width="40" style="box-shadow: 1px 1px 1px 1px #b08b8b;">
            </td>
            <td v-if="(index)%2==0" style="background-color: #dbdee1; border: medium none; text-align: left;">{{product.product_no}}</td>   <td v-else style="border: medium none; text-align: left;">{{product.product_no}}</td>
            <td v-if="(index)%2==0" style="background-color: #dbdee1; border: medium none; text-align: left;">{{product.product_barcode}}</td>   <td v-else style="border: medium none; text-align: left;">{{product.product_barcode}}</td>
            <td v-if="(index)%2==0" style="background-color: #dbdee1; border: medium none; text-align: left;">{{product.description}}</td>   <td v-else style="border: medium none; text-align: left;">{{product.description}}</td>
            <td v-if="(index)%2==0" style="background-color: #dbdee1; border: medium none; text-align: left;">{{product.description_2}}</td>   <td v-else style="border: medium none; text-align: left;">{{product.description_2}}</td>

            <td v-if="(index)%2==0" style="background-color: #dbdee1; border: medium none; text-align: left;">{{product.group_code}}</td>   <td v-else style="border: medium none; text-align: left;">{{product.group_code}}</td>
            <td v-if="(index)%2==0" style="background-color: #dbdee1; border: medium none;">{{product.cat_code}}</td>   <td v-else style="border: medium none;">{{product.cat_code}}</td>
            <td v-if="(index)%2==0" style="background-color: #dbdee1; border: medium none;">{{product.brand_code}}</td>   <td v-else style="border: medium none;">{{product.brand_code}}</td>

            <td v-if="(index)%2==0" style="background-color: #dbdee1; border: medium none;">{{product.stock_unit_of_measure_code}}</td>   <td v-else style="border: medium none;">{{product.stock_unit_of_measure_code}}</td>
            <td v-if="(index)%2==0" style="background-color: #dbdee1; border: medium none;">{{product.purche_unit_of_measure_code}}</td>   <td v-else style="border: medium none;">{{product.purche_unit_of_measure_code}}</td>
            <td v-if="(index)%2==0" style="background-color: #dbdee1; border: medium none;">{{product.inactived}}</td>   <td v-else style="border: medium none;">{{product.inactived}}</td>
            <td v-if="(index)%2==0" style="background-color: #dbdee1; border: medium none; text-align: center;">
              <div style=" display: flex; flex-direction: row;justify-content: space-around;align-items: center;">
                 <div class="button type2" id="uniform-undefined"><span><input  @click="getEdit(product.product_no)" type="button"
                    value="display" class="type2" style="opacity: 0; width: 54px;" tabindex="10025"><i class="fa fa-edit"></i>Update</span>
                 </div>
                 <div class="button type2" id="uniform-undefined"><span><i class="fa fa-trash" aria-hidden="true"></i>Delete <input type="button" value="clear"
                    class="type2" style="opacity: 0; width: 63px;" tabindex="10026"></span>
                  </div>
                </div>
            </td>
            <td  v-else style="border: medium none; text-align: center;">
                <div style=" display: flex; flex-direction: row;justify-content: space-around;align-items: center;">
                 <div class="button type2" id="uniform-undefined"><span><input  @click="getEdit(product.product_no)" type="button"
                    value="display" class="type2" style="opacity: 0; width: 54px;" tabindex="10025"><i class="fa fa-edit"></i>Update</span>
                 </div>
                  <div class="button type2" id="uniform-undefined" to="product"><span><i class="fa fa-trash" aria-hidden="true"></i>Delete <input type="button" value="clear"
                    class="type2" style="opacity: 0; width: 63px;" tabindex="10026"></span>
                  </div>
                </div>
            </td>
        </tr>  
    </tbody>
</table>
</div>
<div class="box-footer-pagination">
<div class="pagination">
  <div class="pagination">
         <span v-for="(link, index) in links" :key="index">
          <div v-if="index==0" @click="getproduct(this.currentPage -1)"><i class="fa fa-arrow-left" aria-hidden="true" style="padding-top: 11;"></i></div>
          <div v-else-if="(index-1) == this.last_page" @click="getproduct(this.currentPage +1)"><i class="fa fa-arrow-right" aria-hidden="true" style="padding-top: 11;"></i></div>
          <div v-else-if="this.currentPage == index" class="page current" @click="getproduct(index)">{{index}}</div>
          <div v-else class="page" @click="getproduct(index)">{{index}}</div>
    </span>
  </div>
</div>
</div>
</div>
      </div>
    </div>
  </div>
</template>

<script>
import {exportDefaultSpecifier} from '@babel/types';
import pagination from 'laravel-vue-pagination'
import axios, { Axios } from 'axios';
  export default {
    data() {
      return {
        links:[],
        products:[],
        perPage: '',
        currentPage: 0,
        last_page:1,
        form: {
          product_no: '',
          product_barcode: '',
          description: '',
          description_2: '',
          image_url: '',
          stock_unit_of_measure_code: '',
          purche_unit_of_measure_code: '',
          bom_no: '',
          sup_code: '',
          unit_price: '',
          inactived: '',
        }
      }
    },
    mounted(){
      this.getproduct()
    },
    methods: {
       getproduct(page=1) {
              if(page > 0 && page <= this.last_page){
              axios.get('/api/v1/products/viewpro').then(({data})=>{
              this.links = data.links
              this.last_page = data.last_page       
              this.links.forEach(element => {
                 if(element.label == page){
                   this.perPage = "/api/v1/products/viewpro?page="+page
                   axios.get(this.perPage).then(({data})=>{
                    this.currentPage = data.current_page
                    console.log(data.data);
                    this.products = data.data
                  })
                 }
              });

            }).catch(({ response })=>{
                console.error(response)
            })
               }
          },
          getEdit(ProductID){
            if(ProductID!=""){
              this.$router.push({name:'Product', query: {id:ProductID }});
            }
          },
       },
     computed: {
      rows() {
        return this.items.length
      }
    },
  }
  </script>