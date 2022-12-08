<template>
  <div class="wrapper">
    <div class="container">
      <div id="header">
        <div id="headTitle">
          <div id="logo">
            <img alt="Healthbook" height="44" src="img/logo.png" width="70" />
          </div>
          <h1 id="title">Healthbook</h1>
        </div>
        <ol id="topicPath">
          <li id="tpHome">
            <a href="/" title="Healthbook"
              ><img alt="" height="28" src="img/topicPath_home.png" width="28"
            /></a>
          </li>
        </ol>
        <div id="headInfo">
          <div id="date-info">
            <span class="icon"></span>
            <p id="todays" title="PM 4:45">2022/08/19</p>
          </div>
          <div id="user-info">
            <span class="icon"></span>
            <p id="userName">
              Admin
              <a href="/login/logout" id="btnlogout" title="logout"></a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="search-box">
      <div id="product">
        <div class="search-box">
          <h2 class="search-box-title">Search</h2>
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
                  <th width="10%">Suppliyer</th>
                  <td width="90%">
                    <input
                      class="string_zen_kana clear_text text"
                      type="text"
                      v-model="form.supplier"
                      maxlength="8"
                      name="brand_code"
                      size="50"
                      tabindex="10000"
                    />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Suppliyer Code</th>
                  <td width="90%">
                    <input
                      class="string_zen_kana clear_text text"
                      type="text"
                      maxlength="50"
                      name="brand_name"
                      v-model="form.supplier_code"
                      size="50"
                      tabindex="10001"
                    />
                  </td>
                </tr>

                <tr>
                  <th width="10%">Suppliyer Name</th>
                  <td width="90%">
                    <input
                      class="string_zen_kana clear_text text"
                      type="text"
                      maxlength="50"
                      name="brand_name_2"
                      v-model="form.supplier_name"
                      size="50"
                      tabindex="10001"
                    />
                  </td>
                </tr>

                <tr>
                  <th width="10%">Addresss</th>
                  <td width="90%">
                    <input
                      class="string_zen clear_text text"
                      type="text"
                      maxlength="50"
                      name="address"
                      v-model="form.address"
                      size="50"
                      tabindex="10014"
                    />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Phone Number</th>
                  <td width="90%">
                    <input
                      class="string_zen clear_text text"
                      type="number"
                      maxlength="50"
                      name="phone_num"
                      v-model="form.phone_num"
                      size="50"
                      tabindex="10014"
                    />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Fax Number</th>
                  <td width="90%">
                    <input
                      class="string_zen clear_text text"
                      type="text"
                      maxlength="50"
                      name="fax_num"
                      v-model="form.email"
                      size="50"
                      tabindex="10014"
                    />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Email</th>
                  <td width="90%">
                    <input
                      class="string_zen clear_text text"
                      type="email"
                      maxlength="50"
                      name="email"
                      v-model="form.email"
                      size="50"
                      tabindex="10014"
                    />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Contact Name</th>
                  <td width="90%">
                    <input
                      class="string_zen_kana clear_text text"
                      type="text"
                      maxlength="50"
                      name="contact_name"
                      v-model="form.contact_name"
                      size="50"
                      tabindex="10001"
                    />
                  </td>
                </tr>

                <tr>
                  <th width="10%">Contact Phone</th>
                  <td width="90%">
                    <input
                      class="string_zen_kana clear_text text"
                      type="text"
                      maxlength="50"
                      name="contact_phone"
                      v-model="form.contact_phone"
                      size="50"
                      tabindex="10001"
                    />
                  </td>
                </tr>
                <tr>
                  <th width="10%">In Active</th>
                  <td width="90%">
                    <input
                      class="string_zen_kana clear_text text"
                      type="text"
                      maxlength="50"
                      name="inactived"
                      v-model="form.inactived"
                      size="50"
                      tabindex="10001"
                    />
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
              </div> -->

              <!-- <div class="button type2" id="uniform-undefined">
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
                        Suppliyer
                      </h5>
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
                            <th>Suppliyer Code</th>
                            <td>
                              <input
                                :disabled="isdisabled"
                                name="supplier_code"
                                type="text"
                                class="text"
                                v-model="form.sup_code"
                                tabindex="10029"
                              />
                            </td>
                          </tr>
                          <tr>
                            <th>Suppliyer Name</th>
                            <td>
                              <input
                                name="supplier_name"
                                type="text"
                                class="text"
                                v-model="form.sup_name"
                                tabindex="10029"
                              />
                            </td>
                          </tr>
                          <tr>
                            <th>Suppliyer Name 2</th>
                            <td>
                              <input
                                name="supplier_name_2"
                                type="text"
                                class="text"
                                v-model="form.sup_name_2"
                                tabindex="10029"
                              />
                            </td>
                          </tr>
                          <tr>
                            <th>Image</th>
                            <td>
                              <input
                                id="image"
                                ref="choose"
                                name="image"
                                type="file"
                                tabindex="10029"
                                @change="imgUplaod"
                              />
                              <!-- <img
                                  :src="photo_path + form.image_url"
                                  style="width: 300px; height: 250px"
                                  @click="choosePhoto"
                                  alt=""
                                /> -->
                            </td>
                          </tr>
                          <tr>
                            <th>Addresss</th>
                            <td>
                              <input
                                name="address"
                                type="text"
                                class="text"
                                v-model="form.address"
                                tabindex="10029"
                              />
                            </td>
                          </tr>
                          <tr>
                            <th>Phone Number</th>
                            <td>
                              <input
                                name="phone_num"
                                type="number"
                                class="text"
                                v-model="form.phone_no"
                                tabindex="10029"
                              />
                            </td>
                          </tr>
                          <tr>
                            <th>Phone Number 2</th>
                            <td>
                              <input
                                name="phone_num2"
                                type="number"
                                class="text"
                                v-model="form.phone_no_2"
                                tabindex="10029"
                              />
                            </td>
                          </tr>
                          <tr>
                            <th>Fax Number</th>
                            <td>
                              <input
                                name="fax_num"
                                type="text"
                                class="text"
                                v-model="form.fax_no"
                                tabindex="10029"
                              />
                            </td>
                          </tr>

                          <tr>
                            <th>Email</th>
                            <td>
                              <input
                                name="email"
                                type="email"
                                class="text"
                                v-model="form.email"
                                tabindex="10029"
                              />
                            </td>
                          </tr>
                          <tr>
                            <th>Contact Name</th>
                            <td>
                              <input
                                name="contact_name"
                                type="text"
                                class="text"
                                v-model="form.contact_name"
                                tabindex="10029"
                              />
                            </td>
                          </tr>
                          <tr>
                            <th>Contact Phone</th>
                            <td>
                              <input
                                name="contact_phone"
                                type="number"
                                class="text"
                                v-model="form.contact_phone"
                                tabindex="10029"
                              />
                            </td>
                          </tr>
                          <tr>
                            <th>status</th>
                            <td>
                              <input
                                name="status"
                                type="text"
                                class="text"
                                v-model="form.status"
                                tabindex="10029"
                              />
                            </td>
                          </tr>
                          <tr>
                            <th>In Active</th>
                            <td>
                              <input
                                name="is_actived"
                                type="text"
                                class="text"
                                v-model="form.inactived"
                                tabindex="10029"
                              />
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="modal-footer">
                      <div class="button type2" id="uniform-undefined">
                        <span> Save</span>
                        <input
                          type="button"
                          value="save"
                          class="type2"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                          v-if="addBtn"
                          @click="btnSave()"
                          style="opacity: 0; width: 63px"
                          tabindex="10026"
                        />
                      </div>
                      <div class="button type2" id="uniform-undefined">
                        <span> Update</span>
                        <input
                          type="button"
                          value="save"
                          class="type2"
                          v-if="updateBtn"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                          @click="btnUpdate(form.sup_code)"
                          style="opacity: 0; width: 63px"
                          tabindex="10026"
                        />
                      </div>
                      <div class="button type2" id="uniform-undefined">
                        <span>Close</span>
                        <input
                          type="button"
                          @click="btnClose()"
                          value="clear"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                          class="type2"
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
          <div class="box-content">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              class="tbl_list tbl_stripe"
            >
              <thead>
                <tr>
                  <th width="8%">Suppliyer Code</th>
                  <th width="8%">Suppliyer Name</th>
                  <th width="8%">Image</th>
                  <th width="8%">Addresss</th>
                  <th width="8%">Phone Number</th>
                  <th width="8%">Fax Number</th>
                  <th width="10%">Email</th>
                  <th width="8%">Contact Name</th>
                  <th width="8%">Contact Phone</th>
                  <th width="8%">status</th>
                  <th width="8%">In Active</th>
                  <th width="8%">
                    <div class="button" id="uniform-undefined">
                      <span
                        >Add New<input
                          type="button"
                          @click="btnAdd()"
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
          </div>

          <table
            width="100%"
            border="0"
            cellpadding="0"
            cellspacing="0"
            class="table table-striped table-bordered"
          >
            <tbody>
              <tr v-for="(suppliyer, index) in suppliyers.data" :key="index">
                <td width="8%">{{ suppliyer.sup_code }}</td>
                <td width="8%">{{ suppliyer.sup_name }}</td>
                <td width="8%">
                  <img
                    class="direct-chat-img"
                    :src="'img/suppliyer/' + suppliyer.image_url"
                  />
                </td>
                <td width="8%">{{ suppliyer.address }}</td>
                <td width="8%">{{ suppliyer.phone_no }}</td>
                <td width="8%">{{ suppliyer.fax_no }}</td>
                <td width="10%">{{ suppliyer.email }}</td>
                <td width="8%">{{ suppliyer.contact_name }}</td>
                <td width="8%">{{ suppliyer.contact_phone }}</td>
                <td width="8%">{{ suppliyer.status }}</td>
                <td width="8%">{{ suppliyer.inactived }}</td>
                <td width="8%">
                  <div class="button" id="uniform-undefined">
                    <span
                      >Delete<input
                        type="button"
                        @click="btnDelete(suppliyer.sup_code)"
                        tabindex="10028"
                        style="opacity: 0; width: 76px"
                    /></span>
                  </div>
                  <div class="button" id="uniform-undefined">
                    <span
                      >Edit<input
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop"
                        @click="btnEdit(suppliyer)"
                        tabindex="10028"
                        style="opacity: 0; width: 76px"
                    /></span>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="box-footer-pagination">
            <div class="pagination">
              <span v-for="(link, index) in links" :key="index">
                <div
                  v-if="index == 0"
                  @click="getSuppliyer(this.currentPage - 1)"
                >
                  <i
                    class="fa fa-arrow-left"
                    aria-hidden="true"
                    style="padding-top: 11"
                  ></i>
                </div>
                <div
                  v-else-if="index - 1 == this.last_page"
                  @click="getSuppliyer(this.currentPage + 1)"
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
                  @click="getSuppliyer(index)"
                >
                  {{ index }}
                </div>
                <div v-else class="page" @click="getSuppliyer(index)">
                  {{ index }}
                </div>
              </span>
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
      suppliyers: [],
      links: [],
      perPage: "",
      currentPage: 0,
      last_page: 1,
      photo_path: "",
      routeSup: "",
      isdisabled: false,
      addBtn: true,
      updateBtn: true,
      form: {
        id: "",
        sup_code: "",
        sup_name: "",
        sup_name_2: "",
        image_url: "",
        address: "",
        phone_no: "",
        phone_no_2: "",
        fax_no: "",
        email: "",
        contact_name: "",
        contact_phone: "",
        status: "",
        inactived: "",
      },
      forms: {
        id: "",
        sup_code: "",
        sup_name: "",
        sup_name_2: "",
        image_url: "",
        address: "",
        phone_no: "",
        phone_no_2: "",
        fax_no: "",
        email: "",
        contact_name: "",
        contact_phone: "",
        status: "",
        inactived: "",
      },
    };
  },

  mounted() {
    this.getSuppliyer();
  },

  methods: {
    getSuppliyer(page = 1) {
      //   axios.get("api/v1/suppliyers").then((res) => {
      //     this.suppliyers = res;
      //   });
      if (page > 0 && page <= this.last_page) {
        axios
          .get("api/v1/suppliyers")
          .then(({ data }) => {
            this.links = data.links;
            this.last_page = data.last_page;
            this.links.forEach((element) => {
              if (element.label == page) {
                this.perPage = "api/v1/suppliyers?page=" + page;
                axios.get(this.perPage).then(({ data }) => {
                  this.currentPage = data.current_page;
                  this.suppliyers = data;
                });
              }
            });
          })
          .catch(({ response }) => {
            console.error(response);
          });
      }
    },
    imgUplaod(event) {
      const image = event.target.files[0];
      const reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = (event) => {
        (this.photo_path = ""), (this.form.image_url = event.target.result);
      };
    },
    choosePhoto() {
      this.$refs.choose.click();
    },
    btnAdd() {
      this.form = {};
      this.routeSup = "api/v1/suppliyers/store/";
      this.isdisabled = false;
      this.add = 1;
    },
    btnClose() {
      this.form = {};
    },
    btnSave() {
      axios.post(this.routeSup, this.form).then((res) => {
        this.getSuppliyer();
        this.form = {};
      });
    },
    btnEdit(suppliyer) {
      this.isdisabled = true;
      this.photo_path = "img/suppliyer/";
      this.routeSup = "api/v1/suppliyers/update/";
      this.form = JSON.parse(JSON.stringify(suppliyer));
      this.add = 2;
    },
    btnUpdate(y) {
      axios.post(this.routeSup + y, this.form).then((res) => {
        this.getSuppliyer();
        this.form = Object.assign({}, this.form);
      });
    },
    btnDelete(x) {
      console.log(x);
      axios.post("api/v1/suppliyers/delete/" + x).then((res) => {
        this.getSuppliyer();
      });
    },
  },
};
</script>
    