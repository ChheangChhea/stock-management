<template>
    <div class="wrapper">
        <div class="container-fuild">
      <div id="header">
        <div id="headTitle">
          <div id="logo"><img alt="Healthbook" height="44" src="img/logo.png" width="70"></div>
          <h1 id="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Patient master</font></font></h1>
        </div>
        <ol id="topicPath">
          <li id="tpHome"><a href="/" title="go to menu"><img alt="" height="28" src="img/topicPath_home.png" width="28"></a></li>              
              <li>
                  <a href="dashbaord"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Master Admin</font></font></a>
              </li>
              <li>
                  <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    StockAlert
                  </font></font></span>
              </li>
        </ol>
        <div id="headInfo">
          <div id="date-info">
            <span class="icon"></span>
            <p id="todays" original-title="PM12:13"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2022/08/25</font></font></p>
          </div>
          <div id="user-info">
            <span class="icon"></span>
            <p id="userName"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">system 
              </font></font><a href="/login/logout" id="btnlogout" original-title="logout"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">logout</font></font></a></p>
          </div>
        </div>
        <!-- / #header --></div>
    </div>
        <div class="search-box">
            <div id="product">
                <!--#contents -->
                <div class="search-box mb-4">
                    <a class="btn-radius bt-pn btn btn-sm" data-bs-toggle="dropdown" aria-expanded="false" style="float: right; color: #f8f5b4">
                        <i class="fas fa-plus" style="padding-right: 5px"></i>
                        Menu
                    </a>
                    <a v-if="item > 0" class="btn-radius bt-pn btn btn-sm" data-bs-toggle="modal" data-bs-target="#statiex-import" tabindex="10028" style="float: right; color: #f8f5b4">
                        <span style="width: 14px;height: 14px; adding: 2px;color: white; font-weight: bold;">{{ item }}</span> To Purchese
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a @click="getsuppliyerview()"  class="dropdown-item btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticboomId"
                                tabindex="10028">
                                <i class="fa fa-print" aria-hidden="true"></i>
                                Print
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdropss" tabindex="10028"
                                href="#">
                                <i class="fas fa-file-excel"></i> To Excel</a>
                        </li>
                        <li>
                            <a class="dropdown-item btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropss" tabindex="10028">
                                <i class="fas fa-edit"></i> Release</a>
                        </li>
                    </ul>
                    <router-link to=""><h2 class="search-box-title">Search</h2></router-link>
                    <input id="search" name="search" type="hidden" value="1"/>
                </div>
                <div class="box">
                    <div class="box-footer-pagination">
                        <div class="pagination">
                            <div class="pagination">
                            </div>
                        </div>
                    </div>

                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-striped br-table">
                        <thead>
                            <tr class="header-table">
                                <th width="3%">No</th>
                                <th width="13%">Product Code</th>
                                <th width="13%">Product Name</th>
                                <th width="13%">Re-Order</th>
                                <th width="9%">Inventory</th>
                                <th width="6%">Unit</th>
                                <th width="14%">Price</th>
                                <th width="7%"></th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr v-for="(item,index ) in items.data" :key="index" style="color: red !important;">
                                    <td width="3%">{{index+1}}</td>
                                    <td width="13%">{{item.product_no}}</td>
                                    <td width="13%">{{item.description}}</td>
                                    <td width="13%">{{item.reorder_point}}</td>
                                    <td width="13%">{{item.inventorys}}</td>
                                    <td width="6%">{{item.unit_of_measure_code}}</td>
                                    <td width="14%">{{item.unit_price}}</td>
                                    <td width="7%">
                                        <div class="button type2" id="uniform-undefined">
                                           <span><input @click="getEdit(item)" type="button" value="display" class="type2" style="opacity: 0; width: 54px" /><i class="fa fa-edit"></i>Purchase</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                    <div class="box-footer-pagination">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade ui-modal" id="staticboomId" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticboomId" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content ui-dialog">
                <div class="ui-widget-header">
                  <span
                      class="ui-icon ui-icon-closethick" data-bs-dismiss="modal" aria-label="Close"></span>
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
                            <h3 class="title-purchase">STOCKALERT REPORT</h3>
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
                                <td width="13%">{{ item.product_no }}</td>
                                <td width="13%">{{ item.description }}</td>
                                <td width="13%">{{ item.reorder_point }}</td>
                                <td width="6%">{{ item.unit_of_measure_code }}</td>
                                <td width="19%">{{ item.unit_price }}</td>
                                <td width="9%">{{ item.inventorys }}</td>
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
                    <a class="btn-purchase btn-light text-capitalize border-0" data-mdb-ripple-color="dark" @click="print()"><i
              class="fas fa-print text-primary"></i> Print</a>
                </div>
              </div>
            </div>
    </div>

    <div class="modal fade ui-modal" id="statiex-import" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticboomId" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content ui-dialog">
                <div class="ui-widget-header">
                  <h5 class="modal-title in-header" id="staticBackdropLabel" ><i class="fa-solid fa-file"></i> Create Product Order: {{ purche.length-1 }}items</h5>
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
                              <h3  class="title-purchase" id="titlered">Add Product Purchese</h3>
                            </div>
                          </div>
                          <div class="row my-2 mx-1 justify-content-center table-padding-bot customsroll">
                            <table class="table table-striped table-borderless" id="exceldata">
                              <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr>
                                  <th style="width: 5%">No</th>
                                  <th style="width: 7%">Product No</th>
                                  <th style="width: 7%">Description</th>
                                  <th style="width: 7%">Unit Price</th>
                                  <th style="width: 7%">Inventory</th>
                                  <th style="width: 7%">Unit Code</th>
                                  <th style="width: 7%">Unit Code</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="(purchaseLine,index) in purche" :key="items.index">
                                  <th v-if="index>=1" style="width: 5%">{{index}}</th>
                                  <th v-if="index>=1" style="width: 7%">{{purchaseLine.product_no}}</th>
                                  <th v-if="index>=1" style="width: 10%">{{purchaseLine.description}}</th>
                                  <th v-if="index>=1" style="width: 7%">{{purchaseLine.unit_price}}</th>
                                  <th v-if="index>=1" style="width: 7%">{{purchaseLine.inventorys}}</th>
                                  <th v-if="index>=1" style="width: 7%">{{purchaseLine.stock_unit_of_measure_code}}</th>
                                  <th v-if="index>=1" style="width: 7%">
                                    <div class="button type2" id="uniform-undefined">
                                      <span><input @click="RemoveItem(purchaseLine.product_no)" type="button" value="display" class="type2" style="opacity: 0; width: 54px" tabindex="10025" /><i class="fa fa-edit"></i> Remove</span>
                                    </div>
                                  </th>
                                </tr>
                              </tbody>

                            </table>
                          </div>
                          <div class="row">
                          </div>
                          <hr>
                      

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                     <input v-if="excel=='Import'"  type="file" @change="getExcelData" name="select_file" /> 
                      <a v-else class="btn-purchase btn-light text-capitalize" data-bs-dismiss="modal" data-mdb-ripple-color="dark" @click="exportdataExcel()"><i class="fas fa-save"></i> Add Purchese Order</a> 
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
            issave:'',
            bt1:'',
            bt2:'',
            items:{},
            links:[],
            products:[],
            purche:[{}],
            perPage: '',
            currentPage: 0,
            last_page: 1,
            item:'0',
            datasave:[{}],
            form:null,
            getProduct:[],
            docId:'',
        };
    },

    mounted() {
        this.getBrands();
    },
    
    methods: {
        getBrands() {
        axios.get("/api/v1/stockcheck/checkOptionstock/")
          .then(( data ) => {
             this.items = data
          })
    }, 
    getEdit(Product){
       
           if(this.purche.length == 0){
            this.purche = Product;

           }else{
            var check = false;
            this.purche.forEach(element => {
                if(Product == element){
                   check = true;
                }
            });
            if(!check){
                this.purche.push(Product);
            }
           } 
           this.item = this.purche.length-1;
    },
    createPurches(){
        axios.post("/api/v1/purchase/store/").then((response) => {
      });
    },
    RemoveItem(id){
      var newArray  = [];
      this.purche.forEach(element => {
        if(element.product_no !=id){
          newArray.push(element);
        }
      });
      this.purche = newArray;
      this.item = this.purche.length-1;
      if(this.item < 0) this.item = 0;
    },
    save() {
      if(this.issave =="save"){
            this.isDisabled = false;
           axios.post('api/v1/brands/create',this.form).then(res => {
                    this.getBrands(1);
                })
            }
     else{
         this.isDisabled = true;
         axios.post('api/v1/brands/update/'+this.issave,this.form).then(res => {
            this.getBrands(1);   
              });
            }
        },
        print() {
          var printContents = document.getElementById("invoiceholder").innerHTML;
          document.body.innerHTML = printContents;
          window.print();
          window.location.reload();
       },
     dalete(brand){  
      axios.get('api/v1/brands/delete/'+brand).then(res => {
                this.getBrands(1);
        })
      },
    checkActionForm(checkform,bt1,bt2,brandId){
        if(checkform =="save"){         
            this.bt1 = bt1
            this.bt2 = bt2   
            this.issave ="save"
        }
         else{
            this.bt1 = bt1
            this.bt2 = bt2
            this.edit(brandId)
            this.issave = brandId
        }
     },
    serchdata(){
        axios.post('api/v1/brands/search').then(res => {     
        })
     },
   exportdataExcel(){
      axios.post("/api/v1/purchase/store/").then((response) => {
        var x =1000;
        var i = 1;
        this.form = response.data;
        this.purche.forEach(element => {
          if(element.product_no != null){
            this.form.forEach(elementdata => {
                element.document_no = elementdata.document_no;
                element.document_type = elementdata.document_type;
              });
              setTimeout(() => this.get(element), x);
              i++;
            } 
         });
         setTimeout(() => this.getRoud(this.form[0].document_no), x*i);
      });
     
    },
    get(Product){
      axios.post("api/v1/purchase/update/Purchaselinealert/" + Product.document_no)
            .then((res) => {
                this.getProduct = res.data[0];
                this.getProduct.description = Product.description;
                this.getProduct.product_no = Product.product_no;
                this.getProduct.unit_of_measure_code = Product.stock_unit_of_measure_code;
                Product = this.getProduct;
                if(Product.document_no != ""){this.docId = Product.document_no;} 
                axios.post("/api/v1/purchase/update/purchaseline/"+ Product.document_no,Product).then((res) => { }); 
         });
    },    
    getRoud(id) {
      console.log(id);
      if (id != "") {
        this.$router.push({
          name: "Purchase",
          query: { id: id },
        });
      }
    },
  }
};

</script>
