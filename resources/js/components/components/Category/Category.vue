
<template>
  <div class="wrapper">
    <div class="container">
      <div id="header">
        <div id="headTitle">
          <div id="logo">
            <img alt="Healthbook" height="44" src="img/logo.png" width="70" />
          </div>
          <h1 id="title">メニュー</h1>
        </div>
        <ol id="topicPath">
          <li id="tpHome">
            <a href="/" title="メニューへ移動する"
              ><img alt="" height="28" src="img/topicPath_home.png" width="28"
            /></a>
          </li>
          <ol id="topicPath">
            <li id="tpHome">
              <a href="#" title="go to menu"
                ><img
                  alt=""
                  height="28"
                  src="img/topicPath_home.png"
                  width="28"
              /></a>
            </li>
            <li>
              <a href="dashbaord"
                ><font style="vertical-align: inherit"
                  ><font style="vertical-align: inherit"
                    >Master Admin</font
                  ></font
                ></a
              >
            </li>
            <li>
              <span
                ><font style="vertical-align: inherit"
                  ><font style="vertical-align: inherit"> Category </font></font
                ></span
              >
            </li>
          </ol>
        </ol>
        <div id="headInfo">
          <div id="date-info">
            <span class="icon"></span>
            <p id="todays" title="PM 4:45">2022/08/19</p>
          </div>
          <div id="user-info">
            <span class="icon"></span>
            <p id="userName">
              システム
              <a href="/login/logout" id="btnlogout" title="ログアウト"
                >ログアウト</a
              >
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="search-box">
      <div id="product">
        <!--#contents -->
        <div class="search-box mb-4">
          <router-link to="/login"
            ><h2 class="search-box-title">Search</h2></router-link
          >
          <input id="search" name="search" type="hidden" value="1" />
          <div class="search-box-content">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              class="tbl_search"
            >
              <tbody>
                <tr>
                  <th width="20%">Category Code</th>
                  <td width="80%">
                    <input
                      class="string_zen_kana clear_text text"
                      v-model="form.cat_code"
                      maxlength="8"
                      size="50"
                      type="text"
                      tabindex="10000"
                    />
                  </td>
                </tr>
                <tr>
                  <th width="20%">Category Name</th>
                  <td width="80%">
                    <input
                      class="string_zen_kana clear_text text"
                      name="category_name"
                      maxlength="50"
                      v-model="form.cat_name"
                      size="50"
                      type="text"
                      tabindex="10001"
                    />
                  </td>
                </tr>

                <tr>
                  <th width="20%">Category Name 2</th>
                  <td width="80%">
                    <input
                      class="string_zen_kana clear_text text"
                      maxlength="50"
                      name="category_name_2"
                      v-model="form.cat_name_2"
                      size="50"
                      type="text"
                      tabindex="10001"
                    />
                  </td>
                </tr>

                <tr>
                  <th width="20%">Inactived</th>
                  <td width="80%">
                    <div class="selector" id="inactivced">
                      <span>Yes</span>
                      <select
                        id="inactivced"
                        name="inactivced"
                        v-model="form.inactived"
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
            </table>

            <div class="search-box-footer">
              <div class="button type2" id="uniform-undefined">
                <span>Save</span>
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
              class="tbl_list tbl_stripe"
            >
              <thead>
                <tr>
                  <th width="12%">id</th>
                  <th width="12%">Category_code</th>
                  <th width="12%">Category Name</th>
                  <th width="12%">Category Name 2</th>
                  <th width="12%">Inactivced</th>
                  <th width="12%">Create By</th>
                  <th width="12%">Update By</th>
                  <!-- <th width="9%">Last Update</th> -->
                  <th width="12%">
                    <div class="button" id="uniform-undefined">
                      <span
                        >Add New<input
                          @click="btnAdd()"
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
                class="table table-striped table-bordered"
              >
                <tbody>
                  <tr
                    v-for="(Category, index) in Categories.data"
                    :key="Category.index"
                  >
                    <td width="12%">{{ index + 1 + "." }}</td>
                    <td width="12%">{{ Category.cat_code }}</td>
                    <td width="12%">{{ Category.cat_name }}</td>
                    <td width="12%">{{ Category.cat_name_2 }}</td>
                    <td width="12%">{{ Category.inactived }}</td>
                    <td width="12%">{{ Category.created_by }}</td>
                    <td width="12%">{{ Category.updete_by }}</td>
                    <td width="12%">
                      <div class="button" id="uniform-undefined">
                        <span
                          >Edit<input
                            type="button"
                            @click="btnEdit(Category)"
                            data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop"
                            tabindex="10028"
                            style="opacity: 0; width: 76px"
                        /></span>
                      </div>
                      <div class="button" id="uniform-undefined">
                        <span
                          >Delete<input
                            type="button"
                            @click="btnDelete(Category.cat_code)"
                            tabindex="10028"
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
                <span v-for="(link, index) in links" :key="index">
                  <div
                    v-if="index == 0"
                    @click="getCategorys(this.currentPage - 1)"
                  >
                    <i
                      class="fa fa-arrow-left"
                      aria-hidden="true"
                      style="padding-top: 11"
                    ></i>
                  </div>
                  <div
                    v-else-if="index - 1 == this.last_page"
                    @click="getCategorys(this.currentPage + 1)"
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
                    @click="getCategorys(index)"
                  >
                    {{ index }}
                  </div>
                  <div v-else class="page" @click="getCategorys(index)">
                    {{ index }}
                  </div>
                </span>
              </div>
            </div>
          </div>

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
                  <h5 class="modal-title" id="staticBackdropLabel">Category</h5>
                  <!-- <span class="ui-dialog-title" id="ui-dialog-title-dialog-modal">Brand</span> -->
                  <span
                    class="ui-icon ui-icon-closethick"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></span>
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
                        <th width="30%">Category Code</th>
                        <td>
                          <input
                            id="cat_code"
                            :disabled="isDisabled"
                            name="cat_code"
                            v-model="form.cat_code"
                            type="text"
                            class="text"
                            tabindex="10028"
                          />
                        </td>
                      </tr>
                      <tr>
                        <th>Category Name</th>
                        <td>
                          <input
                            id="cat_name"
                            name="cat_name"
                            v-model="form.cat_name"
                            type="text"
                            class="text"
                            tabindex="10029"
                          />
                        </td>
                      </tr>
                      <tr>
                        <th>Category Name 2</th>
                        <td>
                          <input
                            id="cat_name_2"
                            name="cat_name_2"
                            v-model="form.cat_name_2"
                            type="text"
                            class="text"
                            tabindex="10029"
                          />
                        </td>
                      </tr>
                      <tr>
                        <th>Inactive</th>
                        <td>
                          <select
                            class="form-select"
                            aria-label="Default select example"
                            v-model="form.inactived"
                          >
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save</button> -->
                  <div class="button type2" id="uniform-undefined">
                    <span> Save</span>
                    <input
                      type="button"
                      value="save"
                      class="type2"
                      @click="btnSave()"
                      style="opacity: 0; width: 63px"
                      tabindex="10026"
                    />
                  </div>
                  <div class="button type2" id="uniform-undefined">
                    <span> Update</span>
                    <input
                      type="button"
                      value="edit"
                      @click="btnUpdate(form.cat_code)"
                      class="type2"
                      style="opacity: 0; width: 63px"
                      tabindex="10026"
                      data-bs-dismiss="modal"
                    />
                  </div>
                  <div class="button type2" id="uniform-undefined">
                    <span>Close</span>
                    <input
                      type="button"
                      value="clear"
                      class="type2"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                      @click="btnClear()"
                      style="opacity: 0; width: 63px"
                      tabindex="10026"
                    />
                  </div>
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

