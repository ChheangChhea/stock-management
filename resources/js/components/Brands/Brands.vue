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
            <a href="#" title="go to menu"><img alt="" height="28" src="img/topicPath_home.png" width="28" /></a>
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
          <router-link to=""
            ><h2 class="search-box-title">Search</h2></router-link
          >
          <input id="search" name="search" type="hidden" value="1" />
          <div class="search-box-content">
            <!-- <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              class="tbl_search"
            >
              <tbody>
                <tr>
                  <th width="10%">Brand Code</th>
                  <td width="90%">
                    <input
                      class="string_zen_kana clear_text text"
                      @change="serchdata()"
                      v-model="serchform.brand_code"
                      :key="index"
                      id="brand_code"
                      maxlength="8"
                      name="brand_code"
                      size="50"
                      type="text"
                      tabindex="10000"
                    />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Brand Name</th>
                  <td width="90%">
                    <input
                      class="string_zen_kana clear_text text"
                      @change="serchdata()"
                      v-model="serchform.brand_name"
                      id="brand_name"
                      maxlength="50"
                      name="brand_name"
                      size="50"
                      type="text"
                      tabindex="10001"
                    />
                  </td>
                </tr>

                <tr>
                  <th width="10%">Brand Name 2</th>
                  <td width="90%">
                    <input
                      class="string_zen_kana clear_text text"
                      @change="serchdata()"
                      v-model="serchform.brand_name_2"
                      id="brand_name_2"
                      maxlength="50"
                      name="brand_name_2"
                      size="50"
                      type="text"
                      tabindex="10001"
                    />
                  </td>
                </tr>

                <tr>
                  <th width="10%">Inactived</th>
                  <td width="90%">
                    <div class="selector" id="inactivced">
                      <span>{{ serchform.inactived }}</span>
                      <select
                        id="inactivced"
                        name="inactivced"
                        @change="serchdata()"
                        v-model="serchform.inactived"
                        tabindex="10003"
                        style="min-width: 51px; opacity: 0; width: 80px"
                      >
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table> -->

            <div class="search-box-footer">
              <!-- <div class="button type2" id="uniform-undefined">
                <span> Search</span>
                <input
                  type="button"
                  value="save"
                  class="type2"
                  @click="save()"
                  style="opacity: 0; width: 63px"
                  tabindex="10026"
                />
              </div>

              <div class="button type2" id="uniform-undefined">
                <span>Clear</span>
                <input
                  type="button"
                  value="clear"
                  class="type2"
                  @click="clear()"
                  style="opacity: 0; width: 63px"
                  tabindex="10026"
                />
              </div> -->
              <!-- Modal -->
              <div
                class="modal fade"
                id="staticBackdrop"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">
                        Brand
                      </h5>
                      <!-- <span class="ui-dialog-title" id="ui-dialog-title-dialog-modal">Brand</span> -->
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
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
                                  style="
                                    min-width: 51px;
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
          <div class="box-footer-pagination">
            <div class="pagination">
              <div class="pagination"></div>
            </div>
          </div>

          <table
            width="100%"
            border="0"
            cellpadding="0"
            cellspacing="0"
            class="tbl_list tbl_stripe"
          >
            <thead>
              <tr>
                <th width="3%">No</th>
                <th width="13%">Brand Code</th>
                <th width="13%">Brand Name</th>
                <th width="13%">Brand Name 2</th>
                <th width="6%">Inactived</th>
                <th width="19%">Create By</th>
                <th width="9%">Update By</th>
                <th width="7%">
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
          </table>

          <div class="box-content">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              class="tbl_list tbl_stripe"
            >
              <tbody>
                <tr v-for="(item, index) in items" :key="index">
                  <td width="3%">{{ index + 1 }}</td>
                  <td width="13%">{{ item.brand_code }}</td>
                  <td width="13%">{{ item.brand_name }}</td>
                  <td width="13%">{{ item.brand_name_2 }}</td>
                  <td width="6%">{{ item.inactived }}</td>
                  <td width="19%">{{ item.created_by }}</td>
                  <td width="9%">{{ item.updete_by }}</td>
                  <td width="7%">
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
          </div>

          <div class="box-footer-pagination">
            <div class="pagination">
              <div class="pagination">
                <span v-for="(link, index) in links" :key="index">
                  <div v-if="index == 0" @click="">
                    <i
                      class="fa fa-arrow-left"
                      aria-hidden="true"
                      style="padding-top: 11"
                    ></i>
                  </div>
                  <div
                    v-else-if="index - 1 == this.last_page"
                    @click="getBrands(this.currentPage + 1)"
                  >
                    <i
                      class="fa fa-arrow-right"
                      aria-hidden="true"
                      style="padding-top: 11"
                    ></i>
                  </div>
                  <div
                    v-else-if="this.currentPage == index"
                    class="page current"
                    @click="getBrands(index)"
                  >
                    {{ index }}
                  </div>
                  <div v-else class="page" @click="getBrands(index)">
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
</template>

<script>
import { exportDefaultSpecifier } from "@babel/types";
import axios from "axios";
export default {
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
                  this.items = data.data;
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
