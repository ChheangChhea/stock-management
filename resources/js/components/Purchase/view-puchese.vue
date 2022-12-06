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
          <div class="search-box-title" style="height: 36px">
            <router-link to="purchase"><a class="btn-radius btn btn-sm" href="#"
                style="color: #f8f5b4; margin-top: -2px">
                <i class="fas fa-plus" style="padding-right: 5px"> </i>
                Add Purchase
              </a></router-link>
          </div>
          <div class="search-box-content">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_search">
              <tbody>
                <tr>
                  <th width="10%">Document Number</th>
                  <td width="50%">
                    <input v-model="form.document_no" class="string_zen_kana clear_text text input_text" maxlength="50"
                      size="50" type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Document Type</th>
                  <td width="50%">
                    <input v-model="form.document_type" class="string_zen_kana clear_text text input_text"
                      maxlength="50" size="50" type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Description</th>
                  <td width="50%">
                    <input v-model="form.description" class="string_zen clear_text text input_text" size="50"
                      type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Suppliyer</th>
                  <td width="50%">
                    <input v-model="form.suppliyer_code" class="string_zen clear_text text input_text" size="50"
                      type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Curency Code</th>
                  <td width="50%">
                    <input v-model="form.curency_code" class="string_zen clear_text text input_text" size="50"
                      type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Inactive</th>
                  <td width="50%">
                    <select v-model="form.inactived" class="form" style="width: 362px">
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="search-box-footer">
              <div class="button type2" id="uniform-undefined">
                <span><input @click="save()" type="button" value="display" class="type2" style="opacity: 0; width: 54px"
                    tabindex="10025" />
                  Save</span>
              </div>
              <div class="button type2" id="uniform-undefined">
                <span>clear
                  <input type="button" value="clear" class="type2" style="opacity: 0; width: 63px"
                    tabindex="10026" /></span>
              </div>
              <div class="button type2" id="uniform-undefined">
                <span>CSV
                  <input type="button" value="outputCSV output" class="type2" style="opacity: 0; width: 76px"
                    tabindex="10027" /></span>
              </div>
              <span class="marker"></span>
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
                  <!-- <th width="5%">Image</th> -->
                  <th width="10%">Document Num</th>
                  <th width="10%">Document Type</th>
                  <th width="20%">Description</th>
                  <th width="10%">Suppliyer</th>
                  <th width="10%">Curency Code</th>
                  <th width="9%">Inactived</th>
                  <th width="9%"></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(purchase, index) in purchases" :key="index">
                  <!-- <td
                    v-if="index % 2 == 0"
                    style="
                      background-color: #dbdee1;
                      border: medium none;
                      text-align: center;
                    "
                  >
                    <img
                      alt="タックシール印刷"
                      height="40"
                      src="pichture/para.png"
                      width="40"
                      style="box-shadow: 1px 1px 1px 1px #b08b8b"
                    />
                  </td> -->
                  <!-- <td v-else style="border: medium none; text-align: center">
                    <img
                      alt="タックシール印刷"
                      height="40"
                      src="pichture/Paracetamol.jpg"
                      width="40"
                      style="box-shadow: 1px 1px 1px 1px #b08b8b"
                    />
                  </td> -->
                  <td v-if="index % 2 == 0" style="
                      background-color: #dbdee1;
                      border: medium none;
                      text-align: center;
                    ">
                    {{ purchase.document_no }}
                  </td>
                  <td v-else style="border: medium none; text-align: center">
                    {{ purchase.document_no }}
                  </td>
                  <td v-if="index % 2 == 0" style="
                      background-color: #dbdee1;
                      border: medium none;
                      text-align: center;
                    ">
                    {{ purchase.document_type }}
                  </td>
                  <td v-else style="border: medium none; text-align: center">
                    {{ purchase.document_type }}
                  </td>
                  <td v-if="index % 2 == 0" style="
                      background-color: #dbdee1;
                      border: medium none;
                      text-align: center;
                    ">
                    {{ purchase.description }}
                  </td>
                  <td v-else style="border: medium none; text-align: center">
                    {{ purchase.description }}
                  </td>
                  <td v-if="index % 2 == 0" style="
                      background-color: #dbdee1;
                      border: medium none;
                      text-align: center;
                    ">
                    {{ purchase.suppliyer_code }}
                  </td>
                  <td v-else style="border: medium none; text-align: center">
                    {{ purchase.suppliyer_code }}
                  </td>
                  <td v-if="index % 2 == 0" style="
                      background-color: #dbdee1;
                      border: medium none;
                      text-align: center;
                    ">
                    {{ purchase.curency_code }}
                  </td>
                  <td v-else style="border: medium none; text-align: center">
                    {{ purchase.curency_code }}
                  </td>
                  <td v-if="index % 2 == 0" style="
                      background-color: #dbdee1;
                      border: medium none;
                      text-align: center;
                    ">
                    {{ purchase.inactived }}
                  </td>
                  <td v-else style="border: medium none; text-align: center">
                    {{ purchase.inactived }}
                  </td>
                  <td v-if="index % 2 == 0" style="
                      background-color: #dbdee1;
                      border: medium none;
                      text-align: center;
                    ">
                    <div class="">
                      <div class="button type2" id="uniform-undefined">
                        <span><input @click="getEdit(purchase.document_no)" type="button" value="display" class="type2"
                            style="opacity: 0; width: 54px" tabindex="10025" /><i class="fa fa-edit"></i> Update</span>
                      </div>
                      <div class="button type2" id="uniform-undefined">
                        <span @click="btnDelete(purchase.id)">
                          <input type="button" value="clear" class="type2" style="opacity: 0; width: 63px"
                            tabindex="10026" /><i class="fa fa-trash" aria-hidden="true"></i>
                          Delete</span>
                      </div>
                    </div>
                  </td>
                  <td v-else style="border: medium none; text-align: center">
                    <div class="">
                      <div class="button type2" id="uniform-undefined">
                        <span><input @click="getEdit(purchase.document_no)" type="button" value="display" class="type2"
                            style="opacity: 0; width: 54px" tabindex="10025" /><i class="fa fa-edit"></i> Update</span>
                      </div>
                      <div class="button type2" id="uniform-undefined" to="product">
                        <span @click="btnDelete(purchase.document_no)">
                          <input type="button" value="clear" class="type2" style="opacity: 0; width: 63px"
                            tabindex="10026" /><i class="fa fa-trash" aria-hidden="true"></i>
                          Delete</span>
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
                  <div v-if="index == 0" @click="getPurchase(this.currentPage - 1)">
                    <i class="fa fa-arrow-left" aria-hidden="true" style="padding-top: 11"></i>
                  </div>
                  <div v-else-if="index - 1 == this.last_page" @click="getPurchase(this.currentPage + 1)">
                    <i class="fa fa-arrow-right" aria-hidden="true" style="padding-top: 11"></i>
                  </div>
                  <div v-else-if="this.currentPage == index" class="page current" @click="getPurchase(index)">
                    {{ index }}
                  </div>
                  <div v-else class="page" @click="getPurchase(index)">
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
import axios, { Axios } from "axios";
export default {
  data() {
    return {
      links: [],
      purchases: [],
      perPage: "",
      currentPage: 0,
      last_page: 1,
      form: {
        id: "",
        document_no: "",
        document_type: "",
        description: "",
        suppliyer_code: "",
        curency_code: "",
        inactived: "",
      },
    };
  },
  mounted() {
    this.getPurchase();
  },
  methods: {
    getPurchase(page = 1) {
      if (page > 0 && page <= this.last_page) {
        axios
          .get("api/v1/purchase/purchaseorder/view")
          .then(({ data }) => {
            this.links = data.links;
            this.last_page = data.last_page;
            this.links.forEach((element) => {
              if (element.label == page) {
                this.perPage = "api/v1/purchase/purchaseorder/view?page=" + page;
                axios.get(this.perPage).then(({ data }) => {
                  this.currentPage = data.current_page;
                  this.purchases = data.data;
                });
              }
            });
          })
          .catch(({ response }) => {
            console.error(response);
          });
      }
    },
    getEdit(id) {
      if (id != "") {
        this.$router.push({
          name: "Purchase",
          query: { id: id },
        });
      }
    },
    btnDelete(id) {
      axios.post("api/v1/purchase/delete/purchaseorder/" + id).then((res) => {
        this.getPurchase();
      });
    },
  },
};
</script>