export default {
  data() {
    return {
      Categories: {},
      links: [],
      perPage: "",
      currentPage: 0,
      last_page: 1,
      action_api: "",
      action_api_1: "",
      isDisabled: false,
      form: {
        id: "",
        cat_code: "",
        cat_name: "",
        cat_name_2: "",
        inactived: "",
        created_by: "",
        updete_by: "",
      },
      forms_clear: {
        id: "",
        cat_code: "",
        cat_name: "",
        cat_name_2: "",
        inactived: "",
        created_by: "",
        updete_by: "",
      },
    };
  },

  mounted() {
    this.getCategorys();
  },

  methods: {
    getCategorys(page = 1) {
      if (page > 0 && page <= this.last_page) {
        axios
          .get("api/v1/category")
          .then(({ data }) => {
            this.links = data.links;
            this.last_page = data.last_page;
            this.links.forEach((element) => {
              if (element.label == page) {
                this.perPage = "api/v1/category?page=" + page;
                axios.get(this.perPage).then(({ data }) => {
                  this.currentPage = data.current_page;
                  this.Categories = data;
                });
              }
            });
          })
          .catch(({ response }) => {
            console.error(response);
          });
      }
    },
    btnClear() {
      this.form = {};
    },
    btnClose() {
      this.form = {};
    },
    btnAdd() {
      this.action_api = "api/v1/categorys/store";
      this.isDisabled = false;
    },
    btnSave() {
      console.log(this.form);
      axios.post(this.action_api, this.form).then((res) => {
        this.getCategorys();
        this.form = Object.assign({}, this.forms);
      });
    },
    btnEdit(Category) {
      this.form = Category;
      this.isDisabled = true;
    },
    btnUpdate() {
      axios
        .post("api/v1/categorys/update/" + this.form.cat_code, this.form)
        .then(() => {
          this.getCategorys();
          this.form = {};
        });
    },
    btnDelete(id) {
      axios.post("api/v1/category/delete/" + id).then((res) => {
        this.getCategorys();
      });
    },
  },
};
</script>
