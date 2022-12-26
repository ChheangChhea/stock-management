<template>
    <div class="wrapper">
        <div class="container-fuild">
            <div id="header">
                <div id="headTitle">
                    <div id="logo">
                        <img   alt="Healthbook"  height="44" src="img/logo.png" width="70"/>
                    </div>
                    <h1 id="title">
                        <font style="vertical-align: inherit">
                            <font style="vertical-align: inherit">Patient master</font>
                        </font>
                    </h1>
                </div>
                <ol id="topicPath">
                    <li id="tpHome">
                        <a href="/" title="go to menu"><img alt="" height="28" src="img/topicPath_home.png" width="28"/></a>
                    </li>
                    <li>
                        <a href="dashbaord">
                            <font style="vertical-align: inherit">
                                <font style="vertical-align: inherit" >Master Admin</font >
                            </font>
                        </a>
                    </li>
                    <li>
                        <span>
                            <font style="vertical-align: inherit">
                                <font style="vertical-align: inherit">
                                    Stock Transection
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
                                <font style="vertical-align: inherit" >2022/08/25</font>
                            </font>
                        </p>
                    </div>
                    <div id="user-info">
                        <span class="icon"></span>
                        <p id="userName">
                            <font style="vertical-align: inherit">
                                <font style="vertical-align: inherit" >system</font>
                            </font>
                            <a href="/login/logout" id="btnlogout" original-title="logout">
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
                    <a class="btn-radius bt-pn btn btn-sm" data-bs-toggle="dropdown" aria-expanded="false" style="float: right; color: #f8f5b4">
                        <i class="fas fa-plus" style="padding-right: 5px"> </i>
                        Menu
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a @click="getproductboom()" class="dropdown-item btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticboomId" tabindex="10028">
                                <i class="fa-solid fa-circle-b"></i> Boom Product
                            </a>
                        </li>
                        <li>
                            <a @click="getsuppliyerview()" class="dropdown-item btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticboomId" tabindex="10028">
                                <i class="fa fa-print" aria-hidden="true"></i>
                                Print
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdropss" tabindex="10028" href="#">
                                <i class="fas fa-file-excel"></i> To Excel
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropss" tabindex="10028">
                                <i class="fas fa-edit"></i> Release
                            </a>
                        </li>
                    </ul>
                    <h2 class="search-box-title">Search</h2>
                    <input id="search" name="search" type="hidden" value="1" />
                    <div class="box">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-striped br-table">
                            <thead>
                                <tr class="header-table">
                                    <th width="5%">Id</th>
                                    <th width="7%">Document No</th>
                                    <th width="7%">Document Type</th>
                                    <th width="7%">Product No</th>
                                    <th width="12%">Description</th>
                                    <th width="9%">Unit_of_Measure Code</th>
                                    <th width="7%">Unit_Price</th>
                                    <th width="7%">Inventory</th>
                                    <th width="7%">Total Amount</th>
                                    <th width="7%">Curency Code</th>
                                    <th width="9%">Remark</th>
                                </tr>
                            </thead>
                            <!-- <tbody>
                                    
                                </tbody> -->
                        </table>

                        <div class="box-footer-pagination">
                            <pagination :data="Categories" @pagination-change-page="getCategorys"/>
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
                    <h5 class="modal-title in-header" id="staticBackdropLabel">
                        <i class="fa fa-print" aria-hidden="true"></i> Print :{{ form.product_no }} , {{ form.description }}</h5>
                    <a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button" data-bs-dismiss="modal"></a>
                </div>
                <div class="ui-dialog-content height-modal" id="invoiceholder">
                    <!----set size for A4-->
                    <div id="purchaseorder">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-5 mt-3">
                                    <div class="row d-flex align-items-baseline">
                                        <div class="col-xl-9"></div>
                                        <hr />
                                    </div>
                                    <div class="container" style="max-width: 100%">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <h3 class="title-purchase">
                                                    CATEGORY REPORT
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="row my-2 mx-1 justify-content-center table-padding-bot">
                                            <table class="table table-striped table-borderless">
                                                <thead style="background-color: #84b0ca;" class="text-white">
                                                    <tr>
                                                        <th scope="col">Id</th>
                                                        <th scope="col">Category Code</th>
                                                        <th scope="col">Category Name</th>
                                                        <th scope="col">Category Name 2</th>
                                                        <th scope="col">Inactived</th>
                                                        <th scope="col">Create By</th>
                                                        <th scope="col">Update By</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(Category, index) in Categories.data" :key="Category.index">
                                                        <td width="12%">{{index + 1 + "."}}</td>
                                                        <td width="12%">{{Category.cat_code}}</td>
                                                        <td width="12%">{{Category.cat_name}}</td>
                                                        <td width="12%">{{Category.cat_name_2}}</td>
                                                        <td width="12%">{{Category.inactived}}</td>
                                                        <td width="12%">{{Category.created_by}}</td>
                                                        <td width="12%">{{Category.updete_by}}</td>
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
                    <div class="button type2" id="uniform-undefined" data-bs-dismiss="modal">
                        <span>No
                            <input type="button" class="type2" value="No" style="width: 89px; opacity: 0" onclick="edit_cancel()" tabindex="10008"/>
                        </span>
                    </div>
                    <div class="button type2" @click="print()" :value="G_code" data-bs-dismiss="modal">
                        <span>Yes</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { useCurrentTime } from "../../componentJS/date";
import pagination from "laravel-vue-pagination";
export default {
    components: { pagination },
    setup() {
        const { currentTime } = useCurrentTime();
        return { currentTime };
    },

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
                .post(
                    "api/v1/categorys/update/" + this.form.cat_code,
                    this.form
                )
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
