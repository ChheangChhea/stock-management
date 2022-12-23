<template>
  <div class="wrapper">
    <Header />

    <div class="search-box">
      <div id="product">
        <!--#contents -->

        <div class="search-box mb-4">
          <!-- <a
            class="btn-radius bt-pn btn btn-sm"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            style="float: right; color: #f8f5b4"
          >
            <i class="fas fa-plus" style="padding-right: 5px"> </i>

            Menu
          </a> -->

          <!-- <ul class="dropdown-menu">
            <li>
              <a
                @click="getproductboom()"
                class="dropdown-item btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#staticboomId"
                tabindex="10028"
                ><i class="fa-solid fa-circle-b"></i> Boom Product</a
              >
            </li>

            <li>
              <a
                @click="getsuppliyerview()"
                class="dropdown-item btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#staticboomId"
                tabindex="10028"
                ><i class="fa fa-print" aria-hidden="true"></i> Print</a
              >
            </li>

            <li>
              <a
                class="dropdown-item"
                data-bs-toggle="modal"
                data-bs-target="#staticBackdropss"
                tabindex="10028"
                href="#"
                ><i class="fas fa-file-excel"></i> To Excel</a
              >
            </li>

            <li>
              <a
                class="dropdown-item btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#staticBackdropss"
                tabindex="10028"
                ><i class="fas fa-edit"></i> Release</a
              >
            </li>
          </ul> -->

          <h2 class="search-box-title">
            Search

            <input
              name="search"
              type="search"
              id="search"
              class="text"
              v-model="search"
            />
          </h2>

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
                <tr class="header-table">
                  <th width="12%">id</th>

                  <th width="12%">Category_code</th>

                  <th width="12%">Category Name</th>

                  <th width="12%">Category Name 2</th>

                  <th width="12%">Inactivced</th>

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

              <tbody>
                <tr
                  v-for="(Category, index) in Categories.data"
                  :key="index"
                  class="cate-td"
                >
                  <td width="12%">
                    {{ index + 1 + "." }}
                  </td>

                  <td width="12%">
                    {{ Category.cat_code }}
                  </td>

                  <td width="12%">
                    {{ Category.cat_name }}
                  </td>

                  <td width="12%">
                    {{ Category.cat_name_2 }}
                  </td>

                  <td width="12%">
                    {{ Category.inactived }}
                  </td>

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

            <div class="box-footer-pagination">
              <pagination
                :data="Categories"
                @pagination-change-page="getCategory"
              />
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
            <div class="modal-dialog smallpopup">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Category</h5>
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
                            :disabled="disabled"
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
                        <th>Inactived</th>

                        <td width="90%">
                          <div class="selector" id="inactivced">
                            <span>{{ form.inactived }}</span>

                            <select
                              id="inactivced"
                              name="inactivced"
                              tabindex="10003"
                              v-model="form.inactived"
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
                </div>

                <div class="modal-footer">
                  <div
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    class="button type2"
                    @click="btnSave()"
                    id="uniform-undefined"
                    v-show="btnValue1"
                  >
                    <span> Save </span>

                    <input
                      type="button"
                      value="save"
                      class="type2"
                      style="opacity: 0; width: 63px"
                      tabindex="10026"
                    />
                  </div>

                  <div
                    v-show="btnValue2"
                    class="button type2"
                    @click="btnUpdate(form.cat_code)"
                    id="uniform-undefined"
                  >
                    <span> Update </span>

                    <input
                      type="button"
                      value="edit"
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

  <!-- <div
    
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
    
                <i class="fa fa-print" aria-hidden="true"></i> Print :
    
                {{ form.product_no }} , {{ form.description }}
    
              </h5>
    
              <a
    
                href="#"
    
                class="ui-dialog-titlebar-close ui-corner-all"
    
                role="button"
    
                data-bs-dismiss="modal"
    
              ></a>
    
                </div>
    
                <div class="ui-dialog-content height-modal" id="invoiceholder">
    
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
    
                                                <h3 class="title-purchase">CATEGORY REPORT</h3>
    
                                            </div>
    
                                        </div>
    
                                        <div class="
    
                            row
    
                            my-2
    
                            mx-1
    
                            justify-content-center
    
                            table-padding-bot
    
                          ">
    
                                            <table class="table table-striped table-borderless">
    
                                                <thead style="background-color: #84b0ca" class="text-white">
    
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
    
                                                        <td width="12%">
    
                                                            {{ index + 1 + "." }}
    
                                                        </td>
    
                                                        <td width="12%">
    
                                                            {{ Category.cat_code }}
    
                                                        </td>
    
                                                        <td width="12%">
    
                                                            {{ Category.cat_name }}
    
                                                        </td>
    
                                                        <td width="12%">
    
                                                            {{ Category.cat_name_2 }}
    
                                                        </td>
    
                                                        <td width="12%">
    
                                                            {{ Category.inactived }}
    
                                                        </td>
    
                                                        <td width="12%">
    
                                                            {{ Category.created_by }}
    
                                                        </td>
    
                                                        <td width="12%">
    
                                                            {{ Category.updete_by }}
    
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
    
                    <div class="button type2" id="uniform-undefined" data-bs-dismiss="modal">
    
                        <span>No<input
    
                    type="button"
    
                    class="type2"
    
                    value="No"
    
                    style="width: 89px; opacity: 0"
    
                    onclick="edit_cancel()"
    
                    tabindex="10008"
    
                /></span>
    
                    </div>
    
                    <div class="button type2" @click="print()" data-bs-dismiss="modal">
    
                        <span>Yes</span>
    
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
    </div> -->
</template>
<script setup>
import { ref, reactive, watch, computed, onMounted } from "vue";
import pagination from "laravel-vue-pagination";
import useCategory from "../../componentJS/category";
const btnValue1 = ref(false);
const btnValue2 = ref(false);
const disabled = ref(true);

const {
  updateCategory,
  DeleteCategory,
  createCategory,
  getCategory,
  Categories,
  form,
  search,
} = useCategory();
onMounted(() => {
  getCategory();
});
const btnSave = async () => {
  createCategory(form);
  getCategory();
};
const btnEdit = async (Category) => {
  form.cat_code = Category.cat_code;
  form.cat_name = Category.cat_name;
  form.cat_name_2 = Category.cat_name_2;
  form.inactived = Category.inactived;
  btnValue2.value = true;
  btnValue1.value = false;
  disabled.value = true;
};

const btnUpdate = async (x) => {
  updateCategory(x, form);
  getCategory();
};
const btnDelete = async (id) => {
  DeleteCategory(id);
  getCategory();
};
const btnAdd = async () => {
  form.cat_code = "";
  form.cat_name = "";
  form.cat_name_2 = "";
  form.inactived = "";
  btnValue1.value = true;
  btnValue2.value = false;
  disabled.value = false;
};
</script>
 
