<template>
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
                  Brand
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
        <div class="search-box">
          <a class="btn-radius bt-pn btn btn-sm" data-bs-toggle="dropdown" aria-expanded="false"
            style="float:right; color: #f8f5b4;">
            <i class="fas fa-plus" style="padding-right:5px;">
            </i>
            Menu
          </a>
             <ul class="dropdown-menu">
            <li>
              <a @click="getsuppliyerview()" class="dropdown-item btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#staticboomId" tabindex="10028"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
            </li>
            <li>
              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdropss" tabindex="10028"
                href="#"><i class="fas fa-file-excel"></i> To Excel</a>
            </li>
            <li>
              <a class="dropdown-item btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropss"
                tabindex="10028"><i class="fas fa-edit"></i> Release</a>
            </li>
          </ul>
         
          <h2 class="search-box-title">
            Search

            <input
              name="search"
              type="search"
              id="search"
              class="text"
              v-model="search"
            />
          </h2>

          <input id="search" name="search" type="hidden" value="1" />
             <div class="search-box-content">

            <div class="search-box-footer">
             
              <div
                class="modal fade"
                id="staticBackdrop"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog smallpopup">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">
                        Brand
                      </h5>
                      <!-- <span class="ui-dialog-title" id="ui-dialog-title-dialog-modal">Brand</span> -->
                      <span class="ui-icon ui-icon-closethick" data-bs-dismiss="modal" aria-label="Close"></span>
                    </div>
                    <div style="margin: 0; padding: 10px; display: inline">
                      <table
                        width="100%"
                        border="0"
                        cellpadding="0"
                        cellspacing="0"
                        class="tbl_search"
                      >
                        <tbody>
                          <tr>
                            <th width="30%">Brand Code</th>
                            <td width="70%">
                              <input
                                :disabled="isDisabled"
                                class="string_zen_kana clear_text text"
                                :key="index"
                                id="brand_code"
                                v-model="form.brand_code"
                                maxlength="8"
                                name="brand_code"
                                type="text"
                                tabindex="10000"
                              />
                            </td>
                          </tr>
                          <tr>
                            <th width="30%">Brand Name</th>
                            <td width="70%">
                              <input
                                class="string_zen_kana clear_text text"
                                id="brand_name"
                                maxlength="50"
                                name="brand_name"
                                v-model="form.brand_name"
                                type="text"
                                tabindex="10001"
                              />
                            </td>
                          </tr>

                          <tr>
                            <th width="30%">Brand Name 2</th>
                            <td width="70%">
                              <input
                                class="string_zen_kana clear_text text"
                                id="brand_name_2"
                                maxlength="50"
                                name="brand_name_2"
                                v-model="form.brand_name_2"
                                type="text"
                                tabindex="10001"
                              />
                            </td>
                          </tr>

                          <tr>
                            <th width="30%">Inactived</th>
                            <td width="70%">
                              <div class="selector" id="inactivced">
                                <span>{{ form.inactived }}</span>
                                <select
                                  id="inactivced"
                                  name="inactivced"
                                  v-model="form.inactived"
                                  tabindex="10003"
                                  style="min-width: 51px;
                                    opacity: 0;
                                    width: 80px;
                                  "
                                >
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
                      <div class="button type2" id="uniform-undefined">
                        <span>{{ this.bt1 }}</span>
                        <input
                          type="button"
                          value="save"
                          class="type2"
                          @click="save()"
                          data-bs-dismiss="modal"
                          update
                          style="opacity: 0; width: 63px"
                          tabindex="10026"
                        />
                      </div>

                      <div class="button type2" id="uniform-undefined">
                        <span>{{ this.bt2 }}</span>
                        <input
                          type="button"
                          value="clear"
                          class="type2"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                          @click="clear()"
                          style="opacity: 0; width: 63px"
                          tabindex="10026"
                        />
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

          <table
            width="100%"
            border="0"
            cellpadding="0"
            cellspacing="0"
            class="table table-striped br-table"
          >
            <thead>
              <tr class="header-table">
                <th width="3%">No</th>
                <th width="10%">Brand Code</th>
                <th width="14%">Brand Name</th>
                <th width="14%">Brand Name 2</th>
                <th width="11%">Inactived</th>
                <th width="11%">Create By</th>
                <th width="11%">Update By</th>
                <th width="13%">
                  <div
                    class="button"
                    id="uniform-undefined"
                    @click="checkActionForm('save', 'Save', 'Close')"
                  >
                    <span
                      >Add New<input
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop"
                        tabindex="10028"
                        style="opacity: 0; width: 76px"
                    /></span>
                  </div>
                </th>
              </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in items.data" :key="index">
                  <td width="3%">{{ index + 1 }}</td>
                  <td width="10%">{{ item.brand_code }}</td>
                  <td width="14%">{{ item.brand_name }}</td>
                  <td width="14%">{{ item.brand_name_2 }}</td>
                  <td width="11%">{{ item.inactived }}</td>
                  <td width="11%">{{ item.created_by }}</td>
                  <td width="11%">{{ item.updete_by }}</td>
                  <td width="13%">
                    <div
                      class="button"
                      @click="
                        checkActionForm('update', 'Update', 'Close', item)
                      "
                      id="uniform-undefined"
                    >
                      <span
                        ><i
                          class="fa fa-pencil-square-o"
                          aria-hidden="true"
                        ></i>
                        Edit<input
                          type="button"
                          data-bs-toggle="modal"
                          data-bs-target="#staticBackdrop"
                          tabindex="10028"
                          style="opacity: 0; width: 76px"
                      /></span>
                    </div>
                    <div
                      class="button"
                      @click="dalete(item.brand_code)"
                      id="uniform"
                    >
                      <span
                        ><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete<input
                          type="button"
                          style="opacity: 0; width: 76px"
                      /></span>
                    </div>
                  </td>
                </tr>
              </tbody>
          </table>

          <div class="box-footer-pagination">
            <pagination :data="items" @pagination-change-page="getBrands" />
           
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade ui-modal" id="staticboomId" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticboomId" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content ui-dialog">
                <div class="ui-widget-header">
                  <h5 class="modal-title in-header" id="staticBackdropLabel" ><i class="fa fa-print" aria-hidden="true"></i> Print : {{ form.product_no }} , {{ form.description }}</h5>
                  <a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button" data-bs-dismiss="modal"></a>
                </div>
                <div class="ui-dialog-content height-modal" id="invoiceholder"> <!----set size for A4-->
                  
                <div >
                  <div class="card">
                  <div class="card-body">
                    <div class=" mb-5 mt-3" >
                      <div class="row d-flex align-items-baseline">
                        <div class="col-xl-9">
                        </div>
                          <hr>
                      </div>

                      <div class="container" style="max-width:100%">
                        <div class="col-md-12">
                          <div class="text-center">
                            <h3 class="title-purchase">BRAND REPORT</h3>
                          </div>
                        </div>
                        <div class="row my-2 mx-1 justify-content-center table-padding-bot">
                          <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Brand Code</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Name 2</th>
                                <th scope="col">Inactived</th>
                                <th scope="col">Create By</th>
                                <th scope="col">Update By</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="(item, index) in items.data" :key="index">
                                <td width="3%">{{ index + 1 }}</td>
                                <td width="13%">{{ item.brand_code }}</td>
                                <td width="13%">{{ item.brand_name }}</td>
                                <td width="13%">{{ item.brand_name_2 }}</td>
                                <td width="6%">{{ item.inactived }}</td>
                                <td width="19%">{{ item.created_by }}</td>
                                <td width="9%">{{ item.updete_by }}</td>
                            </tr> 
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                </div>
                <div class="modal-footer">
                    <div class="button type2" id="uniform-undefined" data-bs-dismiss="modal"><span>No<input  type="button" class="type2" value="No" style="width: 89px; opacity: 0;" onclick="edit_cancel()" tabindex="10008"></span></div>
                    <div class="button type2" @click="print()" :value="G_code" data-bs-dismiss="modal"><span>Yes</span></div>
                </div>
              </div>
            </div>
    </div>
  
