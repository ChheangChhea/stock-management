<template>
    <div class="wrapper">
        <div class="container-fuild">
      <div id="header">
        <div id="headTitle">
          <div id="logo"><img alt="Healthbook" height="44" src="img/logo.png" width="70"></div>
          <h1 id="title">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Patient master</font>
            </font>
          </h1>
        </div>
        <ol id="topicPath">
          <li id="tpHome"><a href="/" title="go to menu"><img alt="" height="28" src="img/topicPath_home.png"
                width="28"></a></li>
          <li>
            <a href="dashbaord">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Master Admin</font>
              </font>
            </a>
          </li>
          <li>
            <span>
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                  SerailCode
                </font>
              </font>
            </span>
          </li>
        </ol>
        <div id="headInfo">
          <div id="date-info">
            <span class="icon"></span>
            <p id="todays" original-title="PM12:13">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">2022/08/25</font>
              </font>
            </p>
          </div>
          <div id="user-info">
            <span class="icon"></span>
            <p id="userName">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">system
                </font>
              </font><a href="/login/logout" id="btnlogout" original-title="logout">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">logout</font>
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
                    <h2 class="search-box-title">Search
            <input name="search" type="search" id="search" class="text" v-model="search"/></h2>

          <input id="search" name="search" type="hidden" value="1" />
                    <input id="search" name="search" type="hidden" value="1" />
                    <div class="search-box-content">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_search">
                            <tbody>
                                <tr>
                                    <th width="20%">SerailCode</th>
                                    <td width="80%">
                                        <input class="string_zen_kana clear_text text" v-model="form.serail_code"
                                            maxlength="8" size="50" type="text" tabindex="10000"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="20%">PrefixCode</th>
                                    <td width="80%">
                                        <input class="string_zen_kana clear_text text" name="PrefixCode" maxlength="50"
                                            v-model="form.prefix_code" size="50" type="text" tabindex="10001"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="20%">QtyCode</th>
                                    <td width="80%">
                                        <input class="string_zen_kana clear_text text" maxlength="50" name="QtyCode"
                                            v-model="form.qty_code" size="50" type="text" tabindex="10001"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="20%">StartCode</th>
                                    <td width="80%">
                                        <input class="string_zen_kana clear_text text" maxlength="50" name="StartCode"
                                            v-model="form.start_code" size="50" type="text" tabindex="10001"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="20%">EndCode</th>
                                    <td width="80%">
                                        <input class="string_zen_kana clear_text text" maxlength="50" name="StartCode" v-model="form.end_code"
                                            size="50" type="text" tabindex="10001"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="search-box-footer">
                            <div class="button type2" id="uniform-undefined">
                                <span>Save</span>
                                <input type="button" value="save" class="type2" @click="save()"
                                    style="opacity: 0; width: 63px" tabindex="10026" />
                            </div>
                            <div class="button type2" id="uniform-undefined">
                                <span>Clear</span>
                                <input type="button" value="clear" class="type2" @click="clear()" style="opacity: 0; width: 63px"  tabindex="10026" />
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_list tbl_stripe">
                            <thead>
                                <tr>
                                    <th width="12%">id</th>
                                    <th width="12%">SerailCode</th>
                                    <th width="12%">PrefixCode</th>
                                    <th width="12%">QtyCode</th>
                                    <th width="12%">StartCode</th>
                                    <th width="12%">EndCode</th>
                                    <th width="12%">
                                        <div class="button" id="uniform-undefined">
                                            <span><i class="fa fa-plus" aria-hidden="true"></i>
                                                Add New<input  @click="btnAdd()" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                    tabindex="10028" style=" opacity: 0;width: 76px;"/>
                                            </span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <div class="box-content">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-striped table-bordered"
                                style="margin-bottom: 0 !important">
                                <tbody>
                                    <tr
                                        v-for="(Serail, index) in serails.data" :key="index" >
                                        <td width="12%"> {{ index + 1 + "." }}</td>
                                        <td width="12%">{{ Serail.serail_code }}</td>
                                        <td width="12%">{{ Serail.prefix_code }}</td>
                                        <td width="12%">{{ Serail.qty_code }}</td>
                                        <td width="12%">{{ Serail.start_code }}</td>
                                        <td width="12%">{{ Serail.end_code }}</td>
                                        <td width="12%">
                                            <div class="button" id="uniform-undefined">
                                                <span>
                                                    <i class="fa fa-edit"></i>
                                                    Edit SerailCode
                                                    <input type="button" @click="btnEdit(Serail)" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                        tabindex="10028" style="opacity: 0;width: 76px;"/>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer-pagination">
                            <pagination :data="serails" @pagination-change-page="getSerail" />
                        </div>
                    </div>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog smallpopup">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">SerailCode</h5>
                                    <span class="ui-icon ui-icon-closethick" data-bs-dismiss="modal" aria-label="Close">
                                    </span>
                                </div>
                                <div style="margin: 0;padding: 10px;display: inline;">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_search">
                                        <tbody>
                                            <tr>
                                                <th width="30%">SerailCode</th>
                                                <td>
                                                    <input id="serailcode" name="serailcode" v-model="form.serail_code"
                                                        type="text" class="text" tabindex="10028"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>PrefixCode</th>
                                                <td>
                                                    <input id="prefixcode" name="prefixcode" v-model="form.prefix_code"
                                                        type="text" class="text" tabindex="10029"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>QtyCode</th>
                                                <td>
                                                    <input id="qtycode" name="qtycode" v-model="form.qty_code"
                                                        type="number" class="text" tabindex="10029"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>StartCode</th>
                                                <td>
                                                    <input id="startcode" name="startcode" v-model="form.start_code"
                                                        type="number" class="text" tabindex="10029"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>EndCode</th>
                                                <td>
                                                    <input id="endcode" name="endcode" v-model="form.end_code" type="number"
                                                        class="text" tabindex="10029"/>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <div class="button type2" id="uniform-undefined">
                                        <span> Save</span>
                                        <input type="button" value="save" class="type2" @click="btnSave()" style="opacity: 0; width: 63px"
                                            tabindex="10026" data-bs-dismiss="modal" aria-label="Close"
                                        />
                                    </div>
                                    <div class="button type2" id="uniform-undefined">
                                        <span> Update</span>
                                        <input type="button" value="edit" @click="btnUpdate()" class="type2"
                                            style="opacity: 0; width: 63px" tabindex="10026" data-bs-dismiss="modal"/>
                                    </div>
                                    <div class="button type2" id="uniform-undefined">
                                        <span>Close</span>
                                        <input type="button" value="clear" class="type2" data-bs-dismiss="modal"
                                            aria-label="Close" @click="btnClear()" style="opacity: 0; width: 63px" tabindex="10026"/>
                                    </div>
                                </div>
                            </div>
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
                  <span class="ui-icon ui-icon-closethick" data-bs-dismiss="modal" aria-label="Close"></span>
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
                            <h3 class="title-purchase">SERIALCODE REPORT</h3>
                          </div>
                        </div>
                        <div class="row my-2 mx-1 justify-content-center table-padding-bot">
                          <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Serail Code</th>
                                <th scope="col">Prefix Code</th>
                                <th scope="col">QtyCode</th>
                                <th scope="col">StartCode</th>
                                <th scope="col">EndCode</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr
                                        v-for="(Serail, index) in serails.data" :key="index" >
                                        <td width="12%"> {{ index + 1 + "." }}</td>
                                        <td width="12%">{{ Serail.serail_code }}</td>
                                        <td width="12%">{{ Serail.prefix_code }}</td>
                                        <td width="12%">{{ Serail.qty_code }}</td>
                                        <td width="12%">{{ Serail.start_code }}</td>
                                        <td width="12%">{{ Serail.end_code }}</td>
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
                    <a class="btn-purchase btn-light text-capitalize border-0" data-mdb-ripple-color="dark" @click="print()">
                        <i class="fas fa-print text-primary"></i>
                        Print
                    </a>
                </div>
              </div>
            </div>
    </div>
