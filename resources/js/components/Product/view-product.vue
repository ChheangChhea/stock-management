<template >
  <div class="wrapper">
    <div class="container-fuild">
      <div id="header">
        <div id="headTitle">
          <div id="logo">
            <img alt="Healthbook" height="44" src="img/logo.png" width="70" />
          </div>
          <h1 id="title">
            <font style="vertical-align: inherit">
              <font style="vertical-align: inherit">Patient master</font>
            </font>
          </h1>
        </div>
        <ol id="topicPath">
          <li id="tpHome">
            <a href="/" title="go to menu"><img alt="" height="28" src="img/topicPath_home.png" width="28" /></a>
          </li>
          <li>
            <a href="dashbaord">
              <font style="vertical-align: inherit">
                <font style="vertical-align: inherit">Master Admin</font>
              </font>
            </a>
          </li>
          <li>
            <span>
              <font style="vertical-align: inherit">
                <font style="vertical-align: inherit">
                  View-Product
                </font>
              </font>
            </span>
          </li>
        </ol>
        <div id="headInfo">
          <div id="date-info">
            <span class="icon"></span>
            <p id="todays" original-title="PM12:13">
              <font style="vertical-align: inherit">
                <font style="vertical-align: inherit">2022/08/25</font>
              </font>
            </p>
          </div>
          <div id="user-info">
            <span class="icon"></span>
            <p id="userName">
              <font style="vertical-align: inherit">
                <font style="vertical-align: inherit">system </font>
              </font><a href="/login/logout" id="btnlogout" original-title="logout">
                <font style="vertical-align: inherit">
                  <font style="vertical-align: inherit">logout</font>
                </font>
              </a>
            </p>
          </div>
        </div>
        <!-- / #header -->
      </div>
    </div>

    <div class="search-box">
      <div id="product">
        <!--#contents -->
        <div class="search-box mb-4">
          <div class="search-box-title">
            <router-link to="product"><a class="btn-radius btn btn-sm" href="#"
                style="color: #f8f5b4; margin-top: -2px; color: #dbdee1">
                <i class="fas fa-plus" style="padding-right: 5px"> </i>
                Add Product
              </a></router-link>
            <router-link to="productsetting"><a class="btn-radius btn btn-sm" href="#"
                style="color: #f8f5b4; margin-top: -2px">
                <i class="fa fa-cog" aria-hidden="true"></i>
                Product Setting
              </a></router-link>
            <router-link to="menupurchase"><a class="btn-radius btn btn-sm" href="#"
                style="color: #f8f5b4; margin-top: -2px">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Purchase Order
              </a></router-link>
            <router-link to="menustock"><a class="btn-radius btn btn-sm" href="#"
                style="color: #f8f5b4; margin-top: -2px">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                Stock
              </a></router-link>
            <router-link to="stockalert"><a class="btn-radius btn btn-sm" href="#"
                style="color: #f8f5b4; margin-top: -2px">
                <i class="fas fa-bell"></i>
                Products stock alert
                <span style="
                    background-color: red;
                    border-radius: 5px;
                    padding: 3px;
                    box-shadow: 1px 1px;
                  ">10 item</span>
              </a></router-link>
          </div>
          <div class="search-box-content">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_search">
              <tbody>
                <tr>
                  <th width="10%">Barcode</th>
                  <td width="50%">
                    <input :disabled="isDisabled" v-model="form.product_barcode"
                      class="string_zen_kana clear_text text input_text" maxlength="50" size="50" type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Description.1</th>
                  <td width="50%">
                    <input :disabled="isDisabled" v-model="form.description"
                      class="string_zen clear_text text input_text" size="50" type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Description.2</th>
                  <td width="50%">
                    <input :disabled="isDisabled" v-model="form.description_2"
                      class="string_zen clear_text text input_text" size="50" type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Stock Unit</th>
                  <td width="50%">
                    <select :disabled="isDisabled" v-model="form.stock_unit_of_measure_code" class="form"
                      style="width: 385px">
                      <option value=""></option>
                      <!-- <option v-for="uint in uints" :value="uint.unit_code">
                        {{ uint.unit_of_measure }}
                      </option> -->
                    </select>
                  </td>
                </tr>
                <tr>
                  <th width="10%">Purche Unit</th>
                  <td width="50%">
                    <select :disabled="isDisabled" v-model="form.purche_unit_of_measure_code" class="form"
                      style="width: 385px">
                      <option value=""></option>
                      <!-- <option v-for="uint in uints" :value="uint.unit_code">
                        {{ uint.unit_of_measure }}
                      </option> -->
                    </select>
                  </td>
                </tr>
                <tr>
                  <th width="10%">Suppliyer</th>
                  <td width="50%">
                    <select :disabled="isDisabled" v-model="form.sup_code" class="form" style="width: 385px">
                      <option value=""></option>
                      <option v-for="suppliyer in suppliyers" :value="suppliyer.sup_code">
                        {{ suppliyer.sup_name }}
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th width="10%">Group Product</th>
                  <td width="50%">
                    <select :disabled="isDisabled" v-model="form.group_code" class="form" style="width: 385px">
                      <option value=""></option>
                      <option v-for="graoup in graoups" :value="graoup.group_code">
                        {{ graoup.group_name }}
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th width="10%">Category</th>
                  <td width="50%">
                    <select :disabled="isDisabled" v-model="form.cat_code" class="form" style="width: 385px">
                      <option value=""></option>
                      <option v-for="categor in category" :value="categor.cat_code">
                        {{ categor.cat_name }}
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th width="10%">Brand Name</th>
                  <td width="50%">
                    <select :disabled="isDisabled" v-model="form.brand_code" class="form" style="width: 385px">
                      <option value=""></option>
                      <option v-for="brand in brands" :value="brand.brand_code">
                        {{ brand.brand_name }}
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th width="10%">Unit Price</th>
                  <td width="50%">
                    <input :disabled="isDisabled" v-model="form.unit_price"
                      class="string_zen clear_text text input_text" size="50" type="text" />
                  </td>
                </tr>
                <tr>
                  <th>Inactived</th>
                  <td width="90%">
                    <div class="selector" id="inactivced">
                      <span>{{ form.inactived }}</span>
                      <select id="inactivced" name="inactivced" tabindex="10003" v-model="form.inactived"
                        style="min-width: 51px; opacity: 0; width: 80px">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="search-box-footer">
              <div class="button type2" id="uniform-undefined">
                <span><input @click="searchProduct()" type="button" value="display" class="type2" style="opacity: 0; width: 54px" tabindex="10025" /><i class="fa fa-search" aria-hidden="true"></i> Search</span>
               </div>
               <div class="button type2" id="uniform-undefined">
                <span  data-bs-toggle="modal" data-bs-target="#statiex-import" tabindex="10028" @click="save()"><input @click="save()" type="button" value="display" class="type2" style="opacity: 0; width: 54px" tabindex="10025"  /><i class='fas fa-file-import'></i> Import From Excel</span>
              </div>
              <div class="button type2" id="uniform-undefined">
                <span  data-bs-toggle="modal" data-bs-target="#statiex-import" tabindex="10028" @click="exportSheet()"><input @click="exportSheet()" type="button" value="display" class="type2" style="opacity: 0; width: 54px" tabindex="10025"  /><i class='fas fa-file-import'></i> Export To Excel</span>
              </div>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="box-footer-pagination">
            <div class="pagination">
              <div class="pagination">
                <div class="overflow-auto"></div>
              </div>
            </div>
          </div>
          <div class="box-content">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_list tbl_stripe">
              <thead>
                <tr>
                  <th width="5%">Image</th>
                  <th width="9%">Product No</th>
                  <th width="9%">Barcode</th>
                  <th width="13%">Description</th>
                  <th width="13%">Description2</th>
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
                <tr v-for="(product, index) in products.data" :key="index">
                  <td v-if="index % 2 == 0" style="background-color: #dbdee1; border: medium none">
                    <img alt="タックシール印刷" height="40" src="pichture/para.png" width="40" />
                  </td>
                  <td v-else style="border: medium none">
                    <img alt="タックシール印刷" height="40" src="pichture/Paracetamol.jpg" width="40" />
                  </td>
                  <td v-if="index % 2 == 0" style="
                      background-color: #dbdee1;
                      border: medium none;
                     ;
                    ">
                    {{ product.product_no }}
                  </td>
                  <td v-else style="border: medium none;">
                    {{ product.product_no }}
                  </td>
                  <td v-if="index % 2 == 0" style="
                      background-color: #dbdee1;
                      border: medium none;
                     
                    ">
                    {{ product.product_barcode }}
                  </td>
                  <td v-else style="border: medium none;">
                    {{ product.product_barcode }}
                  </td>
                  <td v-if="index % 2 == 0" style="
                      background-color: #dbdee1;
                      border: medium none;
                     ;
                    ">
                    {{ product.description }}
                  </td>
                  <td v-else style="border: medium none;">
                    {{ product.description }}
                  </td>
                  <td v-if="index % 2 == 0" style="
                      background-color: #dbdee1;
                      border: medium none;
                     ;
                    ">
                    {{ product.description_2 }}
                  </td>
                  <td v-else style="border: medium none;">
                    {{ product.description_2 }}
                  </td>

                  <td v-if="index % 2 == 0" style="
                      background-color: #dbdee1;
                      border: medium none;
                     ;
                    ">
                    {{ product.group_code }}
                  </td>
                  <td v-else style="border: medium none;">
                    {{ product.group_code }}
                  </td>
                  <td v-if="index % 2 == 0" style="background-color: #dbdee1; border: medium none">
                    {{ product.cat_code }}
                  </td>
                  <td v-else style="border: medium none">
                    {{ product.cat_code }}
                  </td>
                  <td v-if="index % 2 == 0" style="background-color: #dbdee1; border: medium none">
                    {{ product.brand_code }}
                  </td>
                  <td v-else style="border: medium none">
                    {{ product.brand_code }}
                  </td>

                  <td v-if="index % 2 == 0" style="background-color: #dbdee1; border: medium none">
                    {{ product.stock_unit_of_measure_code }}
                  </td>
                  <td v-else style="border: medium none">
                    {{ product.stock_unit_of_measure_code }}
                  </td>
                  <td v-if="index % 2 == 0" style="background-color: #dbdee1; border: medium none">
                    {{ product.purche_unit_of_measure_code }}
                  </td>
                  <td v-else style="border: medium none">
                    {{ product.purche_unit_of_measure_code }}
                  </td>
                  <td v-if="index % 2 == 0" style="background-color: #dbdee1; border: medium none">
                    {{ product.inactived }}
                  </td>
                  <td v-else style="border: medium none">
                    {{ product.inactived }}
                  </td>
                  <td v-if="index % 2 == 0" style="
                      background-color: #dbdee1;
                      border: medium none;
                      text-align: center;
                    ">
                    <div style="
                        display: flex;
                        flex-direction: row;
                        justify-content: space-around;
                        align-items: center;
                      ">
                      <div class="button type2" id="uniform-undefined">
                        <span><input @click="getEdit(product.product_no)" type="button" value="display" class="type2"
                            style="opacity: 0; width: 54px" tabindex="10025" /><i class="fa fa-edit"></i>Update</span>
                      </div>
                      <div class="button type2" id="uniform-undefined">
                        <span><i class="fa fa-trash" aria-hidden="true"></i>Delete
                          <input type="button" value="clear" class="type2" style="opacity: 0; width: 63px"
                            tabindex="10026" /></span>
                      </div>
                    </div>
                  </td>
                  <td v-else style="border: medium none; text-align: center">
                    <div style="
                        display: flex;
                        flex-direction: row;
                        justify-content: space-around;
                        align-items: center;
                      ">
                      <div class="button type2" id="uniform-undefined">
                        <span><input @click="getEdit(product.product_no)" type="button" value="display" class="type2"
                            style="opacity: 0; width: 54px" tabindex="10025" /><i class="fa fa-edit"></i>Update</span>
                      </div>
                      <div class="button type2" id="uniform-undefined" to="product">
                        <span><i class="fa fa-trash" aria-hidden="true"></i>Delete
                          <input type="button" value="clear" class="type2" style="opacity: 0; width: 63px"
                            tabindex="10026" /></span>
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
                  <div v-if="index == 0" @click="getproduct(this.currentPage - 1)">
                    <i class="fa fa-arrow-left" aria-hidden="true" style="padding-top: 11"></i>
                  </div>
                  <div v-else-if="index - 1 == this.last_page" @click="getproduct(this.currentPage + 1)">
                    <i class="fa fa-arrow-right" aria-hidden="true" style="padding-top: 11"></i>
                  </div>
                  <div v-else-if="this.currentPage == index" class="page current" @click="getproduct(index)">
                    {{ index }}
                  </div>
                  <div v-else class="page" @click="getproduct(index)">
                    {{ index }}
                  </div>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade ui-modal" id="statiex-import" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticboomId" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content ui-dialog">
                <div class="ui-widget-header">
                  <h5 class="modal-title in-header" id="staticBackdropLabel" ><i class="fa fa-print" aria-hidden="true"></i> {{ excel }} to Docutment: {{ form.document_no }} , {{ form.description }}</h5>
                  <a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button" data-bs-dismiss="modal">
                    <span class="ui-icon ui-icon-closethick">close</span></a>
                </div>
                <div id="purchaseorder">
                  <div class="card">
                    <div class="card-body">
                      <div class="container mb-5 mt-3">
                        <div class="row d-flex align-items-baseline">
                          <div class="col-xl-9">
                          </div>
                            <hr>
                        </div>

                        <div class="container">
                          <div class="col-md-12">
                            <div class="text-center">
                              <h3 v-if="excel=='Import'" class="​title-purchase" id="titlered">{{excel}} {{ exefile }} from Excel</h3>
                              <h3 v-else class="title-purchase" id="titlered">{{excel}} To Excel</h3>
                            </div>
                          </div>
                          <div class="row my-2 mx-1 justify-content-center table-padding-bot customsroll">
                            <table class="table table-striped table-borderless" id="exceldata">
                              <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr>
                                  <th style="width: 5%">No</th>
                                  <th style="width: 10%">Document No</th>
                                  <th style="width: 10%">Document Type</th>
                                  <th style="width: 7%">Product No</th>
                                  <th style="width: 7%">Description</th>
                                  <th style="width: 7%">Unit Price</th>
                                  <th style="width: 7%">Inventory</th>
                                  <th style="width: 7%">Unit Code</th>
                                  <th style="width: 7%">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="(purchaseLine,index) in items" :key="items.index">
                                  <th v-if="index>=1" style="width: 5%">{{index}}</th>
                                  <th v-if="index>=1" style="width: 10%">{{purchaseLine.document_no}}</th>
                                  <th v-if="index>=1" style="width: 10%">{{purchaseLine.document_type}}</th>
                                  <th v-if="index>=1" style="width: 7%">{{purchaseLine.product_no}}</th>
                                  <th v-if="index>=1" style="width: 10%">{{purchaseLine.description}}</th>
                                  <th v-if="index>=1" style="width: 7%">{{purchaseLine.unit_price}}{{purchaseLine.curency_code}}</th>
                                  <th v-if="index>=1" style="width: 7%">{{purchaseLine.inventory}}</th>
                                  <th v-if="index>=1" style="width: 7%">{{purchaseLine.unit_of_measure_code}}</th>
                                  <th v-if="index>=1" style="width: 7%">{{purchaseLine.total_amount}}{{purchaseLine.curency_code}}</th>
                                </tr>
                              </tbody>

                            </table>
                          </div>
                          <div class="row">
                            <div class="col-xl-8 supplier-padding">
                              <p class="ms-3">Payment Information</p>
                              <ul class="list-unstyled">
                                <li class="text-muted">ABA BANK<span class="text--color">Mr. Master</span></li>
                                <li class="text-muted">Bank Name:<span class="text--color">Mr. Master</span></li>
                                <li class="text-muted">Bank Account Number: <span class="text--color">001 025 025</span></li>
                              </ul>
                            </div>

                            <div class="col-xl-8 supplier-padding">
                              <ul class="list-unstyled">
                                <tr>
                                  <td class="th-font-bold text-right">Products :</td>
                                  <td class="th-font-bold">{{ productline }}</td>
                                </tr>
                                <tr>
                                  <td class="th-font-bold text-right" >Inventory : </td>
                                  <td class="th-font-bold">{{ item }}</td>
                                </tr>
                                <tr>
                                  <td class="th-font-bold table-th-width text-right">Total Amount : </td>
                                  <td class="th-font-bold">{{total}}{{form.curency_code}}</td>
                                </tr>
                              </ul>
                            </div>
                          </div>
                          <hr>
                      

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                     <a v-if="excel=='Import'" class="btn-purchase btn-light text-capitalize" data-bs-dismiss="modal" data-mdb-ripple-color="dark" @click="saveprulink()"><i class="fas fa-save"></i> Save Date</a>
                     <a v-if="excel=='Import'" class="btn-purchase btn-light text-capitalize" data-mdb-ripple-color="dark"><i class="fas fa-file-excel"></i> {{ excel }} Form excel</a>
                     <input v-if="excel=='Import'"  type="file" @change="getExcelData" name="select_file" />
                     <a v-else class="btn-purchase btn-light text-capitalize" data-bs-dismiss="modal" data-mdb-ripple-color="dark" @click="exportdataExcel()"><i class="fas fa-save"></i> Save Date</a>
                     </div>
              </div>
            </div>
    </div>

    <div id="myModalauto" class="lsky">
      <div class="lsky-content">
         <p>{{ massege }}</p>
      </div>
    </div>