</template>

<script>
import { exportDefaultSpecifier } from "@babel/types";
import axios from "axios";
import pagination from "laravel-vue-pagination";
export default {
  components : {pagination},
  data() {
    return {
      issave: "",
      bt1: "",
      bt2: "",
      items: {},
      links: [],
      products: [],
      perPage: "",
      currentPage: 0,
      last_page: 1,
      form: {
        id: "",
        brand_code: "",
        brand_name: "",
        brand_name_2: "",
        inactived: "Yes",
        is_deleted: "",
      },
      forms: {
        id: "",
        brand_code: "",
        brand_name: "",
        brand_name_2: "",
        inactived: "Yes",
        is_deleted: "",
      },
      serchform: {
        id: "",
        brand_code: "",
        brand_name: "",
        brand_name_2: "",
        inactived: "",
        is_deleted: "",
      },
    };
  },

  mounted() {
    this.getBrands();
  },

  methods: {
    getBrands(page = 1) {
      if (page > 0 && page <= this.last_page) {
        axios
          .get("/api/v1/brands")
          .then(({ data }) => {
            this.links = data.links;
            this.last_page = data.last_page;
            this.links.forEach((element) => {
              if (element.label == page) {
                this.perPage = "api/v1/brands?page=" + page;
                axios.get(this.perPage).then(({ data }) => {
                  this.currentPage = data.current_page;
                  this.items = data;
                });
              }
            });
          })
          .catch(({ response }) => {
            console.error(response);
          });
      }
    },
    save() {
      if (this.issave == "save") {
        this.isDisabled = false;
        axios.post("api/v1/brands/create", this.form).then((res) => {
          this.getBrands(1);
        });
      } else {
        this.isDisabled = true;
        axios
          .post("api/v1/brands/update/" + this.issave, this.form)
          .then((res) => {
            this.getBrands(1);
          });
      }
    },
    edit(test) {
      this.form = test;
    },
    dalete(brand) {
      axios.get("api/v1/brands/delete/" + brand).then((res) => {
        this.form = res.data;
        this.getBrands(1);
      });
    },
    checkActionForm(checkform, bt1, bt2, brandId) {
      if (checkform == "save") {
        this.bt1 = bt1;
        this.bt2 = bt2;
        this.issave = "save";
      } else {
        this.bt1 = bt1;
        this.bt2 = bt2;
        this.edit(brandId);
        this.issave = brandId;
      }
    },
    serchdata() {
      axios.post("api/v1/brands/search").then((res) => {
        console.log(res.data);
      });
    },
  },
};
</script>
