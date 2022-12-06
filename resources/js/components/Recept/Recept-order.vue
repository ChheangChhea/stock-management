<template >
  <div class="wrapper" style="overflow: hidden">
    <div id="header">
      <div id="headTitle">
        <div id="logo">
          <img alt="Healthbook" height="44" src="/assets/image/logo.png" width="70" />
        </div>
        <h1 id="title">
          <font style="vertical-align: inherit">
            <font style="vertical-align: inherit">menu</font>
          </font>
        </h1>
      </div>
      <ol id="topicPath">
        <li id="tpHome">
          <a href="/menu/index" title="go to menu"><img alt="" height="28" src="/assets/image/topicPath_home.png"
              width="28" /> </a>
        </li>
      </ol>
      <div id="headInfo">
        <div id="date-info">
          <span class="icon"></span>
          <p id="todays" original-title="AM11:17">
             <font style="vertical-align: inherit">
               <font style="vertical-align: inherit">2022/10/11</font>
             </font>
          </p>
        </div>
        <div id="user-info">
          <span class="icon"></span>
          <p id="userName">
            <font style="vertical-align: inherit">
              <font style="vertical-align: inherit">system </font>
            </font><a href="/login/logout" id="btnlogout" title="logout">
              <font style="vertical-align: inherit">
                <font style="vertical-align: inherit">logout</font>
              </font>
            </a>
          </p>
        </div>
      </div>
      <!-- / #header -->
    </div>
    <div class="search-box">
      <div id="purchase">
        <!--#contents -->
        <div class="search-box mb-4">
          <a class="btn-radius bt-pn btn btn-sm" data-bs-toggle="dropdown" aria-expanded="false"
            style="float: right; color: #f8f5b4">
            <i class="fas fa-plus" style="padding-right: 5px"> </i>
            Menu
          </a>
          <ul class="dropdown-menu">
            <li>
              <button class="dropdown-item btn btn-primary" tabindex="10028" @click="saverecept()"><i class="fas fa-edit"></i> Save Recept</button>
            </li>
            <li>
              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdropss" tabindex="10028"
                href="#"> <i class="fas fa-save"></i> Booking</a>
            </li>
            <li>
              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdropss" tabindex="10028"
                href="#"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
            </li>
            <li>
              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdropss" tabindex="10028"
                href="#"><i class="fas fa-file-excel"></i> To Excel</a>
            </li>
          </ul>

          <div class="search-box-title" style="height: 36px">
            <a class="btn-radius bt-pn btn btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropss"
              tabindex="10028" style="float: left; color: #f8f5b4; margin-top: -2px">
              <i class="fas fa-plus" style="padding-right: 5px; margin-top: -2px">
              </i>
              Add New
            </a>
            <router-link to="/viewrecept"><a class="btn-radius btn btn-sm" href="#"
                style="color: #f8f5b4; margin-top: -2px">
                <i class="fas fa-eye" style="padding-right: 5px"> </i>
                View
              </a></router-link>
          </div>
          <!-- Button trigger modal -->
          <!-- Modal -->
          <div class="modal fade ui-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content ui-dialog">
                <div class="ui-widget-header">
                  <h5 class="modal-title" id="staticBackdropLabel">
                    <span class="ui-dialog-title" id="ui-dialog-title-modal-edit-dialog">{{ this.title }}</span>
                  </h5>
                  <a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button" data-bs-dismiss="modal"><span
                      class="ui-icon ui-icon-closethick">close</span></a>
                </div>
                <div class="ui-dialog-content">
                  <div class="modal-body">
                    {{ this.message }}
                  </div>
                  <div class="modal-footer">
                    <div class="button type2" id="uniform-undefined" data-bs-dismiss="modal">
                      <span>No<input type="button" class="type2" value="No" style="width: 89px; opacity: 0"
                          onclick="edit_cancel()" tabindex="10008" /></span>
                    </div>
                    <div class="button type2" @click="messagegetconfirm(this.confirm)" data-bs-dismiss="modal">
                      <span>Yes</span>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="search-box-content col-md-8 search-box02 flo02">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_search">
              <tbody>
                <tr>
                  <th width="10%">Document Number</th>
                  <td width="50%">
                    <input :disabled="true" @change="autoUpdateProduct(form)" v-model="form.document_no"
                      class="string_zen_kana clear_text text input_text" maxlength="50" size="50" type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Document Type</th>
                  <td width="50%">
                    <input :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.document_type"
                      class="string_zen_kana clear_text text input_text" maxlength="50" size="50" type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Description</th>
                  <td width="50%">
                    <input :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.description"
                      class="string_zen clear_text text input_text" size="50" type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Suppliyer</th>
                  <td width="50%">
                    <select :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.suppliyer_code"
                      class="form" style="width: 362px">
                      <option value="">Selete Suppliyer</option>
                      <option v-for="suppliye in suppliyer" :value="suppliye.sup_code" :key="suppliye.id">
                        {{ suppliye.sup_name }}
                      </option>
                    </select>
                  </td>
                </tr>

                <tr>
                  <th width="10%">Curency Code</th>
                  <td width="50%">
                    <input :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.curency_code"
                      class="string_zen clear_text text input_text" size="50" type="text" />
                  </td>
                </tr>
                <tr>
                  <th width="10%">Inactive</th>
                  <td width="50%">
                    <select @change="autoUpdateProduct(form)" v-model="form.inactived" :disabled="isDisabled"
                      class="form" style="width: 362px">
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-4 search-box02 flo02">
            <div class="box-img_porder">
              <img alt="upload" src="img/icon-img_upload.png" />
              <p class="text-upload01">
                Drop an image or<br /><span><a href="#">upload file</a></span>
              </p>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="box-content">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_list">
              <thead>
                <tr>
                  <th style="width: 7%">Product No</th>
                  <th style="width: 10%">Description</th>
                  <th style="width: 7%">Qty Order</th>
                  <th style="width: 7%">Qty Recept</th>
                  <th style="width: 7%">Unit Code</th>
                  <th style="width: 7%">Unit Price</th>
                  <th style="width: 7%">Curency Code</th>
                  <th style="width: 7%">Qty Balance</th>
                  <th style="width: 7%">Total Amount</th>
                  <th style="width: 7%">Issu Date</th>
                  <th style="width: 7%">Exprit date</th>
                </tr>
                <tr v-for="purchaseLine in purchases_lines" :key="purchaseLine.index">
                  <th style="padding: 10px">
                    <input :disabled="true" v-model="purchaseLine.document_no" @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code" name="jusinsya_code" type="text" tabindex="10008"  style="width: 7em"/>                 
                  </th>
                  <th style="padding: 10px">
                    <input :disabled="true" v-model="purchaseLine.description" @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code" name="jusinsya_code" type="text" tabindex="10008" />
                  </th>
                  <th style="padding: 10px">
                    <input :disabled="true" v-model="purchaseLine.inventory_order"
                      @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code" name="jusinsya_code" type="text" tabindex="10008" style="width: 7em" />
                  </th>
                  <th style="padding: 10px">
                    <input v-model="purchaseLine.inventory_recetive" @change="autoUpdatePurline(purchaseLine)"
                      class="clear_text code text" id="jusinsya_code" name="jusinsya_code" type="text" tabindex="10008"
                      style="width: 7em" />
                  </th>
                  <th style="padding: 10px">
                    <div class="dropdown">
                      <button @click="getunit(purchaseLine.product_no)" @onmouseout="prooductboom(purchaseLine)"
                        class="dropdown-toggle string_zen clear_text text" type="button" id="dropdownMenuButton1" style="width: 7em"
                        data-bs-toggle="dropdown" aria-expanded="false" size="50"> {{ purchaseLine.unit_of_measure_code }}
                      </button>
                    </div>
                  </th>
                  <th style="padding: 10px">
                    <input :disabled="false" v-model="purchaseLine.unit_price" @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code"  name="jusinsya_code" type="text" tabindex="10008" style="width: 7em" />
                  </th>

                  <th style="padding: 10px">
                    <input :disabled="true" v-model="purchaseLine.curency_code"  @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code" name="jusinsya_code" type="text" tabindex="10008" style="width: 7em" />
                  </th>
                  <th style="padding: 10px">
                    <input :disabled="true" v-model="purchaseLine.qty_balance" @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code"  name="jusinsya_code" type="text" tabindex="10008" style="width: 7em" />
                  </th>
                  <th style="padding: 10px">
                    <input :disabled="true" v-model="purchaseLine.total_amount" @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code"  name="jusinsya_code" type="text" tabindex="10008"  style="width: 7em"/>
                  </th>
                  <th style="padding: 10px">
                    <input :disabled="false" type="date" v-model="purchaseLine.issu_date" @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code"  name="jusinsya_code"  tabindex="10008" >
                  </th>
                  <th style="padding: 10px">
                      <input :disabled="false" type="date" v-model="purchaseLine.exprit_date" @change="autoUpdatePurline(purchaseLine)" class="clear_text code text" id="jusinsya_code"  name="jusinsya_code"  tabindex="10008"/>
                  </th>
                  
                </tr>
              </thead>
              <vue-countdown style="display: none" v-if="counting" :time="60000" @end="onCountdownEnd"
                v-slot="{ totalSeconds }">Fetch again {{ totalSeconds }} seconds later</vue-countdown>
            </table>
          </div>
          <div class="box-footer-pagination">
            <div class="pagination" style="padding: 10px; width: 100%">
              <div class="button type2" id="uniform-undefined" v-show="btnGenerate" @click="myFunction()"
                style="float: left">
                <span style="width: 150px"><input type="button" class="type2" tabindex="10025" value="display"
                    style="opacity: 0; width: 54px" /><i class="fas fa-plus"></i> Generate Code</span>
              </div>
              <div style="width: 30%; float: right; background: none; color: #f8f5b4; ">
                <!-- /.card-header -->
                <div id="inspection_call_statusdisplay" class="clearfix mt_0" style="margin=0;">
                  <div class="col main status_tested" style="border: none; width: 100%">
                    <table cellpadding="0" cellspacing="0" border="0">
                      <thead>
                        <tr></tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>
                            <font style="vertical-align: inherit; color: #f8f5b4">Product</font>
                          </th>
                          <td>
                            <input :disabled="true" style="vertical-align: inherit; background: none;  border: none;  "
                              v-model="productline" />
                          </td>
                        </tr>
                        <tr>
                          <th>
                            <font style="vertical-align: inherit; color: #f8f5b4">Item</font>
                          </th>
                          <td>
                            <input :disabled="true" style=" vertical-align: inherit;  background: none; border: none; "
                              v-model="item" />
                          </td>
                        </tr>
                        <tr>
                          <th>
                            <font style="vertical-align: inherit; color: #f8f5b4">Total</font>
                          </th>
                          <td>
                            <input :disabled="true" style="vertical-align: inherit; background: none;border: none; "
                              v-model="this.form.total_amount" />
                          </td>
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
    </div>
  </div>
  <div class="modal fade" id="staticBackdropss" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-contents">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Boom Products : {{ form.product_no }} , {{ form.description }} </h5>
          <input :disabled="isDisabled" @change="autoUpdateProduct(form)" v-model="form.description" class="string_zen clear_text text input_text" size="50" type="text">
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
                <td v-if="index % 2 == 0" style=" background-color: #dbdee1; border: medium none;text-align: center; "> {{ purchase.document_no }} </td>
                <td v-else style="border: medium none; text-align: center"> {{ purchase.document_no }}  </td>
                <td v-if="index % 2 == 0" style=" background-color: #dbdee1; border: medium none; text-align: center; "> {{ purchase.document_type }} </td>
                <td v-else style="border: medium none; text-align: center">  {{ purchase.document_type }}  </td>
                <td v-if="index % 2 == 0" style=" background-color: #dbdee1; border: medium none; text-align: center; "> {{ purchase.description }} </td>
                <td v-else style="border: medium none; text-align: center"> {{ purchase.description }} </td>
                <td v-if="index % 2 == 0" style=" background-color: #dbdee1; border: medium none; text-align: center; ">  {{ purchase.suppliyer_code }} </td>
                <td v-else style="border: medium none; text-align: center"> {{ purchase.suppliyer_code }} </td>
                <td v-if="index % 2 == 0" style=" background-color: #dbdee1; border: medium none; text-align: center; "> {{ purchase.curency_code }} </td>
                <td v-else style="border: medium none; text-align: center"> {{ purchase.curency_code }} </td>
                <td v-if="index % 2 == 0" style="  background-color: #dbdee1; border: medium none; text-align: center;"> {{ purchase.inactived }}</td>
                <td v-else style="border: medium none; text-align: center"> {{ purchase.inactived }} </td>
                <td v-if="index % 2 == 0" style="  background-color: #dbdee1; border: medium none;  text-align: center; ">
                  <div class="">
                    <div class="button type2" id="uniform-undefined">
                      <span><input @click="getEdit(purchase.document_no)" type="button" value="display" class="type2" style="opacity: 0; width: 54px" tabindex="10025"  data-bs-dismiss="modal" aria-label="Close" /><i class="fa fa-edit"></i> Recpt</span>
                    </div>
                  </div>
                </td>
                <td v-else style="border: medium none; text-align: center">
                  <div class="">
                    <div class="button type2" id="uniform-undefined">
                      <span><input @click="getEdit(purchase.document_no)" type="button" value="display" class="type2" style="opacity: 0; width: 54px" tabindex="10025" data-bs-dismiss="modal" aria-label="Close"/><i class="fa fa-edit"></i>Recpt</span>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
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
      total:0,
      item: 0,
      productline:0,
      links: [],
      purchases: [],
      purchases_lines: [
        {
          id:"",
          document_no :"",
          document_type:"",
          product_no :"",
          description:"",
          issu_date :"",
          exprit_date:"",
          unit_of_measure_code :"",
          unit_price:"",
          inventory_order :"",
          inventory_recetive:"",
          line_no :"",
          inventory:"",
          total_amount :0,
          qty_balance:0,
          amount_balance:0,
          curency_code:"",
          remark :"",
          created_by:"",
          delete_by :"",
          created_at:"",
          updated_at :"",
        }
      ],
      perPage: "",
      currentPage: 0,
      last_page: 1,
      form :{
          document_no:"",
          document_type:"",
          description:"",
          suppliyer_code:"",
          curency_code:"",
          inactived:"",
          total_amount:0,
          created_by:"",
          statue:"",
          delete_by:"",
      },
    };
  },
  mounted() {
    this.getPurchase();
    this.getsuppliyer();
  },
  methods: {
    getPurchase(page = 1) {
      if (page > 0 && page <= this.last_page) {
        axios
          .get("api/v1/receive/getpurchea")
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
    getsuppliyer() {
      axios.get("/api/v1/suppliyers/getdatasub").then((response) => {
        this.suppliyer = response.data;
      });
    },
    getEdit(id) {
      if (this.id != "undefined") {
        axios
          .get("api/v1/purchase/edit/purchaseorder/" + id)
          .then((response) => {
            this.form = response.data;
          }),
          axios
            .get("api/v1/purchase/edit/purchaseline/" + id)
            .then((response) => {
              this.purchases_lines= response.data;
              this.sumtotal();
      })
     }
    },
    btnDelete(id) {
      axios.post("api/v1/purchase/delete/purchaseorder/" + id).then((res) => {
        this.getPurchase();
      });
    },
    saverecept() {
      axios.post('api/v1/receive/recept',this.form).then((res) => {
           if(res.data.statue == "successful"){
               this.purchases_lines.forEach(element => {    
                    axios.post('api/v1/receive/receptlink',element).then((res) => {
                        console.log(res.data);
                    });                   
               });
           }
      });
    },
   
   autoUpdatePurline(ProLink){
       if(parseInt(ProLink.inventory_order) < parseInt(ProLink.inventory_recetive)){
        if (confirm("Preasse Insert Your Recept valuse Small then Order Valuse \n Product Id : "+ProLink.product_no+" Order :"+ProLink.inventory_order+">= Recept: "+ ProLink.inventory_recetive)) {
              ProLink.inventory_recetive = ProLink.inventory_order;
          } else {
              ProLink.inventory_recetive = ProLink.inventory_order;
          }
       }else{
         ProLink.qty_balance = 0;
         ProLink.amount_balance = 0;
         ProLink.qty_balance = parseFloat(ProLink.inventory_order) - parseFloat(ProLink.inventory_recetive);
         ProLink.total_amount = parseFloat(ProLink.unit_price)* parseFloat(ProLink.inventory_recetive);
         ProLink.amount_balance = parseFloat(ProLink.unit_price)*parseFloat( ProLink.qty_balance);
         this.sumtotal();
       }
  },
  sumtotal(){
    this.productline = 0; this.item = 0;   this.form.total_amount = 0;
    this.purchases_lines.forEach(element => {
         this.productline += 1;
         this.item += parseFloat(element.inventory_recetive);
         this.form.total_amount += parseFloat(element.total_amount);
        });  
      }
 }
}
</script>