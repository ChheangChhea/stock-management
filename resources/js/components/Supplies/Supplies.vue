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
                  Supplies
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
        <div class="search-box">
          <a class="btn-radius bt-pn btn btn-sm" data-bs-toggle="dropdown" aria-expanded="false"
            style="float:right; color: #f8f5b4;">
            <i class="fas fa-plus" style="padding-right:5px;">
            </i>
            Menu
          </a>
             <ul class="dropdown-menu">
            <li>
              <a @click="getproductboom()" class="dropdown-item btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#staticboomId" tabindex="10028"><i class="fa-solid fa-circle-b"></i> Boom Product</a>
            </li>
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
        
        

        
          <h2 class="search-box-title">Search</h2>
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
                        Suppliyer
                      </h5>
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
                              <!-- <input
                                id="image"
                                name="image"
                                type="file"
                                tabindex="10029"
                               
                              /> -->
                              <input type="file" id="myfile" name="myfile" @change="imgUplaod" />
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
                  <th width="5%">Image</th>
                  <th width="7%">Suppliyer Code</th>
                  <th width="7%">Suppliyer Name</th>
                  <th width="10%">Addresss</th>
                  <th width="8%">Phone Number</th>
                  <th width="8%">Fax Number</th>
                  <th width="12%">Email</th>
                  <th width="8%">Contact Name</th>
                  <th width="8%">Contact Phone</th>
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
              <tbody>
              <tr v-for="(suppliyer, index) in suppliyers.data" :key="index">
                <td width="5%">
                  <img
                    class="direct-chat-img"
                    :src="'img/suppliyer/' + suppliyer.image_url"
                  />
                </td>
                <td width="7%">{{ suppliyer.sup_code }}</td>
                <td width="7%">{{ suppliyer.sup_name }}</td>
                <td width="12%">{{ suppliyer.address }}</td>
                <td width="7%">{{ suppliyer.phone_no }}</td>
                <td width="6%">{{ suppliyer.fax_no }}</td>
                <td width="12%">{{ suppliyer.email }}</td>
                <td width="6%">{{ suppliyer.contact_name }}</td>
                <td width="6%">{{ suppliyer.contact_phone }}</td>
                <td width="11%">
                  <div class="button" id="uniform-undefined">
                    <span
                      >Delete<input
                        type="button"
                        @click="btnDelete(suppliyer.sup_code)"
                        tabindex="10028"
                        style="opacity: 0; width: 40px"
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
                        style="opacity: 0; width: 40px"
                    /></span>
                  </div>
                </td>
              </tr>
            </tbody>
            </table>
          </div>

          <!-- <table
            width="100%"
            border="0"
            cellpadding="0"
            cellspacing="0"
            class="table table-striped table-bordered"
          > 
            <tbody>
              <tr v-for="(suppliyer, index) in suppliyers.data" :key="index">
                <td width="5%">
                  <img
                    class="direct-chat-img"
                    :src="'img/suppliyer/' + suppliyer.image_url"
                  />
                </td>
                <td width="7%">{{ suppliyer.sup_code }}</td>
                <td width="7%">{{ suppliyer.sup_name }}</td>
                <td width="10%">{{ suppliyer.address }}</td>
                <td width="8%">{{ suppliyer.phone_no }}</td>
                <td width="8%">{{ suppliyer.fax_no }}</td>
                <td width="12%">{{ suppliyer.email }}</td>
                <td width="8%">{{ suppliyer.contact_name }}</td>
                <td width="8%">{{ suppliyer.contact_phone }}</td>
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
           </table> -->
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
  
  <div class="modal fade ui-modal" id="staticboomId" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticboomId" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content ui-dialog">
                <div class="ui-widget-header">
                  <h5 class="modal-title in-header" id="staticBackdropLabel" ><i class="fa fa-print" aria-hidden="true"></i> Print : {{ form.product_no }} , {{ form.description }}</h5>
                  <!-- <a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button" data-bs-dismiss="modal"></a> -->
                  <a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button" data-bs-dismiss="modal"><span
                      class="ui-icon ui-icon-closethick">close</span></a>
                </div>
                <div class="ui-dialog-content height-modal" id="invoiceholder"> <!----set size for A4-->
                  
                <div id="purchaseorder">
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
                            <h3 class="title-purchase">SUPPLIER DETIALS</h3>
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
                              <!-- <tr v-for="(item, index) in items" :key="index"> -->
                                <tr>
                                <td width="5%">test</td>
                                <td width="10%">test</td>
                                <td width="10%">test</td>
                                <td width="10%">test</td>
                                <td width="10%">test</td>
                                <td width="10%">test</td>
                                <td width="10%">test</td>
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
    