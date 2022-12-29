<template>
  <div class="wrapper">
    <Header />
    <div class="search-box">
      <div id="product">
        <!--#contents -->
        <div class="search-box">
          <MenuBrand />
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
                        Brand
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
                            <th width="30%">Brand Code</th>
                            <td width="70%">
                              <input
                                class="string_zen_kana clear_text text"
                                id="brand_code"
                                :disabled="disabled"
                                v-model="form.brand_code"
                                maxlength="8"
                                name="brand_code"
                                type="text"
                                tabindex="10000"
                              />
                            </td>
                          </tr>
                          <tr>
                            <th width="30%">Brand Name</th>
                            <td width="70%">
                              <input
                                class="string_zen_kana clear_text text"
                                id="brand_name"
                                maxlength="50"
                                name="brand_name"
                                v-model="form.brand_name"
                                type="text"
                                tabindex="10001"
                              />
                            </td>
                          </tr>

                          <tr>
                            <th width="30%">Brand Name 2</th>
                            <td width="70%">
                              <input
                                class="string_zen_kana clear_text text"
                                id="brand_name_2"
                                maxlength="50"
                                name="brand_name_2"
                                v-model="form.brand_name_2"
                                type="text"
                                tabindex="10001"
                              />
                            </td>
                          </tr>

                          <tr>
                            <th width="30%">Inactived</th>
                            <td width="70%">
                              <div class="selector" id="inactivced">
                                <span>{{ form.inactived }}</span>
                                <select
                                  id="inactivced"
                                  name="inactivced"
                                  v-model="form.inactived"
                                  tabindex="10003"
                                  style="
                                    min-width: 51px;
                                    opacity: 0;
                                    width: 80px;
                                  "
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
                        @click="btnSave"
                        class="button type2"
                        id="uniform-undefined"
                        v-show="btnValue1"
                      >
                        <span>Save</span>
                        <input
                          type="button"
                          value="save"
                          class="type2"
                          style="opacity: 0; width: 63px"
                        />
                      </div>
                      <div
                        @click="btnUpdate(form.brand_code)"
                        class="button type2"
                        id="uniform-undefined"
                        data-bs-dismiss="modal"
                        v-show="btnValue2"
                      >
                        <span>Update</span>
                        <input
                          type="button"
                          value="save"
                          class="type2"
                          style="opacity: 0; width: 63px"
                        />
                      </div>
                      <div
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        class="button type2"
                        id="uniform-undefined"
                      >
                        <span>Close</span>
                        <input
                          type="button"
                          value="clear"
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
          <table
            width="100%"
            border="0"
            cellpadding="0"
            cellspacing="0"
            class="table table-striped br-table"
          >
            <thead>
              <tr class="header-table">
                <th width="3%">No</th>
                <th width="10%">Brand Code</th>
                <th width="14%">Brand Name</th>
                <th width="14%">Brand Name 2</th>
                <th width="11%">Inactived</th>
                <th width="13%">
                  <div @click="btnAdd" class="button" id="uniform-undefined">
                    <span
                      >Add New<input
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
              <tr v-for="(item, index) in items.data" :key="index">
                <td width="3%">{{ index + 1 }}</td>
                <td width="10%">{{ item.brand_code }}</td>
                <td width="14%">{{ item.brand_name }}</td>
                <td width="14%">{{ item.brand_name_2 }}</td>
                <td width="11%">{{ item.inactived }}</td>
                <td width="13%">
                  <div
                    @click="btnEdit(item)"
                    class="button"
                    id="uniform-undefined"
                  >
                    <span
                      ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      Edit<input
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop"
                        tabindex="10028"
                        style="opacity: 0; width: 76px"
                    /></span>
                  </div>
                  <div
                    class="button"
                    @click="btnDelete(item.brand_code)"
                    id="uniform"
                  >
                    <span
                      ><i class="fa fa-trash-o" aria-hidden="true"></i>
                      Delete<input
                        type="button"
                        style="opacity: 0; width: 76px"
                    /></span>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>

          <div class="box-footer-pagination">
            <pagination :data="items" @pagination-change-page="getBrand" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref, reactive, watch, computed, onMounted } from "vue";
import useBrand from "../../componentJS/Brand";
import pagination from "laravel-vue-pagination";
import Header from "../Header.vue";
import MenuBrand from "./Menu_Brand.vue";
const { form, items, search, getBrand, deleteBrand, saveBrand, updateBrand } =
  useBrand();
const disabled = ref(true);
const btnValue1 = ref(false);
const btnValue2 = ref(false);
const btnAdd = async () => {
  form.brand_code = "";
  form.brand_name = "";
  form.brand_name_2 = "";
  form.inactived = "Yes";
  disabled.value = false;
  btnValue1.value = true;
  btnValue2.value = false;
};
const btnEdit = async (item) => {
  form.brand_code = item.brand_code;
  form.brand_name = item.brand_name;
  form.brand_name_2 = item.brand_name_2;
  form.inactived = item.inactived;
  disabled.value = true;
  btnValue2.value = true;
  btnValue1.value = false;
};
const btnSave = async () => {
  saveBrand(form);
  getBrand();
};
const btnDelete = async (id) => {
  deleteBrand(id);
  getBrand();
};
const btnUpdate = async (x) => {
  updateBrand(x, form);
  getBrand();
};
</script>