</template>

<script>
import axios from "axios";
import pagination from "laravel-vue-pagination";

export default {
    components: { pagination },
    data() {
        return {
            serails: "",
            perPage: "",
            currentPage: 0,
            last_page: 1,
            action_api: "",
            action_api_1: "",
            form: {
                id: "",
                serail_code: "",
                prifix_code: "",
                qty_code: "",
                start_code: "",
                end_code: "",
                created_by: "",
                updete_by: "",
            },
        };
    },

    mounted() {
        this.getSerail();
    },

    methods: {
        getSerail(page = 1) {
            if (page > 0 && page <= this.last_page) {
                axios
                    .get("api/v1/serail")
                    .then(({ data }) => {
                        this.links = data.links;
                        this.last_page = data.last_page;
                        this.links.forEach((element) => {
                            if (element.label == page) {
                                this.perPage = "api/v1/serail?page=" + page;
                                axios.get(this.perPage).then(({ data }) => {
                                    this.currentPage = data.current_page;
                                    this.serails = data;
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
            this.action_api = "api/v1/serail/store";
        },
        btnSave() {
            axios.post("api/v1/serail/store", this.form).then((res) => {
                this.getSerail();
                this.form = Object.assign({});
            });
        },
        btnEdit(serail) {
            this.form = serail;
        },
        btnUpdate() {
            axios
                .post(
                    "api/v1/serail/update/" + this.form.serail_code,
                    this.form
                )
                .then(() => {
                    this.getSerail();
                    this.form = {};
                });
        },
        btnDelete(Serail) {
            axios.post("api/v1/serail/delete/" + Serail).then((res) => {
                this.getSerail();
            });
        },
     print() {
      var printContents = document.getElementById("invoiceholder").innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      window.location.reload();
     },
    },
};
</script>