</template>

<script>
import readXlsxFile from 'read-excel-file';
import * as XLSX from 'xlsx/xlsx.mjs';
import axios from "axios";
export default {
  data() {
    return {
      brands: [],
      graoups: [],
      category: [],
      suppliyers: [],
      uints: [],
      links: [],
      products: [],
      perPage: "",
      currentPage: 0,
      last_page: 1,
      form: {
        product_no: "",
        product_barcode: "",
        description: "",
        description_2: "",
        image_url: "",
        stock_unit_of_measure_code: "",
        purche_unit_of_measure_code: "",
        brand_code: "",
        group_code: "",
        cat_code: "",
        sup_code: "",
        unit_price: "",
        inactived: "",
      },
      checkexcel:[],
      items :[{
          product_no: "",
          product_barcode: "",
          description: "",
          description_2: "",
          image_url: "",
          stock_unit_of_measure_code: "",
          purche_unit_of_measure_code: "",
          bom_no: "",
          reorder_point: "",
          sup_code: "",
          brand_code: "",
          group_code: "",
          cat_code: "",
          unit_price: "",
          inactived: "",
        }],
        iteamLinks:[{
            product_no: "",
            description: "",
            description_2: "",
            image_url: "",
            variant_unit_of_measure_code: "",
            stock_unit_of_measure_code: "",
            quantity_per_unit: "",
            unit_price: "",
            curency_code: "",
            status: "",
            inactived: "",
        }],
        checkarray:1,
        excel:'Import',
        fileName : "PrucheseLine.xlsx",
    };
  },
  async mounted() {
    this.getproduct();
    this.getunite();
    this.getdatagroup();
    this.getCatName();
    this.getbrands();
    this.getsuppliyer();
  },
  methods: {
    getproduct(page = 1) {
      if (page > 0 && page <= this.last_page) {
        axios
          .get("/api/v1/products/viewpro")
          .then(({ data }) => {
            this.links = data.links;
            this.last_page = data.last_page;
            console.log(data.data);

            this.links.forEach((element) => {
              if (element.label == page) {
                this.perPage = "/api/v1/products/viewpro?page=" + page;
                axios.get(this.perPage).then(({ data }) => {
                  this.currentPage = data.current_page;
                  console.log(data);
                  this.products = data;
                });
              }
            });
          })
          .catch(({ response }) => {
            console.error(response);
          });
      }
    },

    getunite() {
      axios.get("/api/v1/units").then((response) => {
        this.uints = response.data;
      });
    },
    getbrands() {
      axios.get("/api/v1/brands/getdata").then((response) => {
        this.brands = response.data;
      });
    },
    getdatagroup() {
      axios.get("/api/v1/progroups/getdatagroup").then((response) => {
        this.graoups = response.data;
      });
    },
    getCatName() {
      axios.get("/api/v1/category/getCatName").then((response) => {
        this.category = response.data;
      });
    },
    getsuppliyer() {
      axios.get("/api/v1/suppliyers/getdatasub").then((response) => {
        this.suppliyers = response.data;
      });
    },

    getEdit(ProductID) {
      if (ProductID != "") {
        this.$router.push({ name: "Product", query: { id: ProductID } });
      }
    },

    async searchProduct(page = 1) {
      if (page > 0 && page <= this.last_page) {
        axios
          .get("/api/v1/products/productsearch/", this.form)
          .then(({ data }) => {
            console.log(data.links);
            this.links = data.links;
            this.last_page = data.last_page;
            this.links.forEach((element) => {
              if (element.label == page) {
                this.perPage = "/api/v1/products/productsearch?page=" + page;
                axios
                  .get(this.perPage, { form: this.form })
                  .then(({ data }) => {
                    this.products = data;
                    this.currentPage = data.current_page;
                  });
              }
            });
          })
          .catch(({ response }) => {
            console.error(response);
          });
      }
    },
    getExcelData(event){
      this.exefile='';
     const titlered = document.getElementById("titlered");
     titlered.style.color = '326c7a';
      this.items = [];
      let xlsxfile = event.target.files ? event.target.files[0] : null;
      readXlsxFile(xlsxfile).then((rows) => {
        var x=0;
        rows.forEach(element => {
            if(x>=0){
                if(x==0){
                  this.checkexcel = element;
                 }else{
                    if(this.checkexcel[0]=='product_no' && this.checkexcel[1]=='description' 
                    && this.checkexcel[2]=='brand_code' && this.checkexcel[3]=='group_code' 
                    && this.checkexcel[4]=='cat_code' && this.checkexcel[5]=='suppliyer_code' 
                    && this.checkexcel[6]=='curency_code' && this.checkexcel[7]=='stock_unit_of_measure_code' 
                    && this.checkexcel[8]=='stock_unit_price'){
                      this.items.push({
                            product_no: element[0],
                            description: element[1],
                            brand_code: element[2],
                            group_code: element[3],
                            cat_code: element[4],
                            suppliyer_code: element[5],
                            curency_code: element[6],
                            stock_unit_of_measure_code: element[7],
                            stock_unit_price: element[8],
                        });
                        this.getLinkProduct(element);
                    }else{ 
                      this.exefile=' fail data ';
                      titlered.style.color = 'red';
                    }
                }
            } 
            x++;
        });
      })
      this.exefile='';
    },
    getLinkProduct(element){
        this.addtolinkProduct(element,element[7],1,element[8],'stock');
        var y=9,z=1;
        var xz1 ='quantity_unit'+z;
        var xz2 ='unit_code'+z;
        var xz3 ='unit_price'+z;
        if(element.length >=y){
             while ((y+3)<=element.length) {
                  if(this.checkexcel[y] == xz1 && this.checkexcel[y+1] == xz3 && this.checkexcel[y+2] == xz2){
                     this.addtolinkProduct(element,element[y+2],element[y],element[y+1],'unit'); 
                     y=y+3;z++;
                  }
             } 
          }
    },
    addtolinkProduct(element,measure_code,quantity,price,statuse){
      this.iteamLinks.push({
            product_no: element[0],
            description: element[1],
            variant_unit_of_measure_code: measure_code,
            stock_unit_of_measure_code: element[7],
            quantity_per_unit: quantity,
            unit_price: price,
            curency_code: element[6],
            status: statuse,
      });
      console.log(this.iteamLinks);
    },
    saveprulink(){
      if(this.items.length > 0){ setTimeout(() => this.savepro(), 3000);}
    },
  savepro(){
    this.items.forEach(element => {
      if(element.product_no !="" && element.description !=""){
        axios.post("api/v1/products/saveDataFformexcel/", element)
                  .then((response) => {
                    this.purchases_lines = response.data;
                    this.savedataValincode(element.product_no);
              });
         }
    });
   if(this.checkarray < this.items.length ){
              this.saveprulink();
              this.checkarray++;
              this.meassagechek('open');
        }else{
          this.meassagechek('close');
          this.checkarray = 0;
        }
     },
     savedataValincode(product_no){
      this.iteamLinks.forEach(element => {
      if(element.product_no == product_no && element.product_no !="" ){
        axios.post("api/v1/products/SaveDataLinkexcel/", element)
                  .then((response) => {
              });
         }
    });
     },
    save(){
      this.excel = 'Import';
      this.productline =0;
      this.total = 0;
      this.items = [];
      this.item = 0;
    },
     meassagechek(check){
      var modal = document.getElementById("myModalauto");
        if(check =='open'){
          modal.style.display = "block";
        }else{
          axios.post("api/v1/purchase/addrow/purchaseline/" + this.purchases)
                  .then((response) => {
                    this.purchases_lines = response.data;
                    modal.style.display = "none";
              });
        }
      },
      exportSheet() { 
          this.items = [];
          this.purchases_lines.forEach(element => {
          console.log(element);
          this.items.push({
                  id:element.id,
                  document_no: element.document_no,
                  document_type: element.document_type,
                  product_no: element.product_no,
                  description: element.description,
                  unit_of_measure_code: element.unit_of_measure_code,
                  inventory: element.inventory,
                  unit_price: element.unit_price,
                  total_amount: element.total_amount, 
                  curency_code: element.curency_code,
              })
        });
        this.excel = 'Export';
      },
      exportdataExcel(){
              const invoices = this.items.reduce((ac, element) => { 
                    ac.push({ 
                      document_no: element.document_no,
                      document_type: element.document_type,
                      product_no: element.product_no,
                      description: element.description,
                      unit_of_measure_code: element.unit_of_measure_code,
                      inventory: element.inventory,
                      unit_price: element.unit_price,
                      total_amount: element.total_amount, 
                      curency_code: element.curency_code,
                    }); 
                    return ac;
                }, []);
                var invoicesWS = XLSX.utils.json_to_sheet(invoices)
                var wb = XLSX.utils.book_new() 
                XLSX.utils.book_append_sheet(wb, invoicesWS, 'PruchecLink') 
                XLSX.writeFile(wb, 'PruchecLink.xlsx')
      }
     }
    }
</script>