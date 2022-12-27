<template>
    <div class="wrapper">
        <div class="container-fuild">
            <div id="header">
                <div id="headTitle">
                    <div id="logo">
                        <img
                            alt="Healthbook"
                            height="44"
                            src="img/logo.png"
                            width="70"
                        />
                    </div>
                    <h1 id="title">
                        <font style="vertical-align: inherit">
                            <font style="vertical-align: inherit"
                                >Patient master</font
                            >
                        </font>
                    </h1>
                </div>
                <ol id="topicPath">
                    <li id="tpHome">
                        <a href="/" title="go to menu"
                            ><img
                                alt=""
                                height="28"
                                src="img/topicPath_home.png"
                                width="28"
                        /></a>
                    </li>
                    <li>
                        <a href="dashbaord">
                            <font style="vertical-align: inherit">
                                <font style="vertical-align: inherit"
                                    >Master Admin</font
                                >
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
                                <font style="vertical-align: inherit"
                                    >2022/08/25</font
                                >
                            </font>
                        </p>
                    </div>
                    <div id="user-info">
                        <span class="icon"></span>
                        <p id="userName">
                            <font style="vertical-align: inherit">
                                <font style="vertical-align: inherit"
                                    >system</font
                                >
                            </font>
                            <a
                                href="/login/logout"
                                id="btnlogout"
                                original-title="logout"
                            >
                                <font style="vertical-align: inherit">
                                    <font style="vertical-align: inherit"
                                        >logout</font
                                    >
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
                    <a
                        class="btn-radius bt-pn btn btn-sm"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        style="float: right; color: #f8f5b4"
                    >
                        <i class="fas fa-plus" style="padding-right: 5px"> </i>
                        Menu
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a
                                @click="getproductboom()"
                                class="dropdown-item btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#staticboomId"
                                tabindex="10028"
                            >
                                <i class="fa-solid fa-circle-b"></i> Boom
                                Product
                            </a>
                        </li>
                        <li>
                            <a
                                @click="getsuppliyerview()"
                                class="dropdown-item btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#staticboomId"
                                tabindex="10028"
                            >
                                <i class="fa fa-print" aria-hidden="true"></i>
                                Print
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                data-bs-toggle="modal"
                                data-bs-target="#staticBackdropss"
                                tabindex="10028"
                                href="#"
                            >
                                <i class="fas fa-file-excel"></i> To Excel
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#staticBackdropss"
                                tabindex="10028"
                            >
                                <i class="fas fa-edit"></i> Release
                            </a>
                        </li>
                    </ul>
                    <h2 class="search-box-title">Search</h2>
                    <input id="search" name="search" type="hidden" value="1" />
                    <div class="box">
                        <table
                            width="100%"
                            border="0"
                            cellpadding="0"
                            cellspacing="0"
                            class="table table-striped br-table"
                        >
                            <thead>
                                <tr class="color-trhead-stocktran">
                                    <th class="thcorlortrans">Document No</th>
                                    <th class="thcorlortrans">Document Type</th>
                                    <th class="thcorlortrans">Product No</th>
                                    <th class="thcorlortrans">Description</th>
                                    <th class="thcorlortrans">Unit Code</th>
                                    <th class="thcorlortrans">Price</th>
                                    <th class="thcorlortrans">Inventory</th>
                                    <th class="thcorlortrans">Amount</th>
                                    <th class="thcorlortrans">Curency</th>
                                    <th class="thcorlortrans">Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="transtock in Categories">
                                    <td width="8%">
                                        {{ transtock.document_no }}
                                    </td>
                                    <td width="12%">
                                        {{ transtock.document_type }}
                                    </td>
                                    <td width="8%">
                                        {{ transtock.product_no }}
                                    </td>
                                    <td width="10%">
                                        {{ transtock.description }}
                                    </td>
                                    <td width="5%">
                                        {{ transtock.unit_of_measure_code }}
                                    </td>
                                    <td width="5%">
                                        {{ transtock.unit_price }}
                                    </td>
                                    <td width="6%">
                                        {{ transtock.inventory }}
                                    </td>
                                    <td width="10%">
                                        {{ transtock.total_amount }}
                                    </td>
                                    <td width="5%">
                                        {{ transtock.curency_code }}
                                    </td>
                                    <td width="10%">{{ transtock.remark }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="box-footer-pagination">
                            <pagination
                                :data="Categories"
                                @pagination-change-page="getCategorys"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div
        class="modal fade ui-modal"
        id="staticboomId"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticboomId"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content ui-dialog">
                <div class="ui-widget-header">
                    <h5 class="modal-title in-header" id="staticBackdropLabel">
                        <i class="fa fa-print" aria-hidden="true"></i> Print :{{
                            form.product_no
                        }}
                        , {{ form.description }}
                    </h5>
                    <a
                        href="#"
                        class="ui-dialog-titlebar-close ui-corner-all"
                        role="button"
                        data-bs-dismiss="modal"
                    ></a>
                </div>
                <div class="ui-dialog-content height-modal" id="invoiceholder">
                    <!----set size for A4-->
                    <div id="purchaseorder">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-5 mt-3">
                                    <div
                                        class="row d-flex align-items-baseline"
                                    >
                                        <div class="col-xl-9"></div>
                                        <hr />
                                    </div>
                                    <div
                                        class="container"
                                        style="max-width: 100%"
                                    >
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <h3 class="title-purchase">
                                                    STOCK TRANSECTION REPORT
                                                </h3>
                                            </div>
                                        </div>
                                        <div
                                            class="row my-2 mx-1 justify-content-center table-padding-bot"
                                        >
                                            <table
                                                class="table table-striped table-borderless" id="stocktransction"
                                            >
                                                <thead
                                                    style="background-color: #84b0ca;"
                                                    class="text-white"
                                                >
                                                    <tr>
                                                        <th scope="col">
                                                            Document No
                                                        </th>
                                                        <th scope="col">
                                                            Document Type
                                                        </th>
                                                        <th scope="col">
                                                            Product No
                                                        </th>
                                                        <th scope="col">
                                                            Description
                                                        </th>
                                                        <th scope="col">
                                                            Unit Code
                                                        </th>
                                                        <th scope="col">
                                                            Unit Price
                                                        </th>
                                                        <th scope="col">
                                                            Inventory
                                                        </th>
                                                        <th scope="col">
                                                            Amount
                                                        </th>
                                                        <th scope="col">
                                                            Curency
                                                        </th>
                                                        <th scope="col">
                                                            Remark
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr
                                                        v-for="Category in Categories"
                                                        :key="Category.index"
                                                    >
                                                        <td width="8%">
                                                            {{
                                                                Category.document_no
                                                            }}
                                                        </td>
                                                        <td width="12%">
                                                            {{
                                                                Category.document_type
                                                            }}
                                                        </td>
                                                        <td width="8%">
                                                            {{
                                                                Category.product_no
                                                            }}
                                                        </td>
                                                        <td width="12%">
                                                            {{
                                                                Category.description
                                                            }}
                                                        </td>
                                                        <td width="5%">
                                                            {{
                                                                Category.unit_of_measure_code
                                                            }}
                                                        </td>
                                                        <td width="5%">
                                                            {{
                                                                Category.unit_price
                                                            }}
                                                        </td>
                                                        <td width="6%">
                                                            {{
                                                                Category.inventory
                                                            }}
                                                        </td>
                                                        <td width="5%">
                                                            {{
                                                                Category.total_amount
                                                            }}
                                                        </td>
                                                        <td width="5%">
                                                            {{
                                                                Category.Curency
                                                            }}
                                                        </td>
                                                        <td width="10%">
                                                            {{
                                                                Category.Remark
                                                            }}
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
                <div class="modal-footer">
                    <div
                        class="button type2"
                        id="uniform-undefined"
                        data-bs-dismiss="modal"
                    >
                        <span
                            >No
                            <input
                                type="button"
                                class="type2"
                                value="No"
                                style="width: 89px; opacity: 0"
                                onclick="edit_cancel()"
                                tabindex="10008"
                            />
                        </span>
                    </div>
                    <div
                        class="button type2"
                        @click="print()"
                        :value="G_code"
                        data-bs-dismiss="modal"
                    >
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
            Categories: [],
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
        getCategorys() {
          axios.get("/api/v1/stocktraview").then((res) => {
              this.Categories = res.data;
          });
        },
    },
};
</script>
