<template >
  <div class="print">
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
      <!-- Print -->
      <li>
        <a
          class="dropdown-item btn btn-primary"
          data-bs-toggle="modal"
          data-bs-target="#printBrand"
          tabindex="10028"
          ><i class="fa fa-print" aria-hidden="true"></i> Print</a
        >
      </li>
      <!-- Excel -->
      <li>
        <a
          class="dropdown-item"
          data-bs-toggle="modal"
          data-bs-target="#excelBrand"
          tabindex="10028"
          href="#"
          ><i class="fas fa-file-excel"></i> To Excel</a
        >
      </li>
    </ul>
  </div>
  <!-- Modal Print -->
  <div
    class="modal fade ui-modal"
    id="printBrand"
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
            <i class="fa fa-print" aria-hidden="true"></i>Print
          </h5>
          <span
            class="ui-icon ui-icon-closethick"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></span>
        </div>

        <div class="ui-dialog-content" id="categoryprint">
          <div class="card">
            <div class="card-body height-modal">
              <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                  <div class="col-xl-9"></div>
                </div>

                <div class="container">
                  <div class="col-md-12">
                    <div class="text-center">
                      <h3 class="title-purchase">Brand</h3>
                    </div>
                  </div>

                  <div
                    class="
                      row
                      my-2
                      mx-1
                      justify-content-center
                      table-padding-bot
                    "
                  >
                    <table class="table table-striped table-borderless">
                      <thead
                        style="background-color: #84b0ca"
                        class="text-white"
                      >
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Brand Name</th>
                          <th scope="col">Brand Name 2</th>
                          <th scope="col">Inactivced</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item, index) in items.data" :key="index">
                          <td scope="row">{{ index + 1 + "." }}</td>
                          <td>
                            {{ item.brand_name }}
                          </td>
                          <td>
                            {{ item.brand_name_2 }}
                          </td>
                          <td>
                            {{ item.inactived }}
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
        <div class="modal-footer">
          <a
            class="btn-purchase btn-light text-capitalize border-0"
            data-mdb-ripple-color="dark"
            @click="print()"
            ><i class="fas fa-print text-primary"></i> Print</a
          >
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Excel -->
  <div
    class="modal fade ui-modal"
    id="excelBrand"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticboomId"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content ui-dialog">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">
            <i class="fas fa-file-excel"></i>Excel
          </h5>
          <span
            class="ui-icon ui-icon-closethick"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></span>
        </div>
        <div id="purchaseorder">
          <div class="card">
            <div class="card-body">
              <div class="container mb-5 mt-3">
                <div class="container">
                  <div class="col-md-12">
                    <div class="text-center">
                      <div class="text-center">
                        <h3 v-if="excel == 'Import'" class="title-purchase">
                          {{ excel }} {{ exefile }} from Excel
                        </h3>
                        <h3 v-else class="title-purchase">
                          {{ excel }} To Excel
                        </h3>
                      </div>
                    </div>
                    <div
                      class="
                        row
                        my-2
                        mx-1
                        justify-content-center
                        table-padding-bot
                        customsroll
                      "
                    >
                      <table
                        class="table table-striped table-borderless"
                        id="exceldata"
                      >
                        <thead
                          style="background-color: #84b0ca"
                          class="text-white"
                        >
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Brand Code</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Brand Name 2</th>
                            <th scope="col">Inactivced</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-for="(braExcel, index) in braExcels"
                            :key="index"
                          >
                            <th v-if="index >= 1" style="width: 5%">
                              {{ index }}
                            </th>
                            <th v-if="index >= 1" style="width: 5%">
                              {{ braExcel.brand_code }}
                            </th>
                            <th v-if="index >= 1" style="width: 10%">
                              {{ braExcel.brand_name }}
                            </th>
                            <th v-if="index >= 1" style="width: 10%">
                              {{ braExcel.brand_name_2 }}
                            </th>
                            <th v-if="index >= 1" style="width: 7%">
                              {{ braExcel.inactived }}
                            </th>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div
              @click="btnSaveExcel"
              data-bs-dismiss="modal"
              aria-label="Close"
              class="btn-purchase btn-light text-capitalize"
            >
              <input type="button" /><i class="fas fa-save"></i> Save Data
            </div>
            <div
              @change="excelBrand($event)"
              class="btn-purchase btn-light text-capitalize"
            >
              <input type="file" /><i class="fas fa-file-excel"></i> Import File
              Excel
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  <script setup>
import useCategory from "../../componentJS/Brand";
const {
  printBrand,
  getBrand,
  dataexcelBrand,
  savexcelBrand,
  braExcels,
  items,
  checkexcel,
  exefile,
  excel,
} = useCategory();
const print = async () => {
  printBrand();
};
const btnSaveExcel = async () => {
  savexcelBrand();
};
const excelBrand = async (event) => {
  dataexcelBrand(event);
  getBrand();
};
</script>
  