<template >
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
          <li id="tpHome"><a href="#" title="go to menu"><img alt="" height="28" src="img/topicPath_home.png"
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
                  Products
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
              <a @click="getproductboom()" class="dropdown-item btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#staticBackdropss" tabindex="10028">Boom Product</a>
            </li>
          </ul>
          <div class="search-box-title" style="height: 36px;">
            <a class="btn-radius bt-pn btn btn-sm" href="#" data-bs-toggle="dropdown" aria-expanded="false"
              style="float:left; color: #f8f5b4;margin-top: -2px;">
              <i class="fas fa-plus" style="padding-right:5px;margin-top: -2px;">
              </i>
              Create New Product
            </a>
            <ul class="dropdown-menu">
              <li>
                <a @click="getMessage('Message Confirm', 'Do you want to create new product.', 'crate', code)"
                  class="dropdown-item btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Default
                  Code</a>
              </li>
              <li>
                <a :value="C_code" class="dropdown-item" href="#"> Add Code</a>
              </li>
            </ul>
            <router-link to="viewproduct"><a class="btn-radius btn btn-sm" href="#"
                style=" color: #f8f5b4;margin-top: -2px;">
                <i class="fas fa-eye" style="padding-right:5px;">
                </i>
                Product view
              </a>
            </router-link>
          </div>
          <!-- Button trigger modal -->
          <!-- Modal -->
          <div class="modal fade ui-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content ui-dialog">
                <div class="ui-widget-header">
                  <h5 class="modal-title" id="staticBackdropLabel"><span class="ui-dialog-title"
                      id="ui-dialog-title-modal-edit-dialog">{{ this.title }}</span></h5>
                  <a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button" data-bs-dismiss="modal"><span
                      class="ui-icon ui-icon-closethick">close</span></a>
                </div>
                <div class="ui-dialog-content">
                  <div class="modal-body">
                    {{ this.message }}
                  </div>
                  <div class="modal-footer">
                    <div class="button type2" id="uniform-undefined" data-bs-dismiss="modal"><span>No<input
                          type="button" class="type2" value="No" style="width: 89px; opacity: 0;"
                          onclick="edit_cancel()" tabindex="10008"></span></div>
                    <div class="button type2" @click="messagegetconfirm(this.confirm)" :value="G_code"
                      data-bs-dismiss="modal"><span>Yes</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="search-box-content col-md-8 search-box02 flo02">

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
                  <th width="10%">Description.1</th>
                  <td width="50%">
                    <input :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.description"
                      class="string_zen clear_text text input_text" size="50" type="text">
                  </td>

                </tr>
                <tr>
                  <th width="10%">Description.2</th>
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
                    <select :disabled="isDisabled" v-model="form.group_code" @change="autoUpdateProduct(form)" class="form" style="width:362px;">
                      <option value="">Selete Suppliyer</option>
                      <option v-for="suppliyer in suppliyers" :value='suppliyer.sup_code'>{{ suppliyer.sup_name }}
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th width="10%">Category</th>
                  <td width="50%">
                    <select :disabled="isDisabled" v-model="form.cat_code" @change="autoUpdateProduct(form)"
                      class="form" style="width:362px;">
                      <option value="">Selete Suppliyer</option>
                      <option v-for="suppliyer in suppliyers" :value='suppliyer.sup_code'>{{ suppliyer.sup_name }}
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th width="10%">Brand Name</th>
                  <td width="50%">
                    <select :disabled="isDisabled" v-model="form.brand_code" @change="autoUpdateProduct(form)"
                      class="form" style="width:362px;">
                      <option value="">Selete Suppliyer</option>
                      <option v-for="suppliyer in suppliyers" :value='suppliyer.sup_code'>{{ suppliyer.sup_name }}
                      </option>
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
          </div>
          <div class="col-md-4 search-box02 flo02">
            <div class="box-img02">
              <img alt="upload" src="img/icon-img_upload.png">
              <p class="text-upload">Drop an image or<br><span><a href="#">upload file</a></span></p>
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
          <div class="box-content">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_list tbl_stripe" id="myTable">
              <thead>
                <tr>
                  <th width="5%">Image</th>
                  <th width="10%">Product Code</th>
                  <th width="20%">Description</th>
                  <th width="10%">Unit Code</th>
                  <th width="9%">Quantity</th>
                  <th width="9%">Price</th>
                  <th width="9%">Curency</th>
                  <th width="9%">Inactived</th>
                  <th width="9%"></th>
                  <th width="9%"></th>
                </tr>
                <tr v-for="form_line in form_lines">
                  <th class="bg_img" style=" justify-content: center;">
                    <img class="loading" v-if="pending" alt="image" @click="created()" />
                    <!-- This is a beautiful animation -->
                    <img alt="upload" src="img/icon-img_upload.png" width="20" />
                  </th>
                  <th><input :disabled="true" v-model="form_line.product_no" @change="autoUpdate(form_line)"
                      class="string_zen clear_text text" size="50" type="text" style="width:80% !important;"></th>
                  <th><input :disabled="isDisabled" v-model="form_line.description" @change="autoUpdate(form_line)"
                      class="string_zen clear_text text" size="50" type="text" style="width:80% !important;"></th>
                  <th>
                    <div class="dropdown">
                      <button @click="getunit(form_line.product_no)" @onmouseout="prooductboom(form_line)"
                        class="dropdown-toggle string_zen clear_text text" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false" size="50"
                        style="width:80% !important;padding-left: 11px;padding-right: 19px;border: none;">
                        {{ form_line.variant_unit_of_measure_code }}
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                        style="max-height: 400px; width: 250px; scroll-behavior: smooth; padding: 5px;margin: 5px;box-shadow: 1px 1px 5px #141417;border: none;">
                        <p><input :disabled="isDisabled" v-model="txtsearch" @input="searchproduct(txtsearch)"
                            class="string_zen clear_text text" size="50" type="text"
                            style="width:98% !important;border: 1px teal solid;border-radius: 1px;height: 30px;"></p>
                        <ul style="list-style:none ;" class="scrollable-menu">
                          <li v-for="boompro in boomunits" @click="getproduct(boompro, form_line, 'linkunit')">
                            <div class="menu-item">
                              <p>{{ boompro.unit_code }}</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </th>
                  <th><input :disabled="isDisabled" v-model="form_line.quantity_per_unit"
                      @change="autoUpdate(form_line)" class="string_zen clear_text text" size="50" type="text"
                      style="width:80% !important;"></th>
                  <th><input :disabled="isDisabled" v-model="form_line.unit_price" @change="autoUpdate(form_line)"
                      class="string_zen clear_text text" size="50" type="text" style="width:80% !important;"></th>
                  <th><input :disabled="isDisabled" v-model="form_line.curency_code" @change="autoUpdate(form_line)"
                      class="string_zen clear_text text" size="50" type="text" style="width:80% !important;"></th>
                  <th><input :disabled="isDisabled" v-model="form_line.varaiant" @change="autoUpdate(form_line)"
                      class="string_zen clear_text text" size="50" type="text" style="width:80% !important;"></th>
                  <th> <select :disabled="isDisabled" @change="autoUpdate(form_line)" class="form" style="width:80%;">
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                    </select></th>
                  <th class="bnt-02">
                    <div class="button type2" id="uniform-undefined" data-bs-toggle="modal"
                      data-bs-target="#staticBackdrop"
                      @click="getMessage('Message', 'Do yout want to Delete this recode. [' + form_line.id + ']', 'delelink', form_line.id)">
                      <span><input type="button" class="type2" style="opacity: 0; width: 54px;" tabindex="10025"
                          value="display"><i class="fa fa-trash" aria-hidden="true"></i> Delete</span></div>
                  </th>
                </tr>
              </thead>
              <vue-countdown style="display: none;" v-if="counting" :time="60000" @end="onCountdownEnd"
                v-slot="{ totalSeconds }">Fetch again {{ totalSeconds }} seconds later</vue-countdown>
            </table>
          </div>
          <div class="box-footer-pagination" style="text-align: left;">
            <div class="pagination">
              <div class="pagination">
                <a @click="myFunction()" :value="G_code" class="btn-radius bt-pn btn btn-sm show" href="#"
                  data-bs-toggle="dropdown" aria-expanded="true"
                  style="float: left; color: rgb(248, 245, 180); margin-top: -2px;"><i class="fas fa-plus"
                    style="padding-right: 5px; margin-top: -2px;"></i> Generate Code </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="staticBackdropss" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-contents">
        <div class="modal-header" style="display: block;">
          <h5 class="modal-title" id="staticBackdropLabel">Boom Products : {{ form.product_no }} , {{ form.description }}
          </h5>
          <span class="ui-icon ui-icon-closethick" data-bs-dismiss="modal" aria-label="Close"></span>
        </div>
        <div class="box-content">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_list tbl_stripe" id="myTable">
            <thead>
              <tr>
                <th width="10%">Product Code</th>
                <th width="20%">Description</th>
                <th width="9%">QTY in Unit</th>
                <th width="9%">Quantity</th>
                <th width="9%">Unit Code</th>
                <th width="9%">Inactived</th>
                <th width="9%"></th>
              </tr>
              <tr v-for="form_line in boomproducts">
                <th>
                  <div class="dropdown">
                    <button @onmouseout="prooductboom(form_line)" class="dropdown-toggle string_zen clear_text text"
                      type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" size="50"
                      style="width:80% !important;padding-left: 11px;padding-right: 19px;border: none;">
                      {{ form_line.boom_product_id }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                      style="max-height: 400px; width: 250px; scroll-behavior: smooth; padding: 5px;margin: 5px;box-shadow: 1px 1px 5px #141417;">
                      <p><input :disabled="isDisabled" v-model="txtsearch" @input="searchproduct(txtsearch)"
                          class="string_zen clear_text text" size="50" type="text"
                          style="width:98% !important;border: 1px teal solid;border-radius: 1px;height: 30px;"></p>
                      <ul style="list-style:none ;" class="scrollable-menu">
                        <li v-for="boompro in boompros" @click="getproduct(boompro, form_line, 'boomproducr')">
                          <div class="menu-item">
                            <p style="color: blue;">{{ boompro.product_no }}</p>
                            <p>{{ boompro.description }}</p>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </th>
                <th><input :disabled="isDisabled" v-model="form_line.description" @change="proboomAutoSave(form_line)"
                    class="string_zen clear_text text" size="50" type="text" style="width:80% !important;"></th>
                <th><input :disabled="isDisabled" v-model="form_line.quantity_per_unit"
                    @change="proboomAutoSave(form_line)" class="string_zen clear_text text" size="50" type="text"
                    style="width:80% !important;"></th>
                <th><input :disabled="isDisabled" v-model="form_line.quantity" @change="proboomAutoSave(form_line)"
                    class="string_zen clear_text text" size="50" type="text" style="width:80% !important;"></th>
                <th>
                  <div class="dropdown">
                    <button @click="getboomnit(form_line.product_no)" @onmouseout="prooductboom(form_line)"
                      class="dropdown-toggle string_zen clear_text text" type="button" id="dropdownMenuButton1"
                      data-bs-toggle="dropdown" aria-expanded="false" size="50"
                      style="width:80% !important;padding-left: 11px;padding-right: 19px;border: none;">
                      {{ form_line.bom_unit_of_measure_code }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                      style="max-height: 400px; width: 250px; scroll-behavior: smooth; padding: 5px;margin: 5px;box-shadow: 1px 1px 5px #141417;border: none;">
                      <p><input :disabled="isDisabled" v-model="txtsearch" @input="searchproduct(txtsearch)"
                          class="string_zen clear_text text" size="50" type="text"
                          style="width:98% !important;border: 1px teal solid;border-radius: 1px;height: 30px;"></p>
                      <ul style="list-style:none ;" class="scrollable-menu">
                         <li v-for="boompro in uints" @click="getproduct(boompro, form_line, 'boomunit')">
                          <div class="menu-item">
                            <p>{{ boompro.variant_unit_of_measure_code }}</p>
                          </div>
                         </li>
                      </ul>
                    </div>
                  </div>
                </th>
                <th> <select :disabled="isDisabled" v-model="form_line.inactived" @change="proboomAutoSave(form_line)"
                    class="form" style="width:80%;">
                    <option value="No">No</option>
                    <option value="Yes">Yes</option>
                  </select></th>
                <th class="bnt-02">
                  <div class="button type2" id="uniform-undefined" @click="deletboomlink(form_line.id)"><span><input type="button" class="type2" style="opacity: 0; width: 54px;" tabindex="10025" value="display"><i class="fa fa-trash" aria-hidden="true"></i> Delete</span></div>
                </th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="modal-footer">
          <a @click="boomcratenew()" :value="G_code" class="btn-radius bt-pn btn btn-sm show" href="#"
            data-bs-toggle="dropdown" aria-expanded="true"
            style="float: left; color: rgb(248, 245, 180); margin-top: -2px;"><i class="fas fa-plus"
              style="padding-right: 5px; margin-top: -2px;"></i>Add New</a>
          <div class="button type2" id="uniform-undefined">
          </div>
          <div class="button type2" id="uniform-undefined">
          </div>
        </div>
      </div>
    </div>
  </div>
  <span class="marker"></span>

  <div id="myModal" class="lskymodal">
    <div class="modal-content">
      <p><i class="fa fa-check" aria-hidden="true"></i> {{ massege }}</p>
    </div>
  </div>
</template>
<script>
import { exportDefaultSpecifier } from '@babel/types';

export default {
  data() {
    return {
      massege: '',
      pending: false,
      img: '',
      code: '',
      confirm: '',
      title: '',
      message: '',
      products: '',
      boomunits: [],
      productcode: '',
      line_pro_id: '',
      line_pro_de: '',
      boomproducts: [],
      txtsearch: '',
      suppliyers: [],
      uints: [],
      boompro: [],
      form: {
        product_no: '',
        product_barcode: '',
        description: '',
        description_2: '',
        image_url: '',
        stock_unit_of_measure_code: '',
        purche_unit_of_measure_code: '',
        brand_code: '',
        group_code: '',
        cat_code: '',
        sup_code: '',
        unit_price: '',
        inactived: '',
      },

      form_lines: {
        id: '',
        product_no: '',
        description: '',
        variant_unit_of_measure_code: '',
        quantity_per_unit: '',
        unit_price: '',
        varaiant: ''
      },
    }
  },
  async mounted() {
    try {
      if (this.$route.query.id.trim() != 'undefined') {
        this.products = this.$route.query.id
        this.productcode = this.products
      }
    } catch (error) {
      this.products = "undefined"
    }
    this.getunit()
    this.getsuppliyer()
    this.getEdite()
    this.form_lines = null;
    this.prooductboom();
    this.massege = "save successful.";
  },
  methods: {
    btnGenerate_code($status) {
      this.isDisabled = false
      this.crateNewsProduct()
    },

    myFunction() {
      if (this.products != "undefined") {
        axios.post('/api/v1/products/create/' + this.products)
          .then((response) => {
            this.form_lines = response.data
          })
      }
    },

    getunit() {
      axios.get('/api/v1/units')
        .then((response) => {
          this.uints = response.data;
        })
    },

    getsuppliyer() {
      axios.get('/api/v1/suppliyers/getdatasub')
        .then((response) => {
          this.suppliyers = response.data;
        })
    },

    crateNewsProduct() {
      axios.post('/api/v1/products/create')
        .then((response) => {
          this.form = response.data
          this.form.forEach(element => {
            this.form.product_no = element.product_no
            this.$router.push({ name: 'Product', query: { id: element.product_no } });
            this.products = element.product_no
            this.getEdite()
          });
        })
    },

    selectdataProduct() {
      axios.get('/api/v1/products/create/')
        .then((response) => {
          this.form = response.data
          this.form.forEach(element => {
            axios.get('/api/v1/products/editlink/' + element.product_no)
              .then((response) => {
                this.form_lines = response.data
              })
          });
        })
    },
    getEdite() {
      if (this.products.trim() != "undefined") {
        axios.get('/api/v1/products/edite/' + this.products)
          .then((response) => {
            this.form = response.data
            this.isDisabled = false
          }),
          axios.get('/api/v1/products/editlink/' + this.products)
            .then((response) => {
              this.form_lines = response.data
            })
      }
    },
    deleteUnit(linkId) {
      if (linkId != null) {
        axios.get('/api/v1/products/destLink/' + linkId)
          .then((response) => {
            this.form_lines = response.data
          })
      }

    },
    deletboomlink(linkId) {
      if (linkId != null) {
        axios.get('/api/v1/boomproduct/destroy/' + linkId)
          .then((response) => {
            this.boomproducts = response.data
          })
      }
    },
    getMessage(title, messsatetext, confirm, id) {
      this.title = title
      this.message = messsatetext
      this.confirm = confirm
      this.code = id;
    },
    messagegetconfirm(confirm) {
      if (confirm == 'crate') {
        this.btnGenerate_code('crate')
      }
      if (confirm == 'delelink') {
        this.deleteUnit(this.code)
      }
      if (confirm == 'boomlink') {
        this.deletboomlink(this.code)
      }
    },
    created() {
      this.pending = false
      fetch("https://example-api.com/image")
        .then((data) => (this.img = data.img))
        .finally(() => {
          this.pending = false;
        });
    },
    changeImage(e) {
      const image = e.target.files[0];
      const reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = (e) => {
        this.photo_path = ''
        this.forms.photo = e.target.result;
      };
    },
    autoUpdate(product_link) {
      if (product_link.product_no != "") {
        axios.post('/api/v1/products/updateProductLinke/' + product_link.id, product_link)
          .then((response) => {
            //  this.form_lines = response.data    
            this.messagebox();
          })
      }
    },
    autoUpdateProduct(product) {
      if (product.product_no != "") {
        axios.post('/api/v1/products/update/' + product.product_no, product)
          .then((response) => {
            this.messagebox();
          })
      }
    },
    getboomproduct(product) {
      axios.post('/api/v1/boomproduct/' + product)
        .then((response) => {
          this.boomproducts = response.data;
        })
    },
    getproductboom() {
      if (this.products.toString().trim() != "undefined") {
        axios.post('/api/v1/boomproduct/' + this.products)
          .then((response) => {
            this.boomproducts = response.data;
            if (this.boomproducts.length > 0) {

            } else {
              axios.post('/api/v1/boomcreate/' + this.products)
                .then((response) => {
                  this.boomproducts = response.data;
                })
            }
          })
      } else {

      }
    },
    prooductboom() {
      axios.get('/api/v1/getproductboom/' + this.products)
        .then((response) => {
          this.boompros = response.data;
        })
    },
    getproduct(boom, product, txt) {
      if (txt == 'boomproducr') {
        product.boom_product_id = boom.product_no;
        product.description = boom.description;
        this.proboomAutoSave(product);
        this.prooductboom();
      }
      if (txt == 'boomunit') {
        product.bom_unit_of_measure_code = boom.variant_unit_of_measure_code;
        this.proboomAutoSave(product);
        this.prooductboom();
      }
      if (txt == 'linkunit') {
        product.variant_unit_of_measure_code = boom.unit_code;
        this.autoUpdate(product);
      }
    },
    proboomAutoSave(product) {
      axios.put('/api/v1/boomproduct/update/' + product.id, product)
        .then((response) => {
          this.prooductboom();
        });
      this.messagebox();
      this.prooductboom();
    },
    getboomnit(proid) {
      axios.post('/api/v1/products/getboomline/' + proid)
        .then((response) => {
          this.uints = response.data;
          console.log(response.data);
        })
    },
    searchproduct(txt) {
      axios.get('/api/v1/boomproduct/search/' + txt)
        .then((response) => {
          this.boompros = response.data;
        });
    },
    boomcratenew() {
      axios.post('/api/v1/boomcreate/' + this.products)
        .then((response) => {
          this.boomproducts = response.data;
        })
    },
    getunit(proid) {
      axios.post('/api/v1/products/getlinkunit/' + proid)
        .then((response) => {
          this.boomunits = response.data;
        })
    },
    messagebox() {
      var modal = document.getElementById("myModal");
      modal.style.display = "block";
      setTimeout(() => modal.style.display = "none", 1500);
    },
  },
  startCountdown: function () {
    this.counting = true;
  },
  onCountdownEnd: function () {
    this.counting = false;
  },

}

</script